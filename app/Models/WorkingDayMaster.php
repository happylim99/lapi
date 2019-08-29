<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\WorkingDayDetail;

class WorkingDayMaster extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name'
    ];

    public function workingDayDetails()
    {
        return $this->hasMany(WorkingDayDetail::class);
    }
}
