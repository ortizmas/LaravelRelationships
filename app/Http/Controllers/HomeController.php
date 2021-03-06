<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Address;
use App\Post;
use App\Role;
use App\Country;
use App\Video;
use App\Tag;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function oneToOne()
    {
        $users = User::findOrFail(1);
        //return $users->address;

        $addresses = Address::findOrFail(1);
        return $addresses->user;
    }

    public function oneToMany()
    {
        $posts = User::find(1)->posts;
        $posts = User::find(1)->posts()->where('title', 'CORPORIS NIHIL EAQUE QUI.')->first();
        $posts = User::where('name', 'Chesley White')->first()->posts()->where('title', 'CORPORIS NIHIL EAQUE QUI.')->first();;

        //return $posts;

        //$users = User::findOrFail(1);
        //return $users->posts;

        $posts = Post::findOrFail(1)->user;
        //dd($posts->with('user')->get());
        return $posts;
    }

    public function manyToMany()
    {
        //$users = User::findOrFail(1);
        //$users->roles()->attach(1);//Asignar rol al usuario 1
        //$users->roles()->detach(1); //Excluir rol para o usuario 1
        //$users->roles()->sync(1);//Sync elimina todos los rols que ten um usuario, faz um detach, logo asigna el rol que le pasamos
        //return $users->roles;

        //$roles = Role::findOrFail(1);
        //return $roles->users;
        //dd($posts->user);
        
        $user = User::find(1);

        //return $user->roles;


        foreach ($user->roles as $role) {
            echo $role->pivot;
        }
    }

    public function hasManyThrough()
    {
        $country = Country::findOrFail(3);
        return $country->posts;
    }

    public function polymorphicOneToOne()
    {
        //$post = Post::find(1);
        //$post->comments()->create(['author_email' =>Auth()->user()->email, 'content' => 'Este post me gusta']);
        
        $post = post::find(1);
        return $post->comments;


        //$video = Video::find(2);
        //$video->comments()->create(['author_email' =>Auth()->user()->email, 'content' => 'Este video me gusta']);
        
        //$video = Video::find(2);
        //return $video->comments;
    }

    public function polymorphicOneToMany()
    {
        $post = Post::find(1);
        return $post->tags;

        //$video = Video::find(2);
        //return $video->tags;
        //return $video->tags[0]->pivot;
        
        // $tag = Tag::find(1);
        // return $tag->posts;
        

        //$post = Post::find(3);
        //return $post->tags()->attach([1, 2]); //Digo que me agregue a etiqueta de php e laravel
    }

    public function getScope()
    {
        $postByAutor = Post::ByAuthorId(9)->get();
        //dd($postByAutor);
        return view('scope', compact('postByAutor'));
    }
}




























