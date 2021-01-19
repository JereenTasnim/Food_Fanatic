<?php include "inc/header.php"; ?>
<?php include 'mobadb.php'; ?>


<div class="body">
 <center>
 <?php
  $sql= SELECT r.*, b.* FROM tbl_food r, tbl_branch b WHERE r.branch_id = b.branch_id AND b.branch_id;
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)) {

 ?>
 <table border="1px">
 	<tr>
 		<th>Name</th>
 		<th>Location</th>
 		<th>Contact</th>
 	</tr>

 	<?php
 	while($res=$result->fetch_assoc()) {
 	?>
 	<tr>
 		<td><?php echo $res['food_name']?></td>
 		<td><?php echo $res['food_price']?></td>
 		<td><?php echo $res['food_details']?></td>

 		
 	</tr>
 	<?php } ?>
 </table>
 <?php } ?>
 </center>
</div>

<?php include "inc/footer.php"; ?>

SELECT r.*, b.*, c.* FROM tbl_food r, tbl_branch b,tbl_res c WHERE r.branch_id = b.branch_id AND c.res_id=b.branch_id =

SELECT r.*, b.*, c.* FROM tbl_food r, tbl_branch b,tbl_res c WHERE r.branch_id = b.branch_id AND c.res_id=b.branch_id =".$id;