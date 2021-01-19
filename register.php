<?php include "inc/header.php"; ?>

<?php
$db = new Database();

if(isset($_POST['register'])) {
    $res_name = mysqli_real_escape_string($db->link, $_POST['res_name']);
    $res_email =  mysqli_real_escape_string($db->link, $_POST['res_email']);
    $res_password = mysqli_real_escape_string($db->link, $_POST['res_password']);
    
    if($res_name == "" || $res_email == "" || $res_password == "") {
        $error = "Field must not be empty!!";
    }
    else {
        $query = "INSERT INTO tbl_res(res_name, res_email, res_pass) VALUES ('$res_name', '$res_email', '$res_password')";
        $create = $db->insert($query, 1);
    }
}
?>

<div class="body">
    <center>
        <fieldset>
        <legend>Register</legend>
            <?php
            if(isset($_GET['msg'])) {
                echo "<span style='color:green'>".$_GET['msg']."</span>";
            }
            ?>
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td>Restaurant Name</td>
                        <td><input type="text" name="res_name"></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="res_email"></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="res_password"></td>
                    </tr>

                    <tr>
                        <td><input type="reset" value="Cancel"></td>
                        <td><input type="submit" name="register" value="Register"></td>
                    </tr>

                    <tr>
                        <td>Already Registerd?</td>
                        <td><a href="login.php">Click Here to Log in!</a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </center>
</div>

<?php include  "inc/footer.php"; ?>