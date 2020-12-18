<?php

namespace App\Repositories\UpcomingEvent;

use App\Models\UpcomingEvent;
use App\Repositories\Crud\CrudRepository;

class UpcomingEventRepository extends CrudRepository implements UpcomingEventInterface
{
	public function __construct(UpcomingEvent $model)
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
