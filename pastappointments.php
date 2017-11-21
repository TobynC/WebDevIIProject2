<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])){
    header("Location: login_files/login_start.php");
}

if (isset($_SESSION['type'])) {

    $user = $_SESSION['user'];
}

$description = 'Project 2, Collinsworth/Dodds';
$pageTitle = 'Laptop Repair';
include "inc/header.php";
include "inc/query_functions.php";
require_once 'inc/open_db.php';

$past = get_appointments($db, $user);
$service = get_services($db);
?>
<main>
        <?php
        if($past){
            echo <<<HTML
            <h1>Past Appointments</h1>
            <table>
                <thead>
                <th>
                    Date
                </th>
                <th>
                    Time
                </th>
                <th>
                    Service Performed
                </th>
                </thead>
HTML;
            $now = date('m/d/Y h:i:s');
            foreach ($past as $appointment) {
                if ($appointment['date'] > $now) {
                    echo '<tr>';
                    echo '<td>';
                    $date = strtotime($appointment['date']);
                    echo date('m-d-Y', $date);
                    echo '</td><td>';
                    echo date('h:m a', $date);
                    echo '</td><td>';
                    echo $service[$appointment['serviceId'] - 1]['description'];
                    echo '</td></tr>';
                }
            }
            echo '</table>';
        }
        else{
            echo "<h4>You have no past appointments.</h4>";
        }
        ?>

</main>
<?php
include "inc/footer.php";
?>
