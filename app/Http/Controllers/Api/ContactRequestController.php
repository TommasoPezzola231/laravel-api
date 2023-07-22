<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class ContactRequestController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data, [
            "name" => "required",
            "email" => "required|email",
            "message_subject" => "required",
            "message" => "required",
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    "success" => false,
                    "errors" => $validator->errors(),
                ]
            );
        }

        $data_validated = $validator->validated();

        $newContact = new ContactRequest();
        $newContact->fill($data_validated);
        $newContact->save();

        //$newEmail = new NewContact($data_validated);
        
        
        Mail::to('prova@gmail.com')->send(new NewContact($data_validated));
        return response()->json(
            [
                "Success" => true
            ]
            );
    }
}
