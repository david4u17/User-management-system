<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    // Display a list of the users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Shows the form for creating a new user
    public function create()
    {
        return view('users.create');
    }

    // Stores the newly created user 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'age' => 'required|numeric|min:1',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->age = $validatedData['age'];
        $user->password = $validatedData['password'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Display the user detail
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Show the form for editing the user detail
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update the user detail
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'age' => 'required|numeric|min:1',
            'password' => 'nullable|min:6',
        ]);

        if ($request->has('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        User::where('id', '=', $id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'age' => $validatedData['age'],
            'password' => $validatedData['password']
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete the user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
