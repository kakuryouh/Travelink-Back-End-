<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Transaction;
use App\Models\User;

class BookingController extends Controller
{
    public function view(){
        $user = Auth::user();
        $transactions = Transaction::with([
            'guide.reviews',
            'tour.images',
            'tour.location',
            'tour.meetingPoint',
            'tour.reviews',
            'paymentMethod',
            'booking',
            ])->where('user_id', $user->id)->get();
        
        // dd($transactions);

        return Inertia::render('Bookings', [
            'user' => $user,
            'transactions' => $transactions,
        ]);
    }
}
