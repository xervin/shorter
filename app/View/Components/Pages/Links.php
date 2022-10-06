<?php

namespace App\View\Components\Pages;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Links extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Collection|LengthAwarePaginator $links) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pages.links');
    }
}
