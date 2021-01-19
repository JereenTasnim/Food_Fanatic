<?php
include "inc/header.php"; ?>

<?php
$db = new Database();

if(isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(empty($email) or empty($password)) {
		echo "<span style: 'color:red'>Field must not be empty!!</span>";
	}
	else {
		$query = "SELECT * FROM tbl_res WHERE res_email='".$email."' AND res_pass='".$password."'";
		$login = $db->select($query);

		while($res=$login->fetch_assoc()) { //fetch_assoc() - Fetches associative array
			$_SESSION['email'] = $res['res_email'];
			$_SESSION['name'] = $res['res_name'];
			$_SESSION['id'] = $res['res_id'];
		}

		header('Location: index.php?id='.$_SESSION['id']);
		exit();
	}
}
?>

<div class="body">
    <center>
        <fieldset>
        <legend>Log in</legend>
            <?php
            if(isset($_GET['msg'])) {
                echo "<span style='color:green'>".$_GET['msg']."</span>";
            }
            ?>
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email"></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>

                    <tr>
                        <td><input type="reset" value="Cancel"></td>
                        <td><input type="submit" name="login" value="Log in"></td>
                    </tr>

                    <tr>
                    	<td>Not Registerd Yet?</td>
                    	<td><a href="register.php">Click Here!</a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </center>
</div>

<?php include  "inc/footer.php"; ?>