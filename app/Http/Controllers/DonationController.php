<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDonationRequest;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

     public function createUser($id)
     {
        $campaign = Campaign::findOrFail($id);
         return view('donation.donation-user',compact('campaign'));
     }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
      $donations = Donation::create([
        'campaign_id' => $request->campaign_id,
        'order_id' => rand(),
        'nama_donatur' => $request->nama_donatur,
        'email_donatur' => $request->email_donatur,
        'no_hp_donatur' => $request->no_hp_donatur,
        'jumlah_donasi' => $request->jumlah_donasi,
        'pesan' => $request->pesan,
        'status' => 'pending',
        'snap_token' => '',
      ]);

      Config::$serverKey = env('MIDTRANS_SERVER_KEY');
      Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
      Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
      Config::$isSanitized = true;
      Config::$is3ds = true;

      $params = [
        'transaction_details' => [
            'order_id' => $donations->order_id,
            'gross_amount' => $donations->jumlah_donasi,
        ],
        'customer_details' => [
            'first_name' => $donations->nama_donatur,
            'email' => $donations->email_donatur,
            'phone' => $donations->no_hp_donatur,
        ],
    ];

    $snapToken = Snap::getSnapToken($params);

    $donations->snap_token = $snapToken;
    $donations->save();

    return redirect()->route('donation.show-user', $donations->order_id);


    }


    /**
     * Display the specified resource.
     */
    public function showUser(string $id)
    {
        $donation = Donation::where('order_id', $id)->first();
        return view('donation.detail-donation-user',compact('donation'));
    }

    public function afterPayment(Request $request)
    {
        $status_code = $request->status_code;
        $transaction_status = $request->transaction_status;
        $order_id = $request->order_id;

        $donation = Donation::where('order_id', $order_id)->first();
        if ($transaction_status == 'settlement' && $status_code == 200) {

            $donation->jumlah_donasi;
            $donation->campaign->donasi_terkumpul;

            $donation->campaign->donasi_terkumpul += $donation->jumlah_donasi;
            $donation->campaign->save();
            $donation->status = 'success';
            $donation->save();
        } else {
            $donation->status = 'failed';
            $donation->save();
        }
        return view('donation.after-payment');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
