<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with(['company'])->latest()->paginate(5);
        $companies = Company::pluck('id', 'name')->all();

        return view('contact', compact('contacts', 'companies'));
    }
}
