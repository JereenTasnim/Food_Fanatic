<?php include "inc/header.php";
$db = new Database();
?>

<?php
if(isset($_POST['add'])) {
	$location = mysqli_real_escape_string($db->link, $_POST['location']);
    $mobile =  mysqli_real_escape_string($db->link, $_POST['mobile']);
    $facebook = mysqli_real_escape_string($db->link, $_POST['facebook']);
    $open = mysqli_real_escape_string($db->link, $_POST['open']);
    $close = mysqli_real_escape_string($db->link, $_POST['close']);
    $capacity = mysqli_real_escape_string($db->link, $_POST['capacity']);
    $credit_card = mysqli_real_escape_string($db->link, $_POST['credit_card']);
    $wifi = mysqli_real_escape_string($db->link, $_POST['wifi']);
    $home_delivery = mysqli_real_escape_string($db->link, $_POST['home_delivery']);
    $reservation = mysqli_real_escape_string($db->link, $_POST['reservation']);
    $buffet = mysqli_real_escape_string($db->link, $_POST['buffet']);
    $live_music = mysqli_real_escape_string($db->link, $_POST['live_music']);
    $kids_zone = mysqli_real_escape_string($db->link, $_POST['kids_zone']);
    $smoking_zone = mysqli_real_escape_string($db->link, $_POST['smoking_zone']);
    $res_id = $_SESSION['id'];

    if($location == "" || $mobile == "" || $facebook == "" || $open == "" || $close == "" || $capacity == "" || $credit_card == "" || $wifi == "" || $home_delivery == "" || $reservation == "" || $buffet == "" || $live_music == "" || $kids_zone == "" || $smoking_zone == "") {
        $error = "Field must not be empty!!";
    }
    else {
        $query = "INSERT INTO tbl_branch(location, mobile, facebook, open, close, capacity, credit_card, wifi, home_delivery, reservation, buffet, live_music, kids_zone, smoking_zone, res_id, status) VALUES ('$location', '$mobile', '$facebook', '$open', '$close', '$capacity', '$credit_card', '$wifi', '$home_delivery', '$reservation', '$buffet', '$live_music', '$kids_zone', '$smoking_zone', $res_id, 'pending')";
        $create = $db->insert($query, 2);
    }
}

else if(isset($_POST['add_food'])) {
	$food_name = $_POST['food_name'];
	$food_price = $_POST['food_price'];
	$food_details = $_POST['food_details'];

	foreach ($_POST['branch'] as $branch) {
		$query = "INSERT INTO tbl_food(food_name, food_price, food_details, branch_id) VALUES ('$food_name', '$food_price', '$food_details', $branch)";

		$db->select($query, 3);
	}
}
?>

<script type="text/javascript">
	function toggle_add_branch() {

		if (document.getElementById("body_add_branch").style.display == "block") {
			document.getElementById("body_add_branch").style.display = "none";
			document.getElementById("body_add_food").style.display = "none";
		} else {
			document.getElementById("body_add_branch").style.display = "block";
			document.getElementById("body_add_food").style.display = "none";
		}
	}

	function toggle_add_food() {

		if (document.getElementById("body_add_food").style.display == "block") {
			document.getElementById("body_add_food").style.display = "none";
			document.getElementById("body_add_branch").style.display = "none";
		} else {
			document.getElementById("body_add_food").style.display = "block";
			document.getElementById("body_add_branch").style.display = "none";
		}
	}
</script>

