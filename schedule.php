<?php

$description='Project 2, Collinsworth/Dodds';
$pageTitle='Laptop Repair';
if(isset($_POST['service'])){
unset($_POST['service']);}
include "inc/header.php";
echo '<main>';
echo '<p>Please select the option that best suits your needs:</p>';
echo '<form method="post" action="submit.php"><select name="service">'
. '<option value="1">Software Troubleshooting and "Tune-Up"</option>'
        . '<option value="2">Virus Detection and removal</option>'
        . '<option value="3">Battery Replacement</option>'
        . '<option value="4">Screen Repair/Replacement</option>'
        . '<option value="5">Hardware Troubleshooting</option></select><br>'
        . '<input type="submit" id="submit" value="submit">'
        . '</form>';

echo '<button onclick="location.href=\'index.php\'">Return to Home</button>';

echo '</main>';
include 'inc/footer.php';