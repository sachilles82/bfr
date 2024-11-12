<?php

namespace Database\Seeders\HR;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $industries = [
            'Gibser & Maler',
            'Maurer',
            'Zimmerei',
            'Dachdecker',
            'Elektriker',
            'Sanitär & Heizung',
            'Bodenleger',
            'Fliesenleger',
            'Tiefbau',
            'Gerüstbau',
        ];

        foreach ($industries as $industry) {
            DB::table('industries')->insert([
                'name' => $industry,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
