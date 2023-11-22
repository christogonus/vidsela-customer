<?php

namespace App\Livewire;

use Livewire\Component;

class Webinar extends Component
{
    public $video;

    public function render()
    {
        return view('livewire.webinar');
    }

    public function timeChanged($time) {
        dd($time);
    }

}
