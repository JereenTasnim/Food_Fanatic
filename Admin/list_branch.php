<?php include "inc/header.php"; ?>
<?php include 'mobadb.php'; ?>

<div class="body">
 <center>
 <?php
    if(isset($_GET['id'])) {
	$id=$_GET['id'];
    } 
    $sql= "SELECT r.* FROM tbl_food r, tbl_branch b WHERE r.branch_id = b.branch_id AND b.res_id =".$id;;
     
    $result=mysqli_query($conn,$sql);
 ?>
 <table border="1px">
 	<tr>
        <th>SL No</th>
 		<th>Food Name</th>
        <th>Price</th>
        <th>Food Details</th>
 	</tr>
     
<?php
	$i=0;
	while($row = mysqli_fetch_assoc($result)) { 
		$i++?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['food_name']; ?></td>
		<td><?php echo $row['food_price']; ?></td>
		<td><?php echo $row['food_details']; ?></td>
		
	</tr>	
	<?php } ?>
 </table>
 </center>
</div>

<?php include "inc/footer.php"; ?>
