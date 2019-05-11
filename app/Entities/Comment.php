<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';
    protected $fillable = ['content', 'article_id'];

    public function article()
    {
        return $this->belongsTo('App\Entities\Article');
    }
}
