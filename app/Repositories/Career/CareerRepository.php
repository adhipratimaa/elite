<?php
namespace App\Repositories\Career;
use App\Models\Career;
use App\Repositories\Crud\CrudRepository;
class CareerRepository extends CrudRepository implements CareerInterface{
	public function __construct(Career $career){
		$this->model=$career;
	}
	public function create($input){
		
		$value=$input;
		$value['slug']=!empty($input['slug'])? str_slug($input['slug']) : str_slug($input['title']);
		$this->model->create($value);
	}
	public function update($input,$id){
		$career=$this->model->find($id);
		$value=$input;
		if($value['slug']!==$career['slug']){
			$value['slug']=str_slug($input['slug']);
		}
		$this->model->find($id)->update($value);
	}
}