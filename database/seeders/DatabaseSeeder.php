<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CountrySeeder::class,
            CategorySeeder::class,
            DayPhaseSeeder::class,
            LanguageSeeder::class,
            ItemSeeder::class,
            PaymentMethodSeeder::class,
            SpecialitySeeder::class,
            TagSeeder::class,
            PhoneCountryCodeSeeder::class,
            LocationSeeder::class,
            UserSeeder::class,
            GuideSeeder::class,
            GuideSpecialitySeeder::class,
            GuideLanguageSeeder::class,
            MeetingPointSeeder::class,
            TourSeeder::class,
            TourImageSeeder::class,
            TourItinerarySeeder::class,
            TourItemSeeder::class,
            TourCategorySeeder::class,
            TourTagSeeder::class,
            TransactionSeeder::class,
            // BookingSeeder::class,
        ]);
    }
}
