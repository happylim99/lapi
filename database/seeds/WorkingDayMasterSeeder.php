<?php

use Illuminate\Database\Seeder;

class WorkingDayMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'type_1',
                'description' => '5 working days'
            ],
            [
                'name' => 'type_2',
                'description' => '3-4 working days'
            ],
            [
                'name' => 'type_3',
                'description' => '2-3 working days'
            ]
        ];
        foreach($items as $item) {
            /*
            DB::table('working_day_masters')->updateOrInsert([
                //'id' => $item['id']
            ], $item);
            */
            DB::table('working_day_masters')->updateOrInsert($item);
        }
    }
}
