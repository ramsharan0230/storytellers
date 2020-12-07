<?php

namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\Crud\CrudRepository;

class EventRepository extends CrudRepository implements EventInterface
{
	public function __construct(Event $model)
	{
		$this->model = $model;
	}
	public function create($data)
	{
		$detail = $this->model->create($data);
		return $detail;
	}
	public function update($data, $id)
	{
		return $this->model->find($id)->update($data);
	}
}
