<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }
    public function submit(Request $request)
    {
        // Validate form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Example: Store or process the data
        // You can save it to the database or send an email
        // \App\Models\ContactMessage::create($validated);

        // Return a success response or redirect
        return redirect()->route('contact')->with('success', 'Thank you for contacting us!');
    }
}
