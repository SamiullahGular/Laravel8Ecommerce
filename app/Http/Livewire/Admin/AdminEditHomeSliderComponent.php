<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $image;
    public $status;
    public $price;
    public $link;
    public $slide_id;
    public $newImage;

    public function mount($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->slide_id = $slider->id;
    }

    public function updateSlide()
    {
        $slider = HomeSlider::find($this->slide_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->status = $this->status;
        $slider->link = $this->link;
        $old_image = 'assets/images/sliders/'. $this->image;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp. '.'. $this->newImage->extension();
            $this->newImage->storeAs('images/sliders', $imageName);
            $slider->image = $imageName;
            unlink($old_image);
        }

        $slider->save();
        session()->flash('message', 'Slide has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
