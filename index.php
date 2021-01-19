<?php 
include 'inc/header.php';

if(isset($_SESSION['name'])) {
	$id = $_GET['id'];
}
?>

<div class="body">
	<div class="search-name" id="search-name">
		Search By Name <input type="text" name="search-name" onkeyup="search(this.value)">
	</div>

	<div class="search-area" id="search-area">
		Search By Area <input type="text" name="search-area" onkeyup="search(this.value)">
	</div>
</div>


<?php include  "inc/footer.php"; ?>