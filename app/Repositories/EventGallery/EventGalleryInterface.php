<?php

namespace App\Repositories\EventGallery;

use App\Repositories\Crud\CrudInterface;

interface EventGalleryInterface extends CrudInterface
{
	public function create($data);
	public function update($data, $id);
}
