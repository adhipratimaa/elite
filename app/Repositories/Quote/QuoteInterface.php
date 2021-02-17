<?php
namespace App\Repositories\Quote;
use App\Repositories\Crud\CrudInterface;
interface QuoteInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}