<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        Contact::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ]);

        return Redirect::back();
    }
}
