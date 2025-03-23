<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\MessageCreated;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Chatbox extends Component
{
    use WithFileUploads;

    public string $message;
    public $image = null;
    public Collection $chatMessages;

    public function mount()
    {
        $this->fill([
            'chatMessages' => Message::with('user')
                ->latest()
                ->take(20)
                ->get()
                ->reverse()
        ]);
    }

    public function render()
    {
        return view('livewire.chatbox', []);
    }

    public function send()
    {
        $this->validate([
            'message' => 'required|min:1',
            'image' => 'nullable|image|max:2054'
        ]);
        $user = Auth::user()->id;
        $record = Message::create([
            'message' => $this->message,
            'user_id' => $user,
            'image' => $this->image ? $this->image->store('uploads', 'public_disk') : null
        ]);
        broadcast(new MessageCreated($record))->toOthers();
        $this->chatMessages->push($record);
        $this->reset(['message', 'image']);
    }

    #[On('echo:message,MessageCreated')]
    public function prependMessageBroadcast(array $payload)
    {
        $this->chatMessages->push(Message::with('user')->find($payload['id']));
    }
}
