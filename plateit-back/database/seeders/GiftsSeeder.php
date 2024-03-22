<?php

namespace Database\Seeders;

use App\Models\Gifts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $giftssData = [
            [
                'name' => 'gifts 1',
                'description' => 'Description for gifts 1',
                'PointsCost' => 100,
                'image' => 'gifts1.jpg',
            ],
            [
                'name' => 'gifts 2',
                'description' => 'Description for gifts 2',
                'PointsCost' => 150,
                'image' => 'gifts2.jpg',
            ],
            [
                'name' => 'gifts 3',
                'description' => 'Description for gifts 3',
                'PointsCost' => 200,
                'image' => 'gifts3.jpg',
            ],
            [
                'name' => 'gifts 4',
                'description' => 'Description for gifts 4',
                'PointsCost' => 250,
                'image' => 'gifts4.jpg',
            ],
            [
                'name' => 'gifts 5',
                'description' => 'Description for gifts 5',
                'PointsCost' => 300,
                'image' => 'gifts5.jpg',
            ],
        ];

        foreach ($giftssData as $data) {
            Gifts::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'PointsCost' => $data['PointsCost'],
                'image' => $data['image'],
            ]);
        }
    }
}
