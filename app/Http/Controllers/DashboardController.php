<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalCampaigns = Campaign::count();
        $totalDonations = Donation::where('status', 'success')->sum('jumlah_donasi');
        $pendingDonations = Donation::where('status', 'pending')->count();
        $campaigns = Campaign::all();
        $donations = Donation::latest()->take(10)->get(); // 10 donasi terbaru

        return view('dashboard', compact('totalCampaigns', 'totalDonations', 'pendingDonations', 'campaigns', 'donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
