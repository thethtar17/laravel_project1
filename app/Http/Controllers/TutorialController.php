<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Tutorial;
use App\Http\Requests\StoreTutorialRequest;
use App\Http\Requests\UpdateTutorialRequest;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tutorials = Tutorial::with('year')->get(); // Eager loading the related year

        // Return the tutorials to the view
        return view('tutorial.list', compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years= Year::all();

        return view('tutorial.create',compact('years'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTutorialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTutorialRequest $request)
    {
        //
        $request->validate([
            'student_id' => 'required|string|max:255',
            'year_id' => 'required|exists:years,id', // Assuming 'years' is the name of the related table
            'subject_one' => 'required|string|max:255',
            'subject_two' => 'required|string|max:255',
            'subject_three' => 'required|string|max:255',
            'subject_four' => 'required|string|max:255',
            'subject_five' => 'required|string|max:255',
            'subject_six' => 'required|string|max:255',
        ]);

        // Create a new Tutorial record
        $tutorial = new Tutorial();
        $tutorial->student_id = $request->student_id;
        $tutorial->year_id = $request->year_id;
        $tutorial->subject_one = $request->subject_one;
        $tutorial->subject_two = $request->subject_two;
        $tutorial->subject_three = $request->subject_three;
        $tutorial->subject_four = $request->subject_four;
        $tutorial->subject_five = $request->subject_five;
        $tutorial->subject_six = $request->subject_six;
        $tutorial->save(); // Save the tutorial record to the database

        // Redirect or return a response
        return redirect()->route('tutorial.index')->with('success', 'Tutorial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $years= Year::all();
        $tutorial = Tutorial::findOrFail($id);
        return view('tutorial.edit', compact('tutorial','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTutorialRequest  $request
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTutorialRequest $request,$id)
    {
        //
        $request->validate([
            'student_id' => 'required|string|max:255',
            'year_id' => 'required|integer|exists:years,id',
            'subject_one' => 'required|string|max:255',
            'subject_two' => 'required|string|max:255',
            'subject_three' => 'required|string|max:255',
            'subject_four' => 'required|string|max:255',
            'subject_five' => 'required|string|max:255',
            'subject_six' => 'required|string|max:255',
        ]);

        $tutorial = Tutorial::find($id); // Find the tutorial by ID or fail

        $tutorial->student_id = $request->student_id;
        $tutorial->year_id = $request->year_id;
        $tutorial->subject_one = $request->subject_one;
        $tutorial->subject_two = $request->subject_two;
        $tutorial->subject_three = $request->subject_three;
        $tutorial->subject_four = $request->subject_four;
        $tutorial->subject_five = $request->subject_five;
        $tutorial->subject_six = $request->subject_six;

        $tutorial->save(); // Save the updated tutorial

        return redirect()->route('tutorial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutorial=Tutorial::find($id);
        if($tutorial){

            $tutorial->delete();

        }
        return redirect()->route('tutorial.index');
        //
    }
}
