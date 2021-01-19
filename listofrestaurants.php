<?php include "inc/header.php";
$db = new Database();
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