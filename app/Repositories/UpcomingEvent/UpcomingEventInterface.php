<?php

namespace App\Repositories\UpcomingEvent;

use App\Repositories\Crud\CrudInterface;

interface UpcomingEventInterface extends CrudInterface
{
	public function create($data);
	public function update($data, $id);
}
