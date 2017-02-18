<?php

namespace App\Http\Controllers;

use App\Post;
use App\Contact;
use Auth;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
  public function getCreatePost(Request $request)
  {
    $user = Auth::user();
    return view('createpost', ['user' => $user]);
  }

  public function postCreatePost()
  {
    $user     = Auth::id();
    $post     = new Post();
    $contact  = new Contact();

    $post->title = Request::get('title');
    $post->information = Request::get('information');
    $post->price = Request::get('price');
    $post->user_id = $user;
    $post->save();

    $contact->post_id = $post->id;
    $contact->nohp = Request::get('nohp');
    $contact->email = Request::get('email');
    $contact->pin = Request::get('pin');
    $contact->line = Request::get('line');
    $contact->save();

    if($post && $contact)
    {
      return redirect('/')->with('status', 'Success!');
    }
    else
    {
      return redirect('/')->with('status', 'Failed!');
    }
  }

  public function getEditPost($id)
  {
    $user = Auth::id();
    $post = Post::where('id', $id)->first();

    if($post->user_id == $user)
    {
      return view('editpost',['id' => $id, 'post' => $post]);
    }
    else
    {
      return redirect('/')->with('status', 'You do not have privilege to do this!');
    }
  }

  public function postEditPost($id)
  {
    $user = Auth::id();
    $post = Post::where('id', $id)->first();

    $post->title = Request::get('title');

    if($post->user_id == $user)
    {
      $post->save();
      if($post)
      {
          return redirect('/')->with('status', 'Success!');
      }
      else
      {
          return redirect('/')->with('status', 'Failed!');
      }
    }
    else
    {
      return redirect('/')->with('status', 'Failed!');
    }
  }

  public function getDeletePost($id)
  {
    $user = Auth::id();
    $post = Post::where('id',$id)->first();

    if($post->user_id == $user)
    {
       $post->delete();
       if($post)
       {
         return redirect('/')->with('status', 'Success!');
       }
       else
       {
         return redirect('/')->with('status', 'Failed!');
       }
    }
    else
    {
       return redirect('/')->with('status', 'You do not have privilege to do this!');
    }

  }
}
