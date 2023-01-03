<?php

namespace App\Http\Livewire;

use App\Models\Messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chat extends Component
{
    public $message;
    protected $rules = [
        'message' => 'required',
    ];

    public function render()
    {
        $messages = DB::table('messages')
            ->leftJoin('users', 'users.id', '=', 'messages.user-id')
            ->select('messages.*', 'users.name')
            ->latest()
            ->take(10)
            ->get()
            ->sortBy('id');
//        $messages = Messages::with('user')->latest()->take(10)->get()->sortBy('id');

        return view('livewire.chat', compact( 'messages'));
    }

    public function sendMessage()
    {
        $this->validate();
        Messages::create([
            'user-id' => Auth::user()->id,
            'message' => $this->message
        ]);
        $this->reset('message');
    }
}
