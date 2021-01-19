<?php include "inc/header.php"; ?>
<?php $db = new Database(); ?>

<center>
<?php if(isset($_POST['approve'])) {
	$branch_id = $_POST['branch_id'];

	$query = "UPDATE tbl_branch SET status='approved' WHERE branch_id=".$branch_id;
	$db->update($query);
}

	if(isset($_GET['msg'])) {
	echo "<span style='color:green'>".$_GET['msg']."</span>";
	}
?>
</center>
<div class="body">
 <center>
 <?php
 $query="SELECT r.res_name, b.* FROM tbl_branch b, tbl_res r WHERE r.res_id = b.res_id AND status = 'pending'";
 $result = $db->select($query);
 if($result->num_rows > 0) {
 ?>
 <table border="1px">
 	<tr>
 		<th>Name</th>
 		<th>Location</th>
 		<th>Contact</th>
 		<th>Action</th>
 	</tr>

 	<?php
 	while($res=$result->fetch_assoc()) {
 	?>
 	<tr>
 		<td><?php echo $res['res_name']?></td>
 		<td><?php echo $res['location']?></td>
 		<td><?php echo $res['mobile']?></td>

 		<form method="POST" action="admin_panel.php">
 		<input type="hidden" name="branch_id" value="<?php echo $res['branch_id']; ?>">
 		<td><input type="submit" value="Approve" name="approve"></td>
 		</form>
 	</tr>
 	<?php } ?>
 </table>
 <?php } ?>
 </center>
</div>

<?php include "inc/footer.php"; ?>