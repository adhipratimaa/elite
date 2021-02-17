<?php
namespace App\Repositories\Program;
use App\Models\Program;
use App\Repositories\Crud\CrudRepository;
class ProgramRepository extends CrudRepository implements ProgramInterface{
	public function __construct(Program $program){
		$this->model=$program;
	}
	public function create($input){
		
		$value=$input;
		$value['slug']=!empty($input['slug'])? str_slug($input['slug']) : str_slug($input['title']);
		$this->model->create($value);
	}
	public function update($input,$id){
		$blog=$this->model->find($id);
		$value=$input;
		// if($value['slug']!==$blog['slug']){
		// 	$value['slug']=str_slug($input['slug']);
		// }
		$this->model->find($id)->update($value);
	}
}