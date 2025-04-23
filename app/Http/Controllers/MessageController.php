<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $posts = Message::orderBy('created_at', 'desc')->get();
        return view('index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'image_url' => 'nullable|string',
        ]);

        $post = new Message;
        $post->name = $validatedData['name'];
        $post->subject = $validatedData['subject'];
        $post->message = $validatedData['message'];
        $post->image_url = $validatedData['image_url'] ?? null;
        $post->save();

        return redirect("/");
    }
}
