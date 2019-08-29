<?php

namespace App\Http\Controllers\WorkingDay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\WorkingDayMaster;

class WorkingDayByYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = '2019';
        $month = '8';
        $yearMonth = $year."-".$month."-";
        $firstDayofTheMonth = $yearMonth."1";
        $workingDayMaster = '1';
        $workingDayMaster = WorkingDayMaster::findOrFail($workingDayMaster);
        $workingDayDetails = $workingDayMaster->workingDayDetails->sortBy('first_date');
        
        $daysInMonth = Carbon::parse($firstDayofTheMonth)->daysInMonth;
        //$nearestWorkingDays = $this->getNearestDay();
        //dd(count($nearestWorkingDays));
        //for($a=1; $a++; $a<=$daysInMonth) {
        for($a=0; $a++; $a<2) {
            dd($a);
            return $day = $yearMonth.$a;
            /*
            for($b=0; $b++; $b<count($nearestWorkingDays)) {
                $startDate = strtotime($nearestWorkingDays[$b]);
                $endDate = strtotime($day);
                $datediff = $endDate - $startDate;
                dd($datediff);
                //Carbon::parse($endDate)->subDays($)
            }
            */
        }
        return $a;
        //return round($datediff / (60 * 60 * 24));

        $startDate = strtotime("2019-01-01");
        $endDate = strtotime("2019-8-10");
        $datediff = $startDate - $endDate;
        //return round($datediff / (60 * 60 * 24));
        //dd($theDate);
        $workingDayMaster = '1';
        $workingDayMaster = WorkingDayMaster::findOrFail($workingDayMaster);
        //return Carbon::now();
    }

    public function getNearestDay()
    {
        $year = '2019';
        $month = '8';
        $yearMonth = $year."-".$month."-1";
        $workingDayMaster = '1';
        $workingDayMaster = WorkingDayMaster::findOrFail($workingDayMaster);
        $workingDayDetails = $workingDayMaster->workingDayDetails->sortBy('first_date');
        $workingDays = [];
        foreach($workingDayDetails as $workingDayDetail) {
            $startDate = strtotime($workingDayDetail->first_date);
            $endDate = strtotime($yearMonth);
            $datediff = $endDate - $startDate;
            $dayBalance = 7 - ($datediff % $workingDayDetail->day_interval);
            $nearestDay = Carbon::parse($endDate)->subDays($dayBalance);
            array_push($workingDays, $nearestDay->format('Y-m-d'));
        }
        return $workingDays;
    }

    public function getInitialWorkingDay()
    {
        //
    }
}
