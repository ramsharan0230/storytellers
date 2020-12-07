<?php

namespace App\Repositories\Series;

use App\Models\Series;
use App\Repositories\Crud\CrudRepository;

class SeriesRepository extends CrudRepository implements SeriesInterface
{
	public function __construct(Series $model)
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

	public function find($id)
	{
		return $this->model->find($id);;
	}

	public function destroy($id)
	{
		return $this->model->find($id)->delete();
	}
}
