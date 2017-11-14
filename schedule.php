<?php

$description='Project 2, Collinsworth/Dodds';
$pageTitle='Laptop Repair';
include "inc/header.php";
echo '<main>';
echo '<p>Please </p>';
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

echo '<button onclick="location.href=\'login.php\'">Login</button>';
echo '<button onclick="location.href=\'schedule.php\'">Schedule Appointment</button>';
echo '<button onclick="location.href=\'past.php\'">Appointment History</button>';
echo '</main>';
include 'inc/footer.php';