<div class="body">
	<div class="body-action ">
		<a class="admin" href="javascript:toggle_add_branch();" id="addBranch">Add New Branch</a><br>
		<br> <a class="admin" href="javascript:toggle_add_food();" id="addFood">Add Food</a><br>
	</div>

	<div class="body-action-result">
		<div class="body_add_branch" id="body_add_branch">
			<form method="post" action="add_branch.php">
			<fieldset>
			<legend>Add Branch</legend>
			<center>
			<?php
            if(isset($_GET['msg'])) {
                echo "<span style='color:green'>".$_GET['msg']."</span>";
            }
            ?>
			<table>
				<tr>
					<td>Location</td>
					<td><input placeholder="Branch Location" type="text" name="location" required></td>
				</tr>

				<tr>
					<td>Contact No.</td>
					<td><input placeholder="01XXXXXXXXX" type="text" name="mobile" required></td>
				</tr>

				<tr>
					<td>Facebook Link</td>
					<td><input placeholder="facebook.com/yourLink" type="text" name="facebook" required></td>
				</tr>

				<tr>
					<td>Opening Time</td>
					<td><input placeholder="Example: 11 AM" type="text" name="open" required></td>
				</tr>

				<tr>
					<td>Closing Time</td>
					<td><input placeholder="Example: 10 PM" type="text" name="close" required></td>
				</tr>

				<tr>
					<td>Seating Capacity</td>
					<td><input placeholder="Example: 50 People" type="text" name="capacity" required></td>
				</tr>

				<tr>
					<td>Credit/Debit Card?</td>
					<td><input type="radio" name="credit_card" value="Yes">Yes <input type="radio" name="credit_card" value="No">No</td>
				</tr>

				<tr>
					<td>Wifi?</td>
					<td><input type="radio" name="wifi" value="Yes">Yes <input type="radio" name="wifi" value="No">No</td>
				</tr>

				<tr>
					<td>Home Delivery?</td>
					<td><input type="radio" name="home_delivery" value="Yes">Yes <input type="radio" name="home_delivery" value="No">No</td>
				</tr>

				<tr>
					<td>Seat Reservation?</td>
					<td><input type="radio" name="reservation" value="Yes">Yes <input type="radio" name="reservation" value="No">No</td>
				</tr>

				<tr>
					<td>Buffet?</td>
					<td><input type="radio" name="buffet" value="Yes">Yes <input type="radio" name="buffet" value="No">No</td>
				</tr>

				<tr>
					<td>Live Music?</td>
					<td><input type="radio" name="live_music" value="Yes">Yes <input type="radio" name="live_music" value="No">No</td>
				</tr>

				<tr>
					<td>Kids Zone?</td>
					<td><input type="radio" name="kids_zone" value="Yes">Yes <input type="radio" name="kids_zone" value="No">No</td>
				</tr>

				<tr>
					<td>Smoking Zone?</td>
					<td><input type="radio" name="smoking_zone" value="Yes">Yes <input type="radio" name="smoking_zone" value="No">No</td>
				</tr>

				<tr>
					<td><input type="reset" value="Cancel"></td>
					<td><input type="submit" name="add" value="Add Branch"></td>
				</tr>
			</table>
			</center>
			</fieldset>
			</form>
		</div>

		<div class="body_add_food" id="body_add_food">
			<form method="post" action="add_branch.php">
			<fieldset>
			<legend>Add Food</legend>
			<center>
			<table>
				<tr>
					<td>Food Name</td>
					<td><input placeholder="Food Name" type="text" name="food_name" required></td>
				</tr>

				<tr>
					<td>Food Price</td>
					<td><input placeholder="Food Price" type="text" name="food_price" required></td>
				</tr>

				<tr>
					<td>Food Details</td>
					<td><input placeholder="Details about your Food" type="text" name="food_details" required></td>
				</tr>

				<tr>
					<td>Branches available in</td>
					<td>
					<?php
					 $id = $_SESSION['id'];
					 $sql = "SELECT * FROM tbl_branch WHERE res_id=".$id;
					 $res = $db->select($sql);

					 while($row=$res->fetch_assoc()) { 
					 	$name = $_SESSION['name']." (".$row['location'].")";?>
					 	<input type="checkbox" name="branch[]" value="<?php echo $row['branch_id']; ?>"> <?php echo $name; ?>
					<?php }
					?>
					</td>
				</tr>

				<tr>
					<td><input type="reset" name="" value="Clear" required></td>
					<td><input type="submit" name="add_food" value="Add Food" required></td>
				</tr>

			</table>
			</center>
			</fieldset>
			</form>
		</div>
	</div>
</div>
<?php include "inc/footer.php"; ?>