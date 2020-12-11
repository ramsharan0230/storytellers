<?php
namespace App\Repositories\Booking;

use App\Repositories\Crud\CrudInterface;

interface BookingInterface extends CrudInterface
{
	public function create($data);
	public function update($data, $id);
	public function find($id);
	public function destroy($id);
}