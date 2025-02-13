<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show the list of users
    public function index(Request $request)
    {
        $query = User::query();

        // Apply search if provided
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Paginate the results
        $users = $query->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    // Show the edit form for a specific user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user by ID or throw 404

        return view('admin.users.edit', compact('user'));
    }

    // Update the user details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Find user by ID or throw 404

        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Ensure unique email
            'phone_number' => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive', // Restrict status to active/inactive
        ]);

        // Update user details
        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find user by ID or throw 404

        $user->delete(); // Delete the user

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
