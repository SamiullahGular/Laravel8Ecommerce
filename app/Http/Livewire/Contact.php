<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact as Con;
use App\Models\Setting;

class Contact extends Component
{
    public $email;
    public $phone;
    public $comment;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required',
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required',
        ]);

        $contact = new Con();
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();

        session()->flash('message', 'Thank you, Your message has been sent successfully.');
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.contact', ['setting'=> $setting])->layout('layouts.base');
    }
}
