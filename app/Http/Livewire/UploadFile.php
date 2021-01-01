<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFile extends Component
{
    use WithFileUploads;

    public $file;
    public $stagiaires;

    public function render()
    {
        return view('livewire.upload-file');
    }   

    public function updatedFile()
    {
        $this->validate([
            'file' => ['nullable', 'mimes:jpeg,bmp,png,gif,svg,pdf', 'max:5000'],
        ]);
    }

    public function save()
    {
        $path = $this->file->store('file', ['disk' => 'public']);

        Document::create([
            'id_stagiaire' => $this->stagiaires->id_stagiaire,
            'path' => $path,
        ]); 

        $this->emit('saved');
    }
}
