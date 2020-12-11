<?php

namespace App\Repositories\Booking;

use App\Models\Booking;
use App\Repositories\Crud\CrudRepository;
use App\Repositories\Booking\BookingInterface;

class BookingRepository extends CrudRepository implements BookingInterface
{
	public function __construct(Booking $model)
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
