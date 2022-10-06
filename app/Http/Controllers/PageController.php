<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//            'links' => User::find(Auth::id())->links()->paginate()
            'links' => Link::where('id', '>' ,'1')->paginate()
        ]);
    }
}
