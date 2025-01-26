<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDonationRequest;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = Donation::all();
        return view('donation-admin.index',compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campaigns = Campaign::all();
        return view('donation-admin.create',compact('campaigns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $donations = Donation::create([
            'campaign_id' => $request->campaign_id,
            'nama_donatur' => $request->nama_donatur,
            'email_donatur' => $request->email_donatur,
            'no_hp_donatur' => $request->no_hp_donatur,
            'jumlah_donasi' => $request->jumlah_donasi,
            'pesan' => $request->pesan,
            'status' => 'success',
            'snap_token' => '',
        ]);

        return redirect()->route('donation-admin.index')->with('success', 'Donation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donations = Donation::findOrFail($id);
        return view('donation-admin.show',compact('donations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $donations = Donation::findOrFail($id);
        $campaigns = Campaign::all();
        return view('donation-admin.edit',compact('donations','campaigns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donations = Donation::findOrFail($id);
        $donations->update([
            'campaign_id' => $request->campaign_id,
            'nama_donatur' => $request->nama_donatur,
            'email_donatur' => $request->email_donatur,
            'no_hp_donatur' => $request->no_hp_donatur,
            'jumlah_donasi' => $request->jumlah_donasi,
            'pesan' => $request->pesan,
            'status' => $request->status,
            'snap_token' => $request->snap_token,
        ]);

        return redirect()->route('donation-admin.index')->with('success', 'Donation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donations = Donation::findOrFail($id);
        $donations->delete();
        return redirect()->route('donation-admin.index')->with('success','Donation deleted successfully');
    }
}
