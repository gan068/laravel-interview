<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Article extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';
    protected $fillable = ['title','content'];

    public function comments()
    {
        return $this->hasMany('App\Entities\Comment', 'article_id', 'id');
    }
}
