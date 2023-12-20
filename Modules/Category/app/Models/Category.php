<?php

namespace Modules\Category\app\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use Sluggable ,SoftDeletes;
    protected $fillable = [
                    'name',
                    'body',
                    'parent_id',
                    'is_special',
                    'status',
              ];




    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    public  function parent() : BelongsTo
    {
        return $this->belongsTo(Category::class , 'parent_id');
    }

    public function child() :HasMany
    {
        return  $this->hasMany(Category::class , 'parent_id');
    }







}
