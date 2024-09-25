<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Year;
use App\Models\Tutorial;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::all();
        $tutorials=Tutorial::all();
        $events=Event::all();
        $books=Book::all();
        $years= Year::all();
        return view('home', compact('years','tutorials','books','events','users'));
    }
    public function welcome()
    {
        return view('welcome1');
    }
}
