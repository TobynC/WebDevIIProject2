<?php
$description='Project 2, Collinsworth/Dodds';
$pageTitle='Laptop Repair';
include "inc/header.php";

include 'inc/query_functions.php';
require_once 'inc/open_db.php';

$service = get_service($db, $_POST['service']);
?>
<main>
    <p>You have selected <?php echo $service['0']['description'] ?> This service takes approximately <?php echo $service['0']['time'] ?> minutes to complete. Please select a time for your apointment: </p>
</main>

<?php include 'inc/footer.php'; ?>