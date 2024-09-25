<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = User::all();
        // return view('user.list', compact('users'));
        //
        // $role = $request->input('role'); // Get the role filter from the request

        // $users = User::when($role, function ($query, $role) {
        //     return $query->where('role', $role);
        // })->paginate(10);

        // return view('user.list', compact('users', 'role'));

        $role = $request->input('role');
        $yearId = $request->input('year_id');

        $users = User::when($role, function ($query, $role) {
                return $query->where('role', $role);
            })
            ->when($role == 'student' && $yearId, function ($query) use ($yearId) {
                return $query->where('year_id', $yearId);
            })
            ->paginate(10);

        $years = Year::all(); // Assuming you have a Year model

        return view('user.list', compact('users', 'role', 'yearId', 'years'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years= Year::all();
        // $users = User::all();
        return view('user.create', compact('years'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          //
          $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'phone' => 'required|string|max:15',
            'position' => ['nullable', 'string'],
            'phone' => 'required|string',
            'roll_number' => ['nullable', 'string'],
            'year_id' => 'nullable|exists:years,id',


            'address' => 'required|string|max:255',
            'role' => 'required|in:admin,student,teacher',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if($request->image){
            $file=$request->file('image');
            $newName=uniqid().time().".".$file->extension();
            $file->storeAs('public/users',$newName);

        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    //   $user->password = $request->password;

        $user->position = $request->position;
        $user->phone = $request->phone;
        $user->roll_number = $request->roll_number;
        $user->year_id = $request->year_id;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->image = $newName;
        $user->save();


        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $user = User::findOrFail($id);
        // $this->authorize('update', $user);

        // $userRole = Auth::user()->role; // Get the role of the currently logged-in user

        // return view('user.edit', compact('user', 'userRole'));

        return view('user.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        //     'position' => 'string|max:255',
        //     'phone' => 'required|string|max:255',
        //     'roll_number' => 'string|max:255|unique:users,roll_number,' . $id,
        //     'year_id' => 'integer|exists:years,id',
        //     'address' => 'required|string|max:255',
        //     'role' => 'required|in:admin,student,teacher',
        //     'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $user = User::find($id); // Find the user by ID or fail

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->position = $request->position;
        $user->phone = $request->phone;
        $user->roll_number = $request->roll_number;
        $user->year_id = $request->year_id;
        $user->address = $request->address;
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName; // Update the image if provided
        }

        $user->save(); // Save the updated user

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::find($id);
        if($user){

            $user->delete();
            Storage::delete('public/users/'.$user->image);

        }
        return redirect()->route('user.index');

    }
}
