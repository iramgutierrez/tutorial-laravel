<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            'Web',
            'IOS',
            'Android',
            'QA',
            'Windows Phone'
        ];

        foreach($teams as $team)
        {
            App\Entities\Team::create([
                'name' => $team
            ]);
        }
    }
}
