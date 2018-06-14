<?php

namespace App;
	
use Carbon\Carbon;

class Task extends Model
{
    public function notes(){
    	 return $this->hasMany(Note::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tag_task');
    }

    public static function archives(){
    	return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                ->groupBy('year' ,'month')
                ->orderByRaw('min(created_at) desc')
                ->where('user_id', auth()->id())
                ->where('is_deleted', 0)
                ->get(); 
    }

   

    public function scopeFilter($query, $filters){
    	if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
}
