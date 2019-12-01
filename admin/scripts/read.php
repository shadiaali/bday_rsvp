<?php 

function getAll($tbl){
	include('connect.php');

	$queryAll = 'SELECT * FROM '.$tbl;

	$runAll = $pdo->query($queryAll);

	if($runAll){
		return $runAll;
	}else{
		$error = 'error';
		return $error;
	}
}


function getSingle($tbl, $col, $value){
	include('connect.php');
	$querySingle = 'SELECT * FROM '.$tbl.' WHERE '.$col.' = '.$value;

	$runSingle = $pdo->query($querySingle);
	if($runSingle){
		return $runSingle;
	}else{
		$error = 'error';
		return $error;
	}
}

function filterResults($tbl,$tbl_2,$tbl_3,$col,$col_2,$col_3,$filter){
	include('connect.php');
	
	$filterQuery = 'SELECT * FROM '.$tbl.' as a, ';
	$filterQuery.= $tbl_2.' as b, ';
	$filterQuery.= $tbl_3.' as c ';
	$filterQuery.= 'WHERE a.'.$col.' = c.'.$col;
	$filterQuery.= ' AND b.'.$col_2.' = c.'.$col_2;
	$filterQuery.= ' AND b.'.$col_3.'= "'. $filter.'"';

	$runQuery = $pdo->query($filterQuery);
	if($runQuery){
		return $runQuery;
	}else{
		$error = 'There was a problem';
		return $error;
	}
}