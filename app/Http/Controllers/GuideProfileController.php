<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Guide;
use App\Models\User;


class GuideProfileController extends Controller
{
    public function user_view(Guide $guide){
        $guide->load(['tours.dayphase', 'specialities', 'languages', 'country']);
        $user = Auth::User();

        // dd($guide);

        return Inertia::render('GuideProfile', [
            'guide' => $guide,
            'user' => $user,

        ]);
    }
}
