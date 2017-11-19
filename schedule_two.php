<?php
    $description='Project 2, Collinsworth/Dodds';
    $pageTitle='Laptop Repair';
    include "inc/header.php";
    include ('inc/query_functions.php');
    include ('inc/open_db.php');

    //check post
    if($_POST){
       $service = htmlspecialchars($_POST['service']);
       $date = htmlspecialchars($_POST['date']);
       $note = htmlspecialchars($_POST['note']);
       $times = get_available_times($db, $date, get_service($db, $service)[0]['time']);
    }
?>
<main>
    <div class="flex-grid">
        <div class="col">
            <p>Please select best time slot for you for: <div class="underline"><?php echo date('F d, Y', strtotime($date)) ?></div></p>
            <form method="post" action="submit.php">
                <label for="time">Appointment Time:</label>
                <select required name="time">
                    <?php
                        for($i = 0; $i < count($times); $i++){
                            echo "<option value='{$times[$i]}'>{$times[$i]}</option>";
                        }
                    ?>
                </select>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</main>
<?php include('inc/footer.php') ?>
