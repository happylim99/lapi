<?php

namespace App\Http\Controllers\WorkingDayDetail;

use App\Models\WorkingDayDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class WorkingDayDetailController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingDayDetail = WorkingDayDetail::all();
        return $this->showAll($workingDayDetail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'first_date' => 'required|date',
            'day_interval' => 'required|numeric',
            'working_day_master_id' => 'required|exists:working_day_masters,id'
        ];

        $this->validate($request, $rules);

        $data = $request->only('first_date','day_interval','working_day_master_id');

        $workingDayDetail = WorkingDayDetail::create($data);
        return $this->showOne($workingDayDetail, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkingDayDetail  $workingDayDetail
     * @return \Illuminate\Http\Response
     */
    public function show(WorkingDayDetail $workingDayDetail)
    {
        return $this->showOne($workingDayDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkingDayDetail  $workingDayDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingDayDetail $workingDayDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkingDayDetail  $workingDayDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkingDayDetail $workingDayDetail)
    {
        $rules = [
            'first_date' => 'required|date',
            'day_interval' => 'required|numeric',
            'working_day_master_id' => 'required|exists:working_day_masters,id'
        ];

        $this->validate($request, $rules);

        if($request->has('first_date')) {
            $workingDayDetail->first_date = $request->first_date;
        }
        if($request->has('day_interval')) {
            $workingDayDetail->day_interval = $request->day_interval;
        }
        if($request->has('working_day_master_id')) {
            $workingDayDetail->working_day_master_id = $request->working_day_master_id;
        }

        if(!$workingDayDetail->isDirty()) {
            return $this->errorResponse('You need to specify a different value to update', 422);
        }

        $workingDayDetail->save();

        return $this->showOne($workingDayDetail, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkingDayDetail  $workingDayDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingDayDetail $workingDayDetail)
    {
        $workingDayDetail->delete();
        return $this->showOne($workingDayDetail);
    }
}
