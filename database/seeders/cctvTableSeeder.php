<?php

namespace Database\Seeders;

use App\Models\cctv;
use Illuminate\Database\Seeder;

class cctvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cctv::create([
            'lokasi' => 'Pasar Pagi Arengka',
            'lat' => '0.4652113',
            'lng' => '101.416535',
            'embed' => 'https://www.youtube.com/watch?v=R3fiQIPhJxg',
        ]);

        cctv::create([
            'lokasi' => 'Universitas Riau',
            'lat' => '0.4764112',
            'lng' => '101.3825528',
            'embed' => 'https://www.youtube.com/watch?v=ckYBTcibJ9o',
        ]);

        cctv::create([
            'lokasi' => 'Mall SKA',
            'lat' => '0.4876186',
            'lng' => '101.4129383',
            'embed' => 'https://www.youtube.com/watch?v=-W6_tzOjwzQ',
        ]);
    }
}
