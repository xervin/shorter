<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkSetRequest;
use App\Services\Link\LinkStorage;
use App\Services\Link\Structures;
use App\Services\TokenGenerator;

class LinkController extends Controller
{
    /**
     * @param LinkStorage $linkStorage
     */
    public function __construct(private readonly LinkStorage $linkStorage) {}

    public function set(LinkSetRequest $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->linkStorage->save(
            new Structures\Link(
                $request->validated()['custom-name'] ?? TokenGenerator::generate(),
                $request->validated()['link'],
                $request->ip(),
                $request->validated()['custom-name']
            )
        );

        return redirect()->route('pages.index',[
            'link' => $result->link(),
        ]);
    }

    public function redirect(string $token)
    {
        $result = $this->linkStorage->get($token);

        if ($result->success()) {
            return redirect()->to($result->link());
        }

        abort(404);
    }
}
