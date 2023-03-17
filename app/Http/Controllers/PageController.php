<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkRedirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {
        return view('index', [
            'link' => $request->get('link')
        ]);
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function user(Request $request)
    {
        return view('user');
    }

    public function links(Request $request)
    {
        return view('links', [
            'links' => User::find(Auth::id())->links()->paginate()
        ]);
    }

    public function stats(Request $request)
    {
        $data = DB::table('users')
            ->select('link_redirects.*')
            ->join('user_links', 'user_links.user_id', 'users.id')
            ->join('links', 'links.id', 'user_links.link_id')
            ->join('link_redirects','link_redirects.token', 'links.token')
            ->where('users.id', '=', Auth::id())
            ->paginate();

        return view('stats', [
            'links' => $data
        ]);
    }
}
