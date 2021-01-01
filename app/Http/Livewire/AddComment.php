<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Remarque;

class AddComment extends Component
{
    public $stagiaires;
    public $remarque;

    public function render()
    {
        return view('livewire.add-comment');
    }

    public function save()
    {
        Remarque::create([
            'id_stagiaire' => $this->stagiaires->id_stagiaire,
            'id_user' => Auth::user()->id,
            'remarque' => $this->remarque,
        ]); 

        $this->emit('saved');
    }
}
