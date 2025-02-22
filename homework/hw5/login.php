<?php
/*Please add login markup for login form and php code for validation...
remember to include header and footer - thx--Shanen
    Add login markup for login form and php code for validation...
    including header and footer - Oanh
*/
?>
<?php
    include('header.php');
?>

<?php
    // declare variables
    $email = "";
    $password = "";
    $conf_password ="";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // store post data into variables
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conf_password = $_POST['conf_password'];
        // validate email field
        if(empty($email)) {
            $error_e = "This field is required. Please enter your email";
        }
         elseif(empty($password)) {
            $error_p = "This field is required. Please enter your password";
        }
        else {
            $error_cp ="This field is required. Please re-enter your password";
        }

    }
?>
<main>
    <h1 id="login_header">Login Page</h1>
    <form action="login.php" method="POST">

    <label for="email" class="login_label">Email:</label>
    <input type="email" id="email" name="email" placeholder="test@test.com" value="<?php echo $email; ?>"></br>
    <?php // if email is not entered, display error message
        if(isset($error_e)) {
            echo "<p>$error_e</p>";
        }
    ?>
    <label for="password" class="login_label">Password:</label>
    <input type="password" id="password" name="password"></br>
    <?php // if password is not entered, display error message
        if(isset($error_p)) {
            echo "<p>$error_p</p>";
        }
    ?>
    <label for="password" class="login_label">Confirm Your Password:</label>
    <input type="password" id="conf_password" name="conf_password"></br>
    <?php // if password is not entered, display error message
        if(isset($error_p)) {
            echo "<p>$error_cp</p>";
        }
        else {
            echo "<p>Oops! Something is wrong. Re-enter your password.</p>";
        }
    ?>

    <input type="submit" name="login_button" value="Login!">

    <?php // display message when submit button is clicked and all fields are correctly entered
    if ((isset($_POST['login_button'])) && (!isset($error_e)) && (!isset($error_p)) && (!isset($error_cp)) && ($conf_password == $password)) {
    echo "<p>You're successfully logged in.</p>";
    }
?>
    </form>
</main>

<?php include('footer.php');
?>