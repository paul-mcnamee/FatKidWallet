<?php

if (isset($_POST['deleteRestaurant'])){
    //set up the connection
    $con = mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysqli_error($con));

    //get the variables from the form -- do I need to escape for integer values?
    $deleteRestaurantId = $_POST['deleteRestaurantId'];


    if ($deleteRestaurantId != null){
        //TODO: see if the record is actually in the database before deleting

        //select database
        mysqli_select_db($con, "fatkidwallet_fattestkid") or die(mysqli_error($con));

        $sql = "DELETE FROM restaurants
            WHERE restaurant_id = $deleteRestaurantId";

        // add the new card to the database
        mysqli_query($con, $sql) or die(mysqli_error($con));
    }

    //close the connection
    mysqli_close($con);

    //return to the index page
    header('Location: Index.php');

}
?>