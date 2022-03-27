<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlide($id)
    {
        $slide = HomeSlider::find($id);
        $slide->delete();
        unlink('assets/images/sliders/'.$slide->image);
        session()->flash('message', 'Slide has been deleted successfully!');
    }
    
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['sliders'=> $sliders])->layout('layouts.base');
    }
}
