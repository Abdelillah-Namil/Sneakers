<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class SneakerController extends Controller
{
    public function index()
    {
        $sneakers = Sneaker::latest()->get();
        return view('index', compact('sneakers'));
    }

    public function detail($id)
    {
        $sneakers = Sneaker::findorFail($id);
        return view('details', compact('sneakers'));
    }



    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // Perform the search logic here
        $sneakers = Sneaker::where('name', 'like', "%$keyword%")->get();

        // Return the search results view
        return view('search', ['sneakers' => $sneakers]);
    }



    public function edit(Sneaker $sneaker)
    {
        // Retrieve the sneaker and pass it to the view
        return view('sneakersedit', compact('sneaker'));
    }

    public function update(Request $request, Sneaker $sneaker)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'gender' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'sizes' => 'required',
            'release_date' => 'required|date',
        ]);

        // Update the sneaker information
        $sneaker->name = $request->input('name');
        $sneaker->price = $request->input('price');
        $sneaker->description = $request->input('description');
        $sneaker->gender = $request->input('gender');
        $sneaker->brand = $request->input('brand');
        $sneaker->color = $request->input('color');
        $sneaker->sizes = $request->input('sizes');
        $sneaker->release_date = $request->input('release_date');

        // Save the updated sneaker
        $sneaker->save();

        // Redirect to a relevant page or show a success message
        return redirect()->route('admin.view')->with('success', 'Sneaker updated successfully.');
    }

    public function destroy(Sneaker $sneaker)
    {

        // Delete the sneaker from the database
        $sneaker->delete();

        // Redirect to a relevant page or show a success message
        return redirect()->route('admin.view')->with('success', 'Sneaker deleted successfully.');
    }

    public function create()
    {
        // Show the create sneaker form
        return view('sneakerscreate');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'gender' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'sizes' => 'required',
            'release_date' => 'required|date',
            'image' => 'required|image',
        ]);

        // Upload the image to Cloudinary
        $imagePath = $request->file('image')->getRealPath();
        $image = Cloudinary::upload($imagePath)->getSecurePath();

        // Create a new sneaker with the request data
        $sneaker = new Sneaker();
        $sneaker->name = $request->input('name');
        $sneaker->price = $request->input('price');
        $sneaker->description = $request->input('description');
        $sneaker->gender = $request->input('gender');
        $sneaker->brand = $request->input('brand');
        $sneaker->color = $request->input('color');
        $sneaker->sizes = $request->input('sizes');
        $sneaker->release_date = $request->input('release_date');
        $sneaker->image = $image;

        // Save the new sneaker
        $sneaker->save();

        // Redirect to a relevant page or show a success message
        return redirect()->route('admin.view')->with('success', 'Sneaker created successfully.');
    }
}
