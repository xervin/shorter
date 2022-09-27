<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ResetPassword extends Component
{
    public string $token;
    public ?string $email = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $token, ?string $email = null)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reset-password');
    }
}
