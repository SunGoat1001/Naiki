<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmail;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);

        Contact::create($validated);

        SendContactEmail::dispatch($validated)->delay(now()->addMinutes(1));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
