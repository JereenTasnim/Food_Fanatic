<?php include "inc/header.php"; ?>

<div class="body">
<?php
$db = new Database();
$query = "SELECT * FROM tbl_res, tbl_branch where tbl_res.res_id=tbl_branch.res_id AND tbl_branch.status='approved'";
//$query = "SELECT r.*, b.* FROM tbl_res r, tbl_branch b WHERE r.res_id = b.res_id AND b.res_id =".$id;
$result = $db->select($query);
?>

<table>
	<tr>
		<th>SL No.</th>
		<th>Restaurant</th>
        <th>Location</th>
        <th>Email</th>
        <th>Password</th>
	</tr>
	<?php
	$i=0;
	while($row = $result->fetch_assoc()) { 
		$i++?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><a href="list_branch.php?id=<?php echo $row['res_id']; ?>"><?php echo $row['res_name']; ?></a></td>
        <td><a href="list_branch.php?id=<?php echo $row['res_id']; ?>"><?php echo $row['location']; ?></a></td>
        <td><a href="list_branch.php?id=<?php echo $row['res_id']; ?>"><?php echo $row['res_email']; ?></a></td>
        <td><a href="list_branch.php?id=<?php echo $row['res_id']; ?>"><?php echo $row['res_pass']; ?></a></td>
	</tr>	
	<?php } ?>
</table>
</div>

<?php include "inc/footer.php"; ?>