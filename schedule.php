<?php
$description='Project 2, Collinsworth/Dodds';
$pageTitle='Laptop Repair';
include "inc/header.php";
include ('inc/query_functions.php');
include ('inc/open_db.php');

if (isset($_POST['service'])) {
    unset($_POST['service']);
}

$services = get_services($db);
?>
    <main>
        <div class="flex-grid">
            <div class="col">
                <p>Please select the option that best suits your needs:</p>
                <form method="post" action="submit.php">
                    <select name="service">
                        <?php
                        for($i = 0; $i < count($services); $i++){
                            echo "<option value='{$services[$i]['id']}'>{$services[$i]['description']}</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <label for="note">Notes:</label>
                    <textarea name="note" cols="20" rows="2"></textarea>
                    <input type="submit" id="submit" value="submit">
                </form>
            </div>
        </div>
    </main>

<?php include 'inc/footer.php'; ?>