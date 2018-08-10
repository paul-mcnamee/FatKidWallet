<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="You know those annoying fat kid cards you get at restaurants when you eat 7 meals and get the 8th meal free? We sure do. Here at FatKidWallet.com our goal is to consoloidate all of those annoying fat kid cards from your fat kid wallet into one nice convenient place on your phone. If you have a flip phone like one of the founders Alex, you will not be able to download and use this amazing app and you will be stuck with a bulky fat kid wallet instead.">
    <meta name="author" content="Paul J. McNamee">

    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootcards/0.1.0/css/bootcards-desktop.min.css">
</head>
<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="../">Fat Kid Wallet</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               </button>
            </div>
            <button type="button" class="btn btn-default btn-back pull-left hidden" onclick="history.back()">
                <i class="fa fa-lg fa-chevron-left"></i>
                <span>Back</span>
            </button>
            <button type="button" class="btn btn-default btn-menu pull-left offcanvas-toggle">
                <i class="fa fa-lg fa-bars"></i>
                <span>Menu</span>
            </button>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#cards">
                            <i class="fa fa-cubes"></i>
                            My Cards
                        </a>
                    </li>
                    <li>
                        <a href="#restaurants">
                            <i class="fa fa-cutlery"></i>
                            Restaurants
                        </a>
                    </li>
                    <li>
                        <a href="#fights">
                            <i class="fa fa-crosshairs"></i>
                            Fights
                        </a>
                    </li>
                    <li>
                        <a href="#more">
                            <i class="fa fa-ellipsis-h"></i>
                            More
                        </a>
                    </li>
                    <li>
                        <a href="#settings">
                            <i class="fa fa-cog"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="text-center">
        Fat Kid Wallet!
    </h1>
