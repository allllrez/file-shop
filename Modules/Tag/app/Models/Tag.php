<?php

namespace Modules\Tag\app\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use Sluggable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [

        'name',
        'status'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }




}
