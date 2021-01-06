<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Livewire\Component;
use Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $comment;
    public $success;

    public function __construct()
    {
        $this->email = Auth::user()->etudiant->tuteur->user['email'];
        $this->name = Auth::user()->etudiant['nom'];
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'comment' => 'required|min:5',
    ];

    public function contactFormSubmit()
    {
        $contact = $this->validate();

        FacadesMail::send('email',
        array(
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            ),
            function($message){
                $message->from('your_email@your_domain.com');
                $message->to('your_email@your_domain.com', 'Bobby')->subject('Your Site Contect Form');
            }
        );

        $this->success = 'Message envoyé au tuteur !';

        $this->clearFields();
    }

    private function clearFields()
    {
        $this->name = '';
        $this->email = '';
        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}