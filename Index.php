<!doctype html>
<html lang="en" data-ember-extension="1" debug="false"><div id="FirebugChannel" style="display: none;">FB_deactivate</div>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="You know those annoying fat kid cards you get at restaurants when you eat 7 meals and get the 8th meal free? We sure do. Here at FatKidWallet.com our goal is to consoloidate all of those annoying fat kid cards from your fat kid wallet into one nice convenient place on your phone. If you have a flip phone like one of the founders Alex, you will not be able to download and use this amazing app and you will be stuck with a bulky fat kid wallet instead.">
    <meta name="author" content="Paul J. McNamee">

    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootcards/0.1.0/css/bootcards-desktop.min.css">
</head>

<!--

TODO: validate form data inputs
TODO: display a success message if the card was added
TODO: add a failure message
TODO:

-->

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/User/viewCards.php">View Cards</a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>card_id</th>
                <th>restaurant_id</th>
                <th>current_points</th>
                <th>total_points</th>
                <th>card_desc</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //set up mysql connection
            $con = mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysqli_error($con));
            //mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysql_error());
            //select database
            mysqli_select_db($con, "fatkidwallet_fattestkid") or die(mysql_error($con));
            // Retrieve all the data from the "user_cards" table
            $result = mysqli_query($con, "SELECT * FROM user_cards") or die(mysql_error($con));
            // store the record of the "user_cards" table into $row
            while ($row = mysqli_fetch_array($result)) {
                // Print out the contents of the entry
                echo '<tr>';
                echo '<td>' . $row['card_id'] . '</td>';
                echo '<td>' . $row['restaurant_id'] . '</td>';
                echo '<td>' . $row['current_points'] . '</td>';
                echo '<td>' . $row['total_points'] . '</td>';
                echo '<td>' . $row['card_desc'] . '</td>';
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="col-sm-12 container-fluid" align="center">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addNewCard">Add New Card</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteCard">Delete Card</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addPoint">Add a Point</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deletePoint">Delete a Point</button>
        <BR/>
        <BR/>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>restaurant_id</th>
                <th>restaurant_description</th>
                <th>restaurant_address</th>
                <th>restaurant_name</th>
                <th>restaurant_image_fp</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //set up mysql connection
            $con = mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysqli_error($con));
            //mysqli_connect("localhost", "fattestkid", "fatkid123") or die(mysql_error());
            //select database
            mysqli_select_db($con, "fatkidwallet_fattestkid") or die(mysql_error($con));
            // Retrieve all the data from the "user_cards" table
            $result = mysqli_query($con, "SELECT * FROM restaurants") or die(mysql_error($con));
            // store the record of the "user_cards" table into $row
            while ($row = mysqli_fetch_array($result)) {
                // Print out the contents of the entry
                echo '<tr>';
                echo '<td>' . $row['restaurant_id'] . '</td>';
                echo '<td>' . $row['restaurant_description'] . '</td>';
                echo '<td>' . $row['restaurant_address'] . '</td>';
                echo '<td>' . $row['restaurant_name'] . '</td>';
                echo '<td>' . $row['restaurant_image_fp'] . '</td>';
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="col-sm-12 container-fluid" align="center">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addNewRestaurant">Add New Restaurant</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteRestaurant">Delete Restaurant</button>
        <BR/>
        <BR/>
    </div>

    <div class="main">
        <div class="jumbotron col-sm-offset-1 col-sm-10 text-muted ">
            <br/>
            <p>
                Lo-fi cornhole scenester, cray gentrify readymade Pitchfork vinyl Pinterest Odd Future selvage Tumblr
                Portland swag Austin.  Helvetica banjo before they sold out, American Apparel put a bird on it brunch
                pickled Brooklyn craft beer Tonx food truck actually.  Marfa raw denim aesthetic fanny pack Shoreditch
                fixie Austin you probably haven't heard of them, cred 3 wolf moon bicycle rights freegan PBR blog.
                Mlkshk Austin Shoreditch fixie, fap letterpress church-key Echo Park sustainable quinoa banjo Williamsburg
                kale chips craft beer you probably haven't heard of them.  Ethnic Neutra locavore freegan, letterpress
                banh mi lomo ennui try-hard 3 wolf moon.  Banh mi try-hard vinyl, Pinterest kitsch lomo gentrify wolf
                post-ironic.  Blue Bottle mlkshk synth messenger bag Helvetica.
            </p>
            <p>
                Butcher mlkshk semiotics, ennui four loko lo-fi meh Austin.  Flannel Blue Bottle slow-carb salvia,
                cornhole semiotics banh mi ethical narwhal typewriter dreamcatcher.  Pickled Helvetica swag, Marfa
                sartorial normcore fanny pack drinking vinegar wayfarers ugh distillery.  Jean shorts Shoreditch you
                probably haven't heard of them, try-hard bespoke wayfarers semiotics.  Yr Helvetica vegan authentic,
                Wes Anderson letterpress aesthetic messenger bag kitsch plaid disrupt 8-bit cred sartorial.
                Mumblecore salvia single-origin coffee normcore Wes Anderson, Neutra try-hard slow-carb biodiesel
                fap fixie deep v ennui organic skateboard.  Organic selfies pork belly, small batch irony +1 hoodie
                Pitchfork slow-carb.
            </p>

            <p>
                Semiotics leggings butcher Etsy, craft beer direct trade  Marfa cred
                drinking vinegar food truck cray occupy.  Blog Cosby sweater kitsch biodiesel lo-fi.  Forage polaroid
                Echo Park Wes Anderson, pour-over twee shabby chic.  Scenester Pinterest readymade, cray bespoke
                meggings gastropub wolf.  YOLO XOXO actually, seitan PBR keffiyeh dreamcatcher authentic chambray
                banjo letterpress single-origin coffee chillwave.  Banksy mixtape pour-over sartorial tote bag blog
                retro, street art PBR&amp;B put a bird on it kitsch.  Bushwick wayfarers iPhone, PBR&amp;B kale chips
                whatever pop-up.
            </p>

            <p>
                Banjo letterpress fashion axe cardigan gastropub wayfarers twee single-origin coffee tote bag,
                Vice paleo 8-bit irony Godard chia.  Marfa vinyl McSweeney's you probably haven't heard of them,
                four loko DIY kale chips stumptown 8-bit fap try-hard Tonx trust fund Carles fanny pack.  Umami
                mustache Marfa, kogi next level seitan disrupt dreamcatcher synth +1 XOXO flexitarian single-origin
                coffee stumptown tote bag.  Ennui 90's ugh Brooklyn VHS.  Kickstarter sartorial crucifix literally,
                Wes Anderson PBR butcher.  Farm-to-table Odd Future fap Kickstarter cardigan.  Schlitz salvia fashion
                axe leggings next level, Helvetica pop-up Portland Brooklyn ugh scenester Austin before they sold
                out shabby chic.
            </p>
        </div>
    </div>

</div>


<div class="modal fade" id="addNewCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="addCard.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add New Card</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="restaurant_id" class="col-lg-2 control-label">Restaurant:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="restaurant_id" name="newRestaurantId" placeholder="enter #">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="current_points" class="col-lg-2 control-label">Current Points:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="current_points" name="currentPoints" placeholder="enter #">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total_points" class="col-lg-2 control-label">Total Points:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="total_points" name="totalPoints" placeholder="enter #">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="card_desc" class="col-lg-2 control-label">Description:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="card_desc" name="cardDesc" placeholder="enter description">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="submitNewCard" value="newCard" class="btn btn-default">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addNewRestaurant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="addRestaurant.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add New Restaurant</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="restaurant_description" class="col-lg-2 control-label">Description:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="restaurant_description" name="newRestaurantDescription" placeholder="enter description">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="restaurant_address" class="col-lg-2 control-label">Address:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="restaurant_address" name="newRestaurantAddress" placeholder="enter address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="restaurant_name" class="col-lg-2 control-label">Name:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="restaurant_name" name="newRestaurantName" placeholder="enter name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="restaurant_image_fp" class="col-lg-2 control-label">Image File Path:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="restaurant_image_fp" name="newRestaurantImageFp" placeholder="Image File Path">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="submitNewRestaurant" value="newRestaurant" class="btn btn-default">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="deleteCard.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Delete Card</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="restaurant_id" class="col-lg-2 control-label">Restaurant ID:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="restaurant_id" name="deleteRestaurantId" placeholder="enter #">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="card_id" class="col-lg-2 control-label">Card ID:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="card_id" name="deleteCardId" placeholder="enter #">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="deleteCard" value="deleteCard" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteRestaurant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="deleteRestaurant.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Delete Restaurant</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="restaurant_id" class="col-lg-2 control-label">Restaurant ID:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="restaurant_id" name="deleteRestaurantId" placeholder="enter #">
                        </div>
                    </div>


                    <div class="text-right">
                        <button type="submit" name="deleteRestaurant" value="deleteRestaurant" class="btn btn-default">Submit</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addPoint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="addPoint.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add a Point</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="restaurant_id" class="col-lg-2 control-label">Restaurant ID:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="restaurant_id" name="addPointRestaurantId" placeholder="enter #">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="card_id" class="col-lg-2 control-label">Card ID:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="card_id" name="addPointCardId" placeholder="enter #">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="addPoint" value="addPoint" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deletePoint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="deletePoint.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add a Point</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="restaurant_id" class="col-lg-2 control-label">Restaurant ID:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="restaurant_id" name="deletePointRestaurantId" placeholder="enter #">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="card_id" class="col-lg-2 control-label">Card ID:</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="card_id" name="deletePointCardId" placeholder="enter #">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="deletePoint" value="deletePoint" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/bootcards.js" type="text/javascript"></script>

</body>
</html>