<?php
if (isset($_POST['addPoint'])){
    //set up the connection
    $con = mysql_connect("localhost", "fattestkid", "fatkid123") or die(mysql_error());

    // get the variables from the form -- do I need to escape for integer values?
    $RestaurantId = $_POST['addPointRestaurantId'];
    $CardId = $_POST['addPointCardId'];
    $Page = $_POST['addPointPage'];

    if ($RestaurantId != null && $CardId != null){

        //select database
        mysql_select_db("fatkidwallet_fattestkid") or die(mysql_error());

        $CurrentPoints = mysql_result(mysql_query("
          SELECT current_points
          FROM user_cards
          WHERE card_id = $CardId
          AND restaurant_id = $RestaurantId"),0);

        $TotalPoints = mysql_result(mysql_query("
          SELECT total_points
          FROM user_cards
          WHERE card_id = $CardId
          AND restaurant_id = $RestaurantId"),0);

        if ($CurrentPoints < $TotalPoints){
            $NewPoints = $CurrentPoints + 1;

            $sql = "UPDATE user_cards
            SET current_points = $NewPoints
            WHERE card_id = $CardId
            AND restaurant_id = $RestaurantId";

            // add the new card to the database
            mysql_query($sql) or die(mysql_error());
        }
    }

    //close the connection
    mysql_close($con);

    //echo "card ID: $CardId";
    //echo "restaurant ID: $RestaurantId";
    //echo "Current Points: $CurrentPoints";
    //echo "Total Points: $TotalPoints";
    //echo "New Points: $NewPoints";

    //return to the index page
    if ($Page == "viewCards"){
        header('Location: /User/viewCards.php');
    }
    else{
        header('Location: Index.php');
    }
}
?>