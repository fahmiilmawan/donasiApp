<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocation;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaign.index',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampaignRequest $request)
{
    $campaigns = Campaign::create($request->validated());

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $filename, 'public');
        $campaigns->foto = $path;
        $campaigns->save();
    }


    return redirect()->route('campaign.index')->with('success', 'Campaign created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $campaigns = Campaign::findOrFail($id);
        return view('campaign.edit',compact('campaigns'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCampaignRequest $request, string $id)
    {
        $campaigns = Campaign::findOrFail($id);
        $campaigns->update($request->validated());
        return redirect()->route('campaign.index')->with('success','Campaign updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campaigns = Campaign::findOrFail($id);
        $campaigns->delete();
        return redirect()->route('campaign.index')->with('success','Campaign deleted successfully');
    }
}
