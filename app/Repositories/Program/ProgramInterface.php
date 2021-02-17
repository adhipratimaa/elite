<?php
namespace App\Repositories\Program;
use App\Repositories\Crud\CrudInterface;
interface ProgramInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}