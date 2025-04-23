<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $posts = Message::all()->sortByDesc('created_at');
        return view('index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $post = new Message;
        $post->name = $validatedData['name'];
        $post->subject = $validatedData['subject'];
        $post->message = $validatedData['message'];
        $post->save();

        return redirect("/");
    }
}
