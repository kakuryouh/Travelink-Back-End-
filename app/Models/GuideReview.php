<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuideReview extends Model
{
    protected $table = 'guide_reviews'; // specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = [
        'user_id',
        'guide_id',
        'transaction_id',
        'review_text',
    ]; // specify the fillable attributes for mass assignment

    public function guide()
    {
        return $this->belongsTo(Guide::class, 'guide_id'); // every review belongs to one guide
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id'); // every review is associated with one transaction
    }
}
