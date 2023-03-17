<?php

namespace App\Console\Commands;

use App\Models\LinkRedirect;
use App\Services\Link\RedirectStorage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class saveRedirects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redirects:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save redirects count from temporary storage in database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $redirects = RedirectStorage::list();
        if (!empty($redirects)) {
            DB::transaction(function () use ($redirects) {
                foreach ($redirects as $token => $count) {
                    $linkRedirect = LinkRedirect::where('token', $token)->first();
                    if ($linkRedirect === null) {
                        $linkRedirect = new LinkRedirect();
                        $linkRedirect->token = $token;
                    }
                    $linkRedirect->redirection_count += $count;
                    $linkRedirect->save();
                }
            });
            RedirectStorage::clear();
        }
    }
}
