<?php

namespace App\Repositories\Event;

use App\Repositories\Crud\CrudInterface;

interface EventInterface extends CrudInterface
{
	public function create($data);
	public function update($data, $id);
}
