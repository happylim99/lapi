<?php

use Illuminate\Database\Seeder;

class WorkingDayDetailSeeder extends Seeder
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
                'first_date' => '2018-12-31',
                'day_interval' => '7',
                'working_day_master_id' => '1'
            ],
            [
                'first_date' => '2019-01-01',
                'day_interval' => '7',
                'working_day_master_id' => '1'
            ],
            [
                'first_date' => '2019-01-02',
                'day_interval' => '7',
                'working_day_master_id' => '1'
            ],
            [
                'first_date' => '2019-01-03',
                'day_interval' => '7',
                'working_day_master_id' => '1'
            ],
            [
                'first_date' => '2019-01-04',
                'day_interval' => '7',
                'working_day_master_id' => '1'
            ]
        ];
        foreach($items as $item) {
            DB::table('working_day_details')->updateOrInsert($item);
        }
    }
}
