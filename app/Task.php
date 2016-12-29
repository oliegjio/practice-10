<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'user_id'];

    /**
     * Get the user that owns the task.
     */
    function user()
    {
      return $this->belongsTo(User::class);
    }
}
