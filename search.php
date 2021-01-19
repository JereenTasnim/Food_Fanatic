<?php
include "lib/config.php";
include "lib/Database.php";
$db = new Database();

if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	$id_get = $_GET['id'];
	
	if($id_get == 1) {
		$query = "SELECT * FROM tbl_res WHERE res_name LIKE '%$s%'";
		$result = $db->select($query);

		while($row = $result->fetch_assoc()){
			$name = $row['res_name'];
			$id = $row['res_id'];
			$email = $row['res_email'];
			echo "<div style='' id='searchtitle'>"."<a style='font-family: verdana; text-decoration: none; color: black; cursor: pointer;' href='details.php?id=".$id."'>".$name." </a>"."</div>";
	} 
}
    if($id_get == 1) {
		$sql = "SELECT * FROM tbl_res ,tbl_branch WHERE location LIKE '%$s%' AND tbl_res.res_id=tbl_branch.res_id";
		$result = $db->select($sql);
		
		while($row = $result->fetch_assoc()){
			
			$area_name = $row['res_name'];
			$area_id = $row['branch_id'];
			echo "<div style='' id='searchtitle'>"."<a style='font-family: verdana; text-decoration: none; color: black; cursor: pointer;' href='search_doc_area.php?id=".$area_id."'>".$area_name."</a>"."</div>";
	}
}
	
}

?>