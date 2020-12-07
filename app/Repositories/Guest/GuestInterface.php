<?php

namespace App\Repositories\Guest;

use App\Repositories\Crud\CrudInterface;

interface GuestInterface extends CrudInterface
{
	public function create($data);
	public function update($data, $id);
	public function destroy($id);
}
