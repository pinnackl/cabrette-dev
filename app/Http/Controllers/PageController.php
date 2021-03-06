<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Post;
use Input, Auth;

class PageController extends BaseController
{
    public function association()
    {
        $post = Post::where('title', 'association')->first();

        return view('page.association', compact('post'));
    }

    public function cabrette()
    {
        $post = Post::where('title', 'cabrette')->first();

        return view('page.cabrette', compact('post'));
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function postContact()
    {
        $contact = New Contact(Input::all());
        $contact->save();

        return redirect()->back()->with('success', 'Prise de contact bien enregistrée');
    }

    public function cgu()
    {
        return view('page.cgu');
    }

    public function newsletter()
    {
        return view('page.newletter');
    }

    public function partenaires()
    {
        return view('page.partenaires');
    }

    public function postNewsletter()
    {
        $newletter = New Newsletter(Input::all());
        $newletter->save();

        return redirect()->back()->with('success', 'Abonnement à la Newsletter bien enregistré');
    }
}
