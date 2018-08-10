<?php

if (isset($_POST['submitNewCard'])){
    //set up the connection
    $con = mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysqli_error($con));

    //get the variables from the form -- do I need to escape for integer values?
    $RestaurantId = mysqli_real_escape_string($con, $_POST['newRestaurantId']);
    $CurrentPoints = mysqli_real_escape_string($con, $_POST['currentPoints']);
    $TotalPoints = mysqli_real_escape_string($con, $_POST['totalPoints']);
    $Description = mysqli_real_escape_string($con, $_POST['cardDesc']);

    //TODO: see if the record already exists before adding

    //select database
    mysqli_select_db($con, "fatkidwallet_fattestkid") or die(mysqli_error($con));

    $sql = "INSERT INTO user_cards (restaurant_id, current_points, total_points, card_desc)
            VALUES ('$RestaurantId', '$CurrentPoints', '$TotalPoints', '$Description')";

    // add the new card to the database
    mysqli_query($con, $sql) or die(mysqli_error($con));

    //close the connection
    mysqli_close($con);

    //return to the index page
    header('Location: Index.php');

    }
?>