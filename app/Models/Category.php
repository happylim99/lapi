<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\CategoryTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    public $transformer = CategoryTransformer::class;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    
    public function getAaaAttribute()
    {
        return "aaa";
    }
}
