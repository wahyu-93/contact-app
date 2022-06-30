<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with(['company'])->where(function($query){
            if(request('company_id')){
                $query->where('company_id', request('company_id'));
            };            
        })->latest()->paginate(5);

        $companies = Company::orderBy('id', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
        
        return view('contact', compact('contacts', 'companies'));
    }
}
