<?php

namespace App\Listeners;

use App\Events\LinkAdded;
use App\Services\Link\LinkStorage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddLinkToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private readonly LinkStorage $linkStorage)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LinkAdded  $event
     * @return void
     */
    public function handle(LinkAdded $event)
    {
        $this->linkStorage->attachLinkToUser($event->link);
    }
}
