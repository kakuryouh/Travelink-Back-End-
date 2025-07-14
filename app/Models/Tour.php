<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tour extends Model
{

    protected $table = 'tours'; // specify the table name if it doesn't follow Laravel's naming convention

    protected $fillable = [
        'tour_name',
        'tour_location_id',
        'tour_description',
        'tour_guide_id',
        'tour_price',
        'tour_duration',
        'tour_start_time',
        'tour_period_id',
        'tour_max_participants',
        'tour_min_participants',
    ]; // specify the fillable attributes for mass assignment

    // Get tour location
    public function location()
    {
        return $this->belongsTo(Location::class, 'tour_location_id'); // every tour only have one location
    }

    // Get tour meeting point
    public function meetingPoint()
    {
        return $this->belongsTo(MeetingPoint::class, 'tour_meeting_point_id'); // every tour only have one meeting point
    }

    // Get tour guide
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tour_tags', 'tour_id', 'tag_id')->withTimestamps(); // every tour can have many tags through tour_tag
    }

    // Get tour guide
    public function images()
    {
        return $this->hasMany(TourImage::class, 'tour_id')->orderBy('image_order', 'asc');; // every tour have one or more images
    }

    // Get tour categories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'tour_categories', 'tour_id', 'category_id')->withTimestamps(); // every tour can have many categories through tour_categories
    }
    
    // Get tour day phase
    public function dayphase()
    {
        return $this->belongsTo(DayPhase::class, 'tour_period_id'); // every tour belongs to one day phase
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'tour_items')
                    ->withPivot('is_included') // 1. Tell Eloquent to fetch this column
                    ->withTimestamps()
                    ->using(TourItem::class); // 2. Tell it to use your custom pivot model
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class, 'tour_guide_id'); // every tour belongs to one guide
    }

    public function itineraries()
    {
        return $this->hasMany(TourItinerary::class, 'tour_id')->orderBy('step_number', 'asc'); // every tour can have many itineraries
    }

    public function reviews()
    {
        return $this->hasMany(TourReview::class, 'tour_id'); // every tour can have many reviews
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'tour_id'); // every tour can have many transactions
    }

   protected $appends = ['slug'];

    // ... your relationships ...

    /**
     * Get the tour's URL-friendly slug using traditional accessor syntax.
     */
    public function getSlugAttribute(): string
    {
        return Str::slug($this->tour_name);
    }
};
