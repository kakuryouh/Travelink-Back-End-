<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{

    protected $table = 'guides'; // specify the table name if it doesn't follow Laravel's naming convention
    
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'phone_country_code_id',
        'phone_number',
        'country_id',
        'profile_picture',
        'About',
        'password',
    ]; // specify the fillable attributes for mass assignment


    public function languages()
    {
        return $this->belongsToMany(Language::class, 'guide_languages', 'guide_id', 'language_id')->withTimestamps(); // every guide can speak many languages through guide_languages
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'tour_guide_id'); // every guide can be associated with many tours through tour_guides
    }

    public function reviews()
    {
        return $this->hasMany(GuideReview::class, 'guide_id'); // every guide can have many reviews
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'guide_specialities', 'guide_id', 'speciality_id')->withTimestamps(); // every guide can have many specialities through guide_specialities
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id'); // every guide belongs to one country
    }

    public function phoneCountryCode()
    {
        return $this->belongsTo(PhoneCountryCode::class, 'phone_country_code_id'); // every guide belongs to one phone country code
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'guide_id'); // every guide can be associated with many transactions
    }
}
