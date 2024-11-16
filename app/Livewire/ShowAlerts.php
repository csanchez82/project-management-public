<?php

namespace App\Livewire;

use Livewire\Component;

class ShowAlerts extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.show-alerts');
    }
}
