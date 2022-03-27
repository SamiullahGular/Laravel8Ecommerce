<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Contact;
use App\Models\Contact as ModelsContact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contacts = ModelsContact::paginate(12);
        return view('livewire.admin.admin-contact-component', ['contacts'=> $contacts])->layout('layouts.base');
    }
}
