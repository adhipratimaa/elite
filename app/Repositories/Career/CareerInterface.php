<?php
namespace App\Repositories\Career;
use App\Repositories\Crud\CrudInterface;
interface CareerInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}