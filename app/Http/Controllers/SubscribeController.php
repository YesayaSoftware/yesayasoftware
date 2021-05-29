<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscribeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        Newsletter::firstOrCreate([
            'email' => $request->email,
        ]);

        return back()
            ->with('success', 'Asante, nitakushtua kila nikiweka jambo jipya.');
    }
}
