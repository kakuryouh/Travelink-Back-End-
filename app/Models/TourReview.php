<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourReview extends Model
{

    protected $table = 'tour_reviews'; // specify the table name if it doesn't follow Laravel's naming convention

    protected $fillable = [
        'transaction_id',
        'tour_id',
        'user_id', // assuming there is a user_id to identify the reviewer
        'rating',
        'review',
        'comment',
    ]; // specify the fillable attributes for mass assignment

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id'); // every review belongs to one tour
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id'); // every review is associated with one transaction
    }
}
