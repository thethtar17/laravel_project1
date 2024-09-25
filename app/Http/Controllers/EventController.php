<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event.list', compact('events'));
    }

    // Show the form for creating a new event
    public function create()
    {
        return view('event.create');
    }

    // Store a newly created event in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'content' => 'required|string',
        ]);

        if($request->image){
            $file=$request->file('image');
            $newName=uniqid().time().".".$file->extension();
            $file->storeAs('public/events',$newName);

        }

        $event = new Event();
        $event->title = $request->title;
        $event->image = $newName;
        $event->date = $request->date;
        $event->content = $request->content;
        $event->save();


        return redirect()->route('event.index');
    }

    // Display the specified event
    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    // Show the form for editing the specified event
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    // Update the specified event in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'content' => 'required|string',
        ]);

        // if ($request->hasFile('image')) {
        //     $imageName = time().'.'.$request->image->extension();
        //     $request->image->move(public_path('uploads'), $imageName);
        //     $event->image = $imageName;
        // }
        $event=Event::find($id);
        $event->title= $request->title;
        $event->date= $request->date;
        $event->content=$request->content;
        $event->update();

        return redirect()->route('event.index');
    }

    // Remove the specified event from the database
    public function destroy( $id)
    {
        $event=Event::find($id);
        if($event){

            $event->delete();
            Storage::delete('public/events/'.$event->image);

        }
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
    //
}
