<?php

if (isset($_POST['deleteCard'])){
    //set up the connection
    $con = mysql_connect("localhost", "fattestkid", "fatkid123") or die(mysql_error());

    //get the variables from the form -- do I need to escape for integer values?
    $deleteRestaurantId = $_POST['deleteRestaurantId'];
    $deleteCardId = $_POST['deleteCardId'];

    if ($deleteRestaurantId != null && $deleteCardId != null){
        //TODO: see if the record is actually in the database before deleting

        //select database
        mysql_select_db("fatkidwallet_fattestkid") or die(mysql_error());

        $sql = "DELETE FROM user_cards
            WHERE card_id = $deleteCardId
            AND restaurant_id = $deleteRestaurantId";

        // add the new card to the database
        mysql_query($sql) or die(mysql_error());
    }

    //close the connection
    mysql_close($con);

    //return to the index page
    header('Location: Index.php');

}
?>