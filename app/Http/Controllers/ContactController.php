<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ContactController extends Controller
{
    public function index()
    {
        // Retrieve all contacts from the database
        $contacts = Contact::latest()->get();
        
        // Pass the contacts data to the index view
        return view('admincontacts', compact('contacts'));
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Create a new contact record in the database
        // dd($validatedData);

        Contact::create($validatedData);
        // Redirect back to the index page with a success message
        return redirect('/')->with('success_alert', 'Contact created successfully');
    }



    public function showcontactForm()
    {
        // Display the details of a specific contact
        return view('contact');
    }



    public function destroy(Contact $contact)
    {
        // Delete a specific contact from the database
        $contact->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('contacts.view')
            ->with('success', 'Contact deleted successfully.');
    }
}


