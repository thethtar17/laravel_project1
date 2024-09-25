<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $years = Year::all();

        // Return the events to the view
        return view('year.list', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearRequest $request)
    {
        //
        $year = new Year();
        $year->name=$request->name;
        $year->save();
        return redirect()->route('year.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $year = Year::find($id); // Find the year by ID or fail
        return view('year.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateYearRequest  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearRequest $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $year = Year::find($id);
        $year->name = $request->name;
        $year->save();

        return redirect()->route('year.index')->with('success', 'Year updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $year=Year::find($id);
        if($year){

            $year->delete();
        }
        return redirect()->route('year.index');
    }
}
