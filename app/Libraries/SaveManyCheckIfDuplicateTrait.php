<?php namespace App\Libraries;


use DB;

trait SaveManyCheckIfDuplicateTrait{

	public function getId($array, $objRelation){
		$id=array();
		foreach($array as $data){
			$obj  = $objRelation->firstOrCreate(["name"=>$data]);
			$id[] = $obj->id;
		}

		return $id;
	}

}