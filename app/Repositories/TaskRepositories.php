<?php

namespace App\Repositories;

use App\Task;

class TaskRepository {

	public function fetchAlluserTask()
	{
		return Task::where('user_id', auth()->id())->where('is_deleted', 0)
				 ->latest()
                 ->filter(request(['month', 'year']))
                 ->paginate(5);
	}
}