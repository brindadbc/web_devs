<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     Message::create($validated);

    //     return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    // }

    // public function index()
    // {
    //     $messages = Message::orderBy('created_at', 'desc')->paginate(10);
    //     return view('admin.messages.index', compact('messages'));
    // }

    // public function show(Message $message)
    // {
    //     // Marquer comme lu
    //     if (!$message->is_read) {
    //         $message->is_read = true;
    //         $message->save();
    //     }

    //     return view('admin.messages.show', compact('message'));
    // }

    // public function destroy(Message $message)
    // {
    //     $message->delete();
    //     return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    // }
    public function store(Request $request, Conversation $conversation)
    {
        // Vérifier si l'utilisateur fait partie de la conversation
        if (!$conversation->users->contains(Auth::id())) {
            abort(403);
        }

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'read' => false,
        ]);

        // Mettre à jour la date du dernier message
        $conversation->update(['last_message_at' => now()]);

        // Émettre un événement pour la mise à jour en temps réel
        broadcast(new MessageSent($message->load('user')))->toOthers();

        return response()->json($message->load('user'));
    }
}