</header>
<div class="container">
    <div class="row ">
        <a name="cards" class="anchor" ></a>
        <h2>Cards</h2>

        <style>
            .vcenter {
                display: inline-block;
                vertical-align: middle;
                float: none;
            }
        </style>

        <?php
        // TODO: probably should move this to a separate file -- "generateCards.php"
        //set up mysql connection
        $con = mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysqli_error($con));
        //select database
        mysqli_select_db($con, "fatkidwallet_fattestkid") or die(mysqli_error($con));
        // Retrieve all the data from the "user_cards" table
        // TODO: might want to restrict this when the list is too large
        // TODO: include continuous scrolling, load additional items when at the bottom 15% of the list
        $result = mysqli_query($con, "SELECT * FROM user_cards u left outer join restaurants r on u.restaurant_id = r.restaurant_id") or die(mysqli_error($con));
        // store the record of the "user_cards" table into $row

        echo '<div class="row">';

        $numCols = 0;
        $cardNum = 0;
        //step through each result and add it to the card list
        while ($row = mysqli_fetch_array($result)) {

            // end the last row and add a new row if there are 3 columns
            If ($numCols %3 == 0){
                echo '</div>';
                echo '<div class="row">';
            }
            $numCols++;

            $cardIsComplete = false;

            //TODO: currently there are no users ... need to add logins and shit to the page
            //TODO: need to add cards based on the user currently selected
            //assign card vars
            $cardId = $row['card_id'];
            $currentPoints = $row['current_points'];
            $totalPoints = $row['total_points'];
            $pointDifference = $totalPoints - $currentPoints;
            $cardDescription = $row['card_desc'];

            //assign restaurant vars
            $restaurantId = $row['restaurant_id'];
            $restaurantDescription = $row['restaurant_description'];
            $restaurantAddress = $row['restaurant_address'];
            $restaurantName = $row['restaurant_name'];
            $restaurantImage = $row['restaurant_image_fp'];

            if ($currentPoints == $totalPoints){
                $cardIsComplete = true;
            }

            // change the header to a green "success" background if the card is complete
            $cardClass = "panel-heading clearfix";
            if ($cardIsComplete){
                $cardClass = "panel-heading-success clearfix";
            }

            //build boot cards with info from db
            echo '<div class="col-sm-4 bootcards-cards">';
                echo '<div class="panel panel-default">';
                    echo '<div class="'.$cardClass.'">';
                        echo '<h3 class="panel-title pull-left">';

                        //add the circles for current points
                        for ($i=0; $i<$currentPoints; $i++){
                            echo '<i class="fa fa-circle"></i>';
                        }

                        //add remaining empty circles for total points
                        for ($j=0; $j<$pointDifference; $j++){
                            echo '<i class="fa fa-circle-o"></i>';
                        }
                        echo '</h3>';

                    //add the edit button
                    // NOTE: not sure how to handle these -- modal or flip the cards?
                    // NOTE: modals are EZ mode, but card flips would be sweet
                    // NOTE:  - card flipping would not be working on old browsers
                    // NOTE:  - I think modals would work on all browsers?
                    // NOTE:  - currently just expanding down
                    echo '
                    <script type="text/javascript">
                    function editCard'.$cardNum.'() {
                        $(".hidden-text-'.$cardNum.'").slideDown("slow");
                    };
                    function collapseEditCard'.$cardNum.'() {
                        $(".hidden-text-'.$cardNum.'").slideUp("slow");
                    };
                    </script>';

                    //TODO: figure out how do do this with ajax -- http://stackoverflow.com/questions/19323010/execute-php-function-with-onclick
                    //TODO: http://laravel.com/
                    echo '<form action="../addPoint.php" method="post">';
                        echo '<button class="btn btn-primary pull-right" type="submit" value="addPoint" name="addPoint">';
                        echo '<input type="hidden" class="form-control" id="restaurant_id" name="addPointRestaurantId" value="'.$restaurantId.'">';
                        echo '<input type="hidden" class="form-control" id="card_id" name="addPointCardId" value="'.$cardId.'">';
                        echo '<input type="hidden" class="form-control" id="page" name="addPointPage" value="viewCards">';
                        echo '<i class="fa fa-plus"></i></button>';
                    echo '</form>';

                    //add some space to separate the buttons
                    echo '<text class="pull-right">&nbsp;&nbsp;</text>';

                    echo '<a class="btn btn-primary pull-right" onclick="editCard'.$cardNum.'()" href="#card'.$cardNum.'">';
                    echo '<i class="fa fa-pencil"></i></a>';
                echo '</div>'; // ends the heading of the card

                //NOTE: start the text shown after clicking edit
                echo '<div class="hidden-text-' . $cardNum . ' list-group">';
                echo '<style>';
                    echo '
                    .hidden-text-'.$cardNum.' {
                        display:none;
                    }';
                echo '</style>';

                // NOTE: This is where the user would edit their card info? -- not sure what the purpose would be
                // TODO: maybe you could redeem the card here or something?
                // TODO: we would need some validation from the restaurant that the user received their discount

                echo '<div class="well well-sm">';

                    echo '<div class="list-group">';
                        echo '<div class="col-sm-4">';
                            echo 'what do?';
                        echo '</div>';

                        echo '<div class="col-sm-8 input-group">';
                            echo '<input type="text" class="form-control" placeholder="Fat Kid!" aria-describedby="basic-addon1">';
                            echo '<span class="input-group-addon" id="basic-addon1">#FKW</span>';
                        echo '</div>';
                    echo '</div>';

                    echo '<div class="list-group">';
                        echo '<div class="col-sm-12 pull-right">';
                            //hide the text / form when clicking save or cancel
                            echo '<a class="btn btn-primary pull-right" onclick="collapseEditCard'.$cardNum.'()" href="#card'.$cardNum.'">Save</a>';
                            echo '<text class="pull-right">&nbsp;&nbsp;</text>';
                            echo '<a class="btn btn-primary pull-right" onclick="collapseEditCard'.$cardNum.'()" href="#card'.$cardNum.'">Cancel</a>';
                        echo '</div>';
                    echo '</div>';

                    echo '<div class="list-group">';
                        echo '<br>';
                    echo '</div>';

                echo '</div>'; // end the well
            echo '</div>'; // end of the text shown after clicking edit

            //add the restaurant name
            echo '<div class="list-group">';
                echo '<div class="list-group-item">';
                    //add the restaurant image if there is one
                    if ($restaurantImage != null){
                        echo '<img src="' . $restaurantImage . '" class="list-group-item-heading"></img>';
                    }
                    echo '<b>' . $restaurantName . '</b>';
                echo '</div>';
            echo '</div>';

            //add the restaurant description
            echo '<div class="list-group">';
                echo '<div class="list-group-item">';
                    echo '<p class="list-group-item-text">' . $restaurantDescription . '</p>';
                echo '</div>';
            echo '</div>';

            //add the address
            echo '<div class="list-group">';
                echo '<div class="list-group-item">';
                    echo '<h4 class="list-group-item-heading">' . $restaurantAddress . '</h4>';
                echo '</div>';
            echo '</div>';

            // TODO: not sure what to put in the footer, adding some description for now
            echo '<div class="panel-footer">';
                echo '<small>' . $cardDescription . '</small>';
            echo '</div>';

            echo '</div>'; // end of the row
            echo '</div>'; // end of the row

            $cardNum++;
        }
        echo '</div>'; //end of the card container
        ?>
    </div>

    <div class="container">
        <div class="row">
            <a name="restaurants" class="anchor" ></a>
            <br/>
            <h2>Restaurants</h2>
<!--            TODO: Implement these features!-->
            <h4>Request a new Restaurant</h4>
<!--                add a restaurant to the db -- requested_locations or something-->
<!--                need data from the user -- supports FKW, has fat kid cards, deals, etc.-->
<!--                create some service to pick up items in that table and scrape data-->
<!--                put the new location into the location db-->
            <h4>View the Nearby Restaurants</h4>
<!--                utilize google API-->
<!--                utilize yelp API-->
<!--                find other small services to integrate with -->
            <h4>Add Restaurant to Account</h4>
<!--                add a card to the list for the current user -->
<!--                check to see if the restaurant is already added-->
            <h4>Find Similar Restaurants</h4>
            <h4>View Popular Restaurants</h4>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a name="fights" class="anchor" ></a>
            <h2>Fat Kid Fight Night</h2>
            <h4>Gold Card Fight League</h4>
<!--                this is going to be a huge project-->
            <h4>Fat Kid Leaderboard</h4>
            <h4>King/Queen Fat Kid</h4>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a name="more" class="anchor" ></a>
            <h2>More to come!</h2>
            <h4>other random features</h4>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a name="settings" class="anchor" ></a>
            <h2>Settings</h2>
            <h4>What type of mayonnaise do you like?</h4>
        </div>
    </div>
</div>

<script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/bootcards.js" type="text/javascript"></script>
</body>
</html>