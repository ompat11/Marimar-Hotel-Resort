<?php
session_start();
require_once("includes/initialize.php");
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnlogin'])) {
        $uname = trim($_POST['username']);

        if ($uname == '') {
            echo "<div style='color: red;'>Field is required.</div>";
        } else {
            $stmt = $conn->prepare("SELECT GUESTID FROM tblguest WHERE G_UNAME = ?");
            $stmt->bind_param("s", $uname);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $_SESSION['GuestUsername'] = $uname;
                echo "success";
            } else {
                echo "<div style='color: red;'>Username not found. Please contact administrator.</div>";
            }

            $stmt->close();
        }
    }

    if (isset($_POST['ResetPass'])) {
        $guestid = intval($_POST['GUESTID']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE tblguest SET G_PASS = ? WHERE GUESTID = ?");
        $stmt->bind_param("si", $password, $guestid);
        
        if ($stmt->execute()) {
            echo "Password reset successful!";
        } else {
            echo "Failed to reset password.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="<?php echo WEB_ROOT; ?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Forgot Password</h1>

    <form method="POST">
        <div class="form-group">
            <label for="email">Enter your username:</label>
            <input id="email" name="username" type="text" class="form-control" required>
        </div>
        <button type="button" id="checkUsername" class="btn btn-primary">Proceed</button>
    </form>

    <div id="resetSection" style="display: none;">
        <h3>Reset Password</h3>
        <form method="POST">
            <input type="hidden" id="GUESTID" name="GUESTID">
            <div class="form-group">
                <label>Enter New Password:</label>
                <input type="password" id="ShaPass" name="password" class="form-control" required>
            </div>
            <button type="button" id="btnResetPassword" class="btn btn-success">Reset Password</button>
        </form>
    </div>
</div>

<script src="<?php echo WEB_ROOT; ?>jquery/jquery.min.js"></script>
<script src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $("#checkUsername").click(function() {
        var username = $("#email").val();
        $.post("forgotpass.php", { btnlogin: true, username: username }, function(response) {
            if (response.trim() === "success") {
                $("#resetSection").show();
                $("#GUESTID").val(username);
            } else {
                alert(response);
            }
        });
    });

    $("#btnResetPassword").click(function() {
        var pass = $("#ShaPass").val();
        var guestid = $("#GUESTID").val();

        $.post("forgotpass.php", { ResetPass: true, password: pass, GUESTID: guestid }, function(response) {
            alert(response);
            window.location.href = "logininfo.php";
        });
    });
});
</script>

</body>
</html>
