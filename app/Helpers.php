<?php

if ( ! function_exists('rupiah'))
{
	function toRupiah($nilai){

		return "Rp ".number_format($nilai,0,',','.').",-";
	}
}

if ( ! function_exists('toArrayEloquent'))
{
	function toArrayEloquent($obj, $yangDiambil){

		$arr = array();
		foreach($obj as $kol=>$val){
			$arr[] = $val->$yangDiambil;
		}

		return $arr;
	}
}