<?php

namespace App;

class Tag extends Model
{
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'tag_task');
    }


    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getUserTasksByTags()
    {
        return $this->tasks()->where('user_id', auth()->id())->get();
    }
}
