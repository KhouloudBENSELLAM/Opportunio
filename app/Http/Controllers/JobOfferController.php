<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobOffers= JobOffer::paginate(20);
        return view('joboffers.index',compact('jobOffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('joboffers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string',
            'contract_type' => 'required|string',
            'date_posted' => 'required|date',
            'status' => 'required|string',
            'type' => 'nullable|string',
            'duree' => 'nullable|string',
            'company_id' => 'required|exists:recruteurs,id', // make sure this matches your DB

        ]);
        JobOffer::create($request->all());
        return redirect()->route('joboffers.index')->with('success', 'Offre ajouté avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $joboffer = JobOffer::findOrFail($id);
    return view('joboffers.show', compact('joboffer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOffer $jobOffer)
    {
        return view('joboffers.edit', ['joboffer' => $jobOffer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOffer $jobOffer)
    {
        $request->validate([
            'company_id' => 'required|exists:recruteurs,id', // make sure this matches your DB
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string',
            'contract_type' => 'required|string',
            'date_posted' => 'required|date',
            'status' => 'required|string',
            'type' => 'nullable|string',
            'duree' => 'nullable|string',

            ]);

            $jobOffer->update($request->all());
            // dd($request->all());
            return redirect()->route('joboffers.index')->with('success','Offre mise à jour avec succès');
    }
    //search method
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');

        $jobOffers = JobOffer::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('requirements', 'like', "%{$query}%")
            ->orWhere('location', 'like', "%{$query}%")
            ->paginate(20);

        return view('joboffers.index', compact('jobOffers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $joboffer)
    {
        $joboffer->delete();
        return redirect()->route('joboffers.index')->with('success', 'Offre supprimée avec succès');
    }
}
