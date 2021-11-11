<?php

namespace App\Http\Livewire;

use App\Events\ContactRequested;
use Livewire\Component;

class Contact extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $message = '';
    public ?string $success = null;

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'min:2', 'max:30'],
            'email'   => ['required', 'email:rfc'], // FIXME dns (bei gutem Internet ;) )
            'phone'   => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'message' => ['required', 'min:20', 'max:1000'],
            // 'claim_number' => ['required', new ClaimNumber],
        ];
    }

    public function submit()
    {
        $validated = $this->validate();

        $this->success = __('Successfully sent contact form');

        event(new ContactRequested($validated));

        $this->reset('name', 'email', 'phone', 'message');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
