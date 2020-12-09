<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\Crud\CrudRepository;

class BlogRepository extends CrudRepository implements BlogInterface
{
	public function __construct(Blog $model)
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
