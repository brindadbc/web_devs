<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $conversations = $user->conversations()
    //         ->with(['users' => function ($query) use ($user) {
    //             $query->where('users.id', '!=', $user->id);
    //         }])
    //         ->withCount(['messages as unread_count' => function ($query) use ($user) {
    //             $query->where('read', false)
    //                   ->where('user_id', '!=', $user->id);
    //         }])
    //         ->orderBy('last_message_at', 'desc')
    //         ->get();

    //     return view('chat.index', compact('conversations'));
    // }

    // public function show(Conversation $conversation)
    // {
    //     // Vérifier si l'utilisateur fait partie de la conversation
    //     if (!$conversation->users->contains(Auth::id())) {
    //         abort(403);
    //     }

    //     $messages = $conversation->messages()
    //         ->with('user', 'files')
    //         ->orderBy('created_at', 'asc')
    //         ->get();

    //     // Marquer tous les messages comme lus
    //     $conversation->messages()
    //         ->where('user_id', '!=', Auth::id())
    //         ->where('read', false)
    //         ->update(['read' => true]);

    //     $otherUser = $conversation->users()
    //         ->where('users.id', '!=', Auth::id())
    //         ->first();

    //     return view('chat.show', compact('conversation', 'messages', 'otherUser'));
    // }

    // public function create(Request $request)
    // {
    //     $conversations = Conversation::whereHas('users', function ($query) {
    //         $query->where('users.id', Auth::id());
    //     })
    //     ->with(['users' => function ($query) {
    //         $query->where('users.id', '!=', Auth::id());
    //     }, 'lastMessage'])
    //     ->withCount(['messages as unread_count' => function ($query) {
    //         $query->where('read', false)
    //               ->where('user_id', '!=', Auth::id());
    //     }])
    //     ->latest('updated_at')
    //     ->get();

    //     $users = User::where('id', '!=', Auth::id())->get();

    //     return view('chat.create', compact('conversations', 'users'));
    //     // $users = User::where('id', '!=', Auth::id())->get();
    //     // return view('chat.create', compact('users'));
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //     ]);

    //     // Vérifier si une conversation existe déjà entre ces utilisateurs
    //     $existingConversation = Conversation::whereHas('users', function ($query) {
    //         $query->where('users.id', Auth::id());
    //     })->whereHas('users', function ($query) use ($validated) {
    //         $query->where('users.id', $validated['user_id']);
    //     })->first();

    //     if ($existingConversation) {
    //         return redirect()->route('chat.show', $existingConversation);
    //     }

    //     // Créer une nouvelle conversation
    //     $conversation = Conversation::create([
    //         'last_message_at' => now(),
    //     ]);

    //     // Ajouter les utilisateurs à la conversation
    //     $conversation->users()->attach([Auth::id(), $validated['user_id']]);

    //     return redirect()->route('chat.show', $conversation);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'users' => 'required|array|min:1',
    //         'users.*' => 'exists:users,id',
    //         'message' => 'nullable|string'
    //     ]);

    //     // Create new conversation
    //     $conversation = Conversation::create();

    //     // Add current user to the conversation
    //     $conversation->users()->attach(Auth::id());

    //     // Add selected users to the conversation
    //     $conversation->users()->attach($request->users);

    //     // Create initial message if provided
    //     if ($request->filled('message')) {
    //         Message::create([
    //             'conversation_id' => $conversation->id,
    //             'user_id' => Auth::id(),
    //             'content' => $request->message,
    //             'read' => false
    //         ]);
    //     }

    //     return redirect()->route('chat.show', $conversation);
    // }

    // /**
    //  * Display the specified conversation.
    //  *
    //  * @param  \App\Models\Conversation  $conversation
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Conversation $conversation)
    // {
    //     // Check if user is part of the conversation
    //     if (!$conversation->users->contains(Auth::id())) {
    //         abort(403);
    //     }

    //     $conversations = Conversation::whereHas('users', function ($query) {
    //         $query->where('users.id', Auth::id());
    //     })
    //     ->with(['users' => function ($query) {
    //         $query->where('users.id', '!=', Auth::id());
    //     }, 'lastMessage'])
    //     ->withCount(['messages as unread_count' => function ($query) {
    //         $query->where('read', false)
    //               ->where('user_id', '!=', Auth::id());
    //     }])
    //     ->latest('updated_at')
    //     ->get();

    //     // Get conversation messages
    //     $messages = $conversation->messages()
    //         ->with('user')
    //         ->orderBy('created_at')
    //         ->get();

    //     // Mark messages as read
    //     $conversation->messages()
    //         ->where('user_id', '!=', Auth::id())
    //         ->where('read', false)
    //         ->update(['read' => true]);

    //     // Get conversation participants (excluding current user)
    //     $participants = $conversation->users()
    //         ->where('users.id', '!=', Auth::id())
    //         ->get();

    //     return view('chat.show', compact('conversation', 'conversations', 'messages', 'participants'));
    // }

    // /**
    //  * Send a message to the conversation.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Conversation  $conversation
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sendMessage(Request $request, Conversation $conversation)
    // {
    //     $request->validate([
    //         'message' => 'required|string'
    //     ]);

    //     // Check if user is part of the conversation
    //     if (!$conversation->users->contains(Auth::id())) {
    //         abort(403);
    //     }

    //     // Create new message
    //     $message = Message::create([
    //         'conversation_id' => $conversation->id,
    //         'user_id' => Auth::id(),
    //         'content' => $request->message,
    //         'read' => false
    //     ]);

    //     // Update conversation timestamp
    //     $conversation->touch();

    //     return back();
    // }


    public function index()
    {
        $conversations = Conversation::whereHas('users', function ($query) {
            $query->where('users.id', Auth::id());
        })
        ->with(['users' => function ($query) {
            $query->where('users.id', '!=', Auth::id());
        }, 'lastMessage'])
        ->withCount(['messages as unread_count' => function ($query) {
            $query->where('read', false)
                  ->where('user_id', '!=', Auth::id());
        }])
        ->latest('updated_at')
        ->get();

        return view('chat.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new conversation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conversations = Conversation::whereHas('users', function ($query) {
            $query->where('users.id', Auth::id());
        })
        ->with(['users' => function ($query) {
            $query->where('users.id', '!=', Auth::id());
        }, 'lastMessage'])
        ->withCount(['messages as unread_count' => function ($query) {
            $query->where('read', false)
                  ->where('user_id', '!=', Auth::id());
        }])
        ->latest('updated_at')
        ->get();

        $users = User::where('id', '!=', Auth::id())->get();

        return view('chat.create', compact('conversations', 'users'));
    }

    /**
     * Store a newly created conversation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'users' => 'required|array|min:1',
            'users.*' => 'exists:users,id',
            'message' => 'nullable|string'
        ]);

        // Create new conversation
        $conversation = Conversation::create();

        // Add current user to the conversation
        $conversation->users()->attach(Auth::id());

        // Add selected users to the conversation
        $conversation->users()->attach($request->users);

        // Create initial message if provided
        if ($request->filled('message')) {
            Message::create([
                'conversation_id' => $conversation->id,
                'user_id' => Auth::id(),
                'content' => $request->message,
                'read' => false
            ]);
        }

        return redirect()->route('chat.show', $conversation);
    }

    /**
     * Display the specified conversation.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        // Check if user is part of the conversation
        if (!$conversation->users->contains(Auth::id())) {
            abort(403);
        }

        $conversations = Conversation::whereHas('users', function ($query) {
            $query->where('users.id', Auth::id());
        })
        ->with(['users' => function ($query) {
            $query->where('users.id', '!=', Auth::id());
        }, 'lastMessage'])
        ->withCount(['messages as unread_count' => function ($query) {
            $query->where('read', false)
                  ->where('user_id', '!=', Auth::id());
        }])
        ->latest('updated_at')
        ->get();

        // Get conversation messages
        $messages = $conversation->messages()
            ->with('user')
            ->orderBy('created_at')
            ->get();

        // Mark messages as read
        $conversation->messages()
            ->where('user_id', '!=', Auth::id())
            ->where('read', false)
            ->update(['read' => true]);

        // Get conversation participants (excluding current user)
        $participants = $conversation->users()
            ->where('users.id', '!=', Auth::id())
            ->get();

        return view('chat.show', compact('conversation', 'conversations', 'messages', 'participants'));
    }

    /**
     * Send a message to the conversation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request, Conversation $conversation)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        // Check if user is part of the conversation
        if (!$conversation->users->contains(Auth::id())) {
            abort(403);
        }

        // Create new message
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'content' => $request->message,
            'read' => false
        ]);

        // Update conversation timestamp
        $conversation->touch();

        return back();
    }
}
