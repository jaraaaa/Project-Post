<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PublicController;

class PublicController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('homepage', 'careers');
    }

    public function homepage() {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('articles'));
    }

    public function aboutUs() {
        return view('aboutUs');
    }

    public function contactUs() {
        return view('contactUs');
    }

    public function submit(Request $request){
        $email=$request->input('email');
        $username=$request->input('username');
        $description=$request->input('description');

        Mail::to('devdynasty@mail.com')->send(new ContactMail($email, $username, $description));

        return redirect(route('homepage'));
    }

    public function careers(){
        return view('careers');
    }

    public function careersSubmit(Request $request){
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));

        switch($role) {
            case 'admin' :
                $user->is_admin = NULL;
                break;
            case 'revisor' :
                $user->is_revisor = NULL;
                break;
            case 'writer' :
                $user->is_writer = NULL;
                break;
        }

        $user->update();

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato');

    }




}