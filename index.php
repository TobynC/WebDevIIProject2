<?php

   session_start();   
   

$description='Project 2, Collinsworth/Dodds';
$pageTitle='Laptop Repair';
include "inc/header.php";
echo '<main>';
echo '<p>Welcome to Gabe and Tobyn\'s laptop repair. We offer the following services for your laptop:</p>';
echo '<ul>'
. '<li>'
        . 'Software Troubleshooting and "Tune-Up"</li>'
        . '<li>'
        . 'Virus Detection and Removal</li>'
        . '<li>'
        . 'Battery Replacement</li>'
        . '<li>'
        . 'Screen Repair/Replacement</li>'
        . '<li>'
        . 'Hardware Troubleshooting</li>'
        . '</ul>';
if (isset($_SESSION['type'])){
  
   $login_status = $_SESSION['login'];
   if ($login_status == 'accept_existing'||$login_status == 'accept_new') {
          echo '<button onclick="location.href=\'login_files/logout.php\'">Log Out</button>';
          }
}
else{
            echo '<button onclick="location.href=\'login_files/login_start.php\'">Login</button>';
          }

echo '<button onclick="location.href=\'schedule.php\'">Schedule Appointment</button>';
echo '<button onclick="location.href=\'past.php\'">Appointment History</button>';
echo '</main>';
include 'inc/footer.php';