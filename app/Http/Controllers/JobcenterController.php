<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobcenterRequest;
use App\Http\Requests\UpdateJobcenterRequest;
use App\Models\Jobcenter;
use App\Models\Location;

class JobcenterController extends Controller
{
    private $locations;

    public function __construct()
    {
        $this->locations = Location::all(['zipcode','place'])
            ->keyBy('zipcode')
            ->map(fn($item) => $item->zipcode . ' ' .$item->place);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jobcenter::paginate($this->paginatorLimit);
        return view('pages.jobcenters.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jobcenters.create', [
            'locations' => $this->locations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobcenterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobcenter $jobcenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobcenter $jobcenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobcenterRequest $request, Jobcenter $jobcenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobcenter $jobcenter)
    {
        //
    }
}
