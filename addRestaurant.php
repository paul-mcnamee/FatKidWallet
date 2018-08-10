<?php

if (isset($_POST['submitNewRestaurant'])){
    //set up the connection
    $con = mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysqli_error($con));

    //get the variables from the form -- do I need to escape for integer values?
    $RestaurantDescription = mysqli_real_escape_string($con, $_POST['newRestaurantDescription']);
    $RestaurantAddress = mysqli_real_escape_string($con, $_POST['newRestaurantAddress']);
    $RestaurantName = mysqli_real_escape_string($con, $_POST['newRestaurantName']);
    $RestaurantImageFp = mysqli_real_escape_string($con, $_POST['newRestaurantImageFp']);

    //TODO: see if the record already exists before adding

    //select database
    mysqli_select_db($con, "fatkidwallet_fattestkid") or die(mysqli_error($con));

    $sql = "INSERT INTO restaurants (restaurant_description, restaurant_address, restaurant_name, restaurant_image_fp)
            VALUES ('$RestaurantDescription', '$RestaurantAddress', '$RestaurantName', '$RestaurantImageFp')";

    // add the new card to the database
    mysqli_query($con, $sql) or die(mysqli_error($con));

    //close the connection
    mysqli_close($con);

    //return to the index page
    header('Location: Index.php');

    }
?>