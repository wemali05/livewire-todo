<?php

namespace App\Http\Livewire\Todo;

use Log;
use Livewire\Component;

class TodoNotificationComponent extends Component
{
    public $listeners = [
        "flash_message" => "flashMessage"
    ];

    public function flashMessage($type, $msg)
    {
        session()->flash($type, $msg);
    }

    public function render()
    {
        return view('livewire.todo.todo-notification');
    }
}
