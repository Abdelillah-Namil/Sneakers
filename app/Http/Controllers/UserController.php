<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Sneaker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;


class UserController extends Controller
{
    // Existing methods...

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
        // Create a new User instance
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
    
        // Save the user in the database
        $user->save();

    
        // Redirect to the user profile page
        return redirect()->route('users.login')->with('success', 'Registration successful.');
    }
    

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->isAdmin()) {
                // Perform admin-specific actions
                // For example, retrieve the sneakers data for the table
                $sneakers = Sneaker::all();
        
                return redirect()->route('admin.view')->with('success', 'Login successful.');
            }
            // Redirect to the intended page or a default page
            return redirect()->route('home')->with('success', 'Login successful.');
        }

        // Failed login attempt
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function showProfile()
    {
        // Get the authenticated user
        $user = Auth::user();
        $likes = Like::where('user_id', $user->id)->pluck('sneaker_id');
        $sneakers = Sneaker::whereIn('id', $likes)->get();

        // Check if the user is authenticated
        if ($user) {
            return view('profile', ['user' => $user, 'sneakers' => $sneakers]);
        } else {
            return redirect()->route('users.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.showLoginForm')->with('success', 'Logout successful.');
    }

    public function destroy()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            // Perform any additional cleanup or tasks as needed

            // Delete the user account
            // Logout the user
            Auth::logout();

            // Delete the user account
            $user->delete();

            // Redirect to a relevant page or show a success message
            return redirect()->route('home')->with('success', 'Your account has been deleted.');
        }

        // If the user is not authenticated, redirect to the login page or a relevant page
        return redirect()->route('login');
    }

    public function showEditForm()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            return view('edit', ['user' => $user]);
        }

        // If the user is not authenticated, you can handle it differently,
        // such as redirecting them to the home page or displaying an error message.
        // Example:
        return redirect()->route('home')->with('error', 'You must be logged in to access this page.');
    }

    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'bio' => 'nullable|string|max:255',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Update the user information
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->bio = $request->input('bio');

            // Update profile image if provided
            if ($request->hasFile('profile_image')) {
                $profileImage = $request->file('profile_image');
                $uploadedImage = Cloudinary::upload($profileImage->getRealPath())->getSecurePath();
                $user->profile_image = $uploadedImage;
            }

            // Update other fields as needed

            $user->save();

            // Redirect to a relevant page or show a success message
            return redirect()->route('users.showProfile')->with('success', 'Your information has been updated.');
        }

        // If the user is not authenticated, redirect to the login page
        return redirect()->route('login');
    }
    
    public function adminView()
    {
        // Check if the authenticated user is an admin
        $user = Auth::user();
        if ($user && $user->isAdmin()) {
            // Get the sneakers data for the table
            $sneakers = Sneaker::latest()->get();

            return view('adminsneakes', compact('sneakers'));
        }

        // If the user is not an admin, redirect or show an error message
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }

    // Add any other necessary methods for admin functionality

}
