<?php

namespace App\Repositories\Guest;

use App\Models\Guest;
use App\Repositories\Crud\CrudRepository;

class GuestRepository extends CrudRepository implements GuestInterface
{
	public function __construct(Guest $model)
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

	public function destroy($id)
	{
		return $this->model->find($id)->delete();
	}
}
