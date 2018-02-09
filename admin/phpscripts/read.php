<?php

	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		//echo "$queryAll";

		if($runAll){
			return $runAll;
		}else{
			$error = "Something broke!";
			return $error;
		}

		mysqli_close($link);
	}

	function getSingle($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";

		//echo $querySingle;
		$runSingle = mysqli_query($link, $querySingle);

		if($runSingle) {
			return $runSingle;
		}else{
			$error = "Something broke!";
			return $error;
		}

		mysqli_close($link);
	}

	function filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
		include('connect.php');

		$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3} = '{$filter}'";

		//echo $filterQuery;
		$runQuery = mysqli_query($link, $filterQuery);
		if($runQuery) {
			return $runQuery;
		}else {
			$error = "Something broke!";
			return $error;
		}

		mysqli_close($link);
	}

?>
