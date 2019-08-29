<?php

namespace App\Http\Controllers\WorkingDayMaster;

use App\Models\WorkingDayMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;

class WorkingDayMasterController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingDayMaster = DB::table('working_day_masters')->select('*')->get();
        //$workingDayMaster = WorkingDayMaster::all();
        return $this->showAll($workingDayMaster);
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
            'name' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->only('name');
        $workingDayMaster = WorkingDayMaster::create($data);
        return $this->showOne($workingDayMaster, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkingDayMaster  $workingDayMaster
     * @return \Illuminate\Http\Response
     */
    public function show(WorkingDayMaster $workingDayMaster)
    {
        return $this->showOne($workingDayMaster);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkingDayMaster  $workingDayMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingDayMaster $workingDayMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkingDayMaster  $workingDayMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkingDayMaster $workingDayMaster)
    {
        $rules = [
            'name' => 'required'
        ];

        $this->validate($request, $rules);

        if($request->has('name')) {
            $workingDayMaster->name = $request->name;
        }

        if(!$workingDayMaster->isDirty()) {
            return $this->errorResponse('You need to specify a different value to update', 422);
        }

        $workingDayMaster->save();

        return $this->showOne($workingDayMaster, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkingDayMaster  $workingDayMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingDayMaster $workingDayMaster)
    {
        $workingDayMaster->delete();
        return $this->showOne($workingDayMaster);
    }
}
