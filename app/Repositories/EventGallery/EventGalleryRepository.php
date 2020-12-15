<?php

namespace App\Repositories\EventGallery;

use App\Models\EventGallery;
use App\Repositories\Crud\CrudRepository;

class EventGalleryRepository extends CrudRepository implements EventGalleryInterface
{
	public function __construct(EventGallery $model)
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
