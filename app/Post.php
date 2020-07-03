<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'body', 'post_image'];

    /**
     * One to one inverse relationship
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
