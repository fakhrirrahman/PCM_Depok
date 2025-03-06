<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke database
        Contact::create($request->all());

        // Kirim email
        Mail::to('fakhrirrahman7@gmail.com')->send(new ContactMail($request->all()));

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully.');
    }
}
