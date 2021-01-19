<?php
include "inc/header.php";
$db = new Database();

if(isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(empty($email) or empty($password)) {
		echo "<span style: 'color:red'>Field must not be empty!!</span>";
	}
	else {
		$query = "SELECT * FROM admin WHERE admin_email='".$email."' AND admin_password='".$password."'";
		$login = $db->select($query,4);

		while($res=$login->fetch_assoc()) { //fetch_assoc() - Fetches associative array
			$_SESSION['email'] = $res['admin_email'];
			$_SESSION['name'] = $res['admin_name'];
			$_SESSION['id'] = $res['admin_id'];
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
                </table>
            </form>
        </fieldset>
    </center>
</div>