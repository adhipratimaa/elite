<?php
namespace App\Repositories\Quote;
use App\Models\Quote;
use App\Repositories\Crud\CrudRepository;
class QuoteRepository extends CrudRepository implements QuoteInterface{
	public function __construct(Quote $quote){
		$this->model=$quote;
	}
	public function create($input){
		
		$value=$input;
		$value['slug']=!empty($input['slug'])? str_slug($input['slug']) : str_slug($input['title']);
		$this->model->create($value);
	}
	public function update($input,$id){
		$quote=$this->model->find($id);
		$value=$input;
		if($value['slug']!==$quote['slug']){
			$value['slug']=str_slug($input['slug']);
		}
		$this->model->find($id)->update($value);
	}
}