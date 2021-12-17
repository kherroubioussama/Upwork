<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    public $message;
    public $type;
    public $styleByType = [
        'error' => 'bg-red-100 border-red-700 text-red-700',
        'success' => 'bg-green-100 border-green-700 text-green-700',
        'info' => 'bg-blue-100 border-blue-700 text-blue-700',
        'warning' => 'bg-yellow-100 border-yellow-700 text-yellow-700',
        
    ];
    protected $listeners= ['flash'=>'setFlashMessage'];
    public function setFlashMessage($message,$type){
        $this->message=$message;
        $this->type=$type;
        $this->dispatchBrowserEvent('flash-message');
    }
    public function render()
    {
        return view('livewire.flash');
    }
}
