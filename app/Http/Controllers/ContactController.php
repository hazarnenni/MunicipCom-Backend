<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {
        $contacts = Contact::all();
        return $contacts;
    }
    public function addContact(Request $request)
    {
        $contact = Contact::create($request->all());
        return response($contact, 201);
    }
}
