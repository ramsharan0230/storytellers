<?php

namespace App\Repositories\Series;

use App\Repositories\Crud\CrudInterface;

interface SeriesInterface extends CrudInterface
{
	public function create($data);
	public function update($data, $id);
	public function find($id);
	public function destroy($id);
}
