<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReadyLink extends Component
{
    /**
     * @var string|null
     */
    public ?string $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $link = null)
    {
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ready-link');
    }
}
