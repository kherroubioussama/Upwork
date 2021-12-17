<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{
    public $job;

    public function addLike(){
        if ($this->isAuth()) {
            auth()->user()->likes()->toggle($this->job->id);
        } else {
            $this->emit('flash', 'Merci de vous connecter pour ajouter une mission dans vos favoris.', 'error');
            return;
        }
    }
    public function render()
    {
        return view('livewire.job');
    }
    private function isAuth()
    {
        return auth()->check();
    }
}
