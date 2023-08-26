<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BusinessLogoUpload extends Component
{
    use WithFileUploads;

    public $image;

    public function render()
    {
        return view('livewire.business-logo-upload');
    }
}
