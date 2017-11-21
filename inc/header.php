<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
<header>
    <ul>
        <li><a href=".">Home</a></li>
        <li><a onclick="location.href='schedule.php'">Schedule Appointment</a></li>
        <div class="login-nav">
            <?php
            if (isset($_SESSION['type']) && isset($_SESSION['login'])) {

                $login_status = $_SESSION['login'];
                if ($login_status == 'accept_existing' || $login_status == 'accept_new') {
                    echo "<li><a onclick=\"location.href='pastappointments.php'\">View Past Appointments</a></li>";
                    echo "<li><a onclick=\"location.href='login_files/logout.php'\">Logout</a></li>";
                }else {
                    echo "<li><a onclick=\"location.href='login_files/login_start.php'\">View Past Appointments</a></li>";
                    echo "<li><a onclick=\"location.href='login_files/login_start.php'\">Login</a></li>";
                }
            }else {
                echo "<li><a onclick=\"location.href='login_files/login_start.php'\">View Past Appointments</a></li>";
                echo "<li><a onclick=\"location.href='login_files/login_start.php'\">Login</a></li>";
            }
            ?>
        </div>
    </ul>
    <br>
    <h1>Laptop Repair</h1>
</header>
   
