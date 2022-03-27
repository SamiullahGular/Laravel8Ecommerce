<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddHomeSilderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $image;
    public $status;
    public $price;
    public $link;

    public function mount()
    {
        $this->status = 0;
    }

    public function addSlide()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->status = $this->status;
        $slider->link = $this->link;

        $imageName = Carbon::now()->timestamp. '.'. $this->image->extension();
        $this->image->storeAs('images/sliders', $imageName);
        $slider->image = $imageName;

        $slider->save();
        session()->flash('message', 'Slide has been added successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-silder-component')->layout('layouts.base');
    }
}
