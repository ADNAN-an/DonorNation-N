<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use App\Donner;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function store(Request $request)
    {
        $contact = new Contact();

        $contact->name = $request->input('Name');
        $contact->email = $request->input('Email');
        $contact->object = $request->input('Object');
        $contact->message = $request->input('Message');

        $contact->save();

        return redirect()->route('home', ['#contact-us'])->with('success', __('site.contact_success'));
    }

    // blog method
    public function blog()
    {
        $posts = Post::paginate(6);
        return view('blog.blog', ['posts' => $posts]);
    }

    // method for single post
    public function single_post($slug)
    {
        $post = Post::where('slug', $slug)->first();
       
        return view('blog.blog_show', ['post' => $post]);
    }

    // method for donner_sang
    public function donner_sang()
    {
        return view('donner_sang');
    }

    // method for save donneur de sang with map
    public function save_donneur_du_sang(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'url' => 'required',
        ], [
            'date.required' => trans('Veuillez sélectionner une date'),
            'url.required' => "Veuillez sélectionner un centre de don",
        ]);

        Donner::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'prenom' => Auth::user()->prenom,
            'mobile' => Auth::user()->phone_number,
            'donner_date'       => $request->get('date'),
            'donner_url_map'    => $request->get('url'),
            'donner_latitude'   => $request->get('lat'),
            'donner_langtitude' => $request->get('lng'),
        ]);

        return redirect()->back()->with('success', 'Félicitations ! Votre réservation a été effectuée avec succès.');
    }
}
