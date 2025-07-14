<?php

namespace Database\Seeders;

use App\Models\TourImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'https://images.unsplash.com/photo-1573790387438-4da905039392',
            'https://images.unsplash.com/photo-1537996194471-e657df975ab4',
            'https://images.unsplash.com/photo-1512100356356-de1b84283e18',
            'https://images.unsplash.com/photo-1544550581-5f7ceaf7f992',
        ];

        $order = 1;

        TourImage::truncate(); // Clear existing tour images before seeding

        foreach ($images as $image) {
            TourImage::create([
                'tour_id' => 1,
                'image_path' => $image,
                'image_order' => $order, // Assuming all images have the same order for simplicity
                'image_caption' => 'Bali_' . $order, // Assuming the tour ID is 1 for the Bali Beach Hopping Adventure
            ]);
            $order++;
        }
    }
}
