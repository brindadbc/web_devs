<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact');
    }
    public function envoyer(request $request)
    {
        $validate = Validator::make([
            "nom" => $request->input('nom'),
            "email" => $request->input('email'),
            "message" => $request->input('message')
        ],
        [
            "nom" => "required|min:3|max:20|string",
            "email" => "required|email",
            "message" => "required|string|min:10",
        ]);

        $datas = $validate->validated();

        Mail::to(env("MAIL_FROM_ADDRESS"))->send(new ContactMail($datas));

        return redirect()->route("contact")->with("success", "Votre Message a bien été envoyée !");
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
