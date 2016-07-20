<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Announce;
use App\Models\Media;
use App\Models\Newsletter;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Input, Auth;

class PageController extends BaseController
{
    public function association()
    {
        $post = Post::where('title', 'association')->first();

        return view('admin.page.association', compact('post'));
    }

    public function cabrette()
    {
        $post = Post::where('title', 'cabrette')->first();

        return view('admin.page.cabrette', compact('post'));
    }

    public function newsletter()
    {
        $post = Post::where('title', 'newsletter')->first();

        return view('admin.page.newsletter', compact('post'));
    }

    public function sendNewsletter()
    {
        $userNewsletter = Newsletter::all();
        $newsletter = Post::where('title', 'newsletter')->first();

        foreach($userNewsletter as $user) {
            Mail::send('emails.newsletter', ['user' => $user, 'newsletter' => $newsletter], function ($m) use ($user) {
                $m->to($user->email)->subject('Newsletter');
            });
        }

        return redirect()->back()->with('success', 'Newsletter bien envoyé aux utilisateus abonnés');
    }

    public function contact()
    {
        return view('admin.page.contact');
    }
}
