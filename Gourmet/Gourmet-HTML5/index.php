<?php
include 'config.php';
$recette='';
$cuisinier='';
$temoignage='';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
$conn3 = new mysqli($servername, $username, $password, $dbname);
$conn4 = new mysqli($servername, $username, $password, $dbname);
$conn5 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql5 = "SELECT  * FROM temoignage order by id desc limit 6";
$temoignage = $conn5->query($sql5);
if ($temoignage) {

    while ($row = $temoignage->fetch_assoc()) {

        $sql2 = "SELECT  * FROM client where  id=" . $row["id_user"] . " limit 1";
        $client = $conn2->query($sql2);
        if ($client) {
            while ($row1 = $client->fetch_assoc()) {

                $comment[] = ["user"=>$row1,"comment"=>$row["content"]];
            }
    }



    }

}
$sql = "SELECT  * FROM recette order by id desc limit 1";
$recette = $conn->query($sql);
$cuisinier = '';
if ($recette) {

    while ($row = $recette->fetch_assoc()) {

        $sql2 = "SELECT  * FROM cuisinier where  id=" . $row["id_cuisinier"] . " limit 1";
        $idCuisinier = $conn2->query($sql2);


    }

    if ($idCuisinier) {
        while ($row1 = $idCuisinier->fetch_assoc()) {

            $cuisinier = $row1["Nom"] . " " . $row1["Prenom"];
        }

    }

}
$sql = "SELECT  * FROM recette order by id desc limit 1";
$recette = $conn->query($sql);

$sql3 = "SELECT  * FROM recette order by id desc limit 10";
$dernier = $conn3->query($sql3);
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn4->prepare('SELECT id, password,Nom FROM client WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();



}
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password,$Nom);
        $stmt->fetch();


        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($_POST['password']== $password) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $id;
            $_SESSION['Nom'] = $Nom;

            $stmt->close();
        } else {
            // Incorrect password
            echo 'Incorrect email and/or password! 1';
        }
    } else {
        // Incorrect username
        echo 'Incorrect email and/or password!';
    }
}
$conn->close();
$conn2->close();
$conn3->close();
$conn4->close();
$conn5->close();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="https://www.w3schools.com/">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.1.1.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/sForm.js"></script>
    <script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script>
        $(window).load(function () {
            $('.slider')._TMS({
                show: 0,
                pauseOnHover: false,
                prevBu: '.prev',
                nextBu: '.next',
                playBu: false,
                duration: 800,
                preset: 'fade',
                pagination: true,//'.pagination',true,'<ul></ul>'
                pagNums: false,
                slideshow: 8000,
                numStatus: false,
                banners: false,
                waitBannerAnimation: false,
                progressBar: false
            })
        });

        $(window).load(
            function () {
                $('.carousel1').carouFredSel({
                    auto: false, prev: '.prev', next: '.next', width: 960, items: {
                        visible: {
                            min: 1,
                            max: 4
                        },
                        height: 'auto',
                        width: 240,

                    }, responsive: false,

                    scroll: 1,

                    mousewheel: false,

                    swipe: {onMouse: false, onTouch: false}
                });


            });

    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="css/ie.css">

    <![endif]-->
    <style>
        .contenant {
            position: relative;
            text-align: center;
            color: black;
        }

        .texte_centrer {
            position: absolute;
            top: 82%;
            left: 28%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<div class="main">
    <!--==============================header=================================-->
    <header>
        <div class="container_12">
            <div class="grid_12">
                <h1><a href="index.html"><img src="images/magicien.png" alt="EXTERIOR"></a></h1>

                <div class="menu_block">
                    <nav class="">
                        <ul class="sf-menu">

                            <li><a class="current" href="index.php">Accueil</a></li>
                            <li><a href="index-1.php">Boutique</a></li>
                            <li><a href="index-3.php">Galerie</a></li>
                            <li><a href="index-2.php">Blog</a></li>
                         <?php if (!isset($_SESSION['loggedin'])){ ?>   <li>
                                <button type="button" class="btn btn-info btn-round ml-4" data-toggle="modal"
                                        data-target="#loginModal" id="toggle">
                                    Login
                                </button>
                            </li>
                            <?php } else{ ?>
                             <li>
                                 <p class="text-info h5 ml-5"> welcom <?php echo $_SESSION['Nom']?></p>
                             </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>

    <div class="slider-relative">
        <div class="slider-block">
            <div class="slider">


                <a href="recette.php">
                    <?php

                    if ($recette) {
                    echo 'hello';
                    // output data of each row
                    while ($item = $recette->fetch_assoc())   {

                    ?>

                    <img src="images/slide.jpg" alt="">
                    <div class="texte_centrer float-left" >
                        <div></div>
                        <p class="text-dark " style="font-size: 30px;opacity: 0.75;">
                            <?php echo $item["titre"] ?></p>


                        <button class="btn btn-light text-info " name="button" type="button"style="opacity: 0.75;">
                            <a  href="recette.php?id=<?php echo $item["id"];?>">VOIR LA RECETTE</a></button>
                        <?php
                        }
                        } else {
                            echo "0 results";
                        }
                        ?>


                    </div>

                </a>


            </div>

        </div>
    </div>
    <!--=======content================================-->

    <div class="content page1">
        <div class="ic"></div>
        <div class="container_12">
            <div class="grid_12">

                <div class="page1_block col1">
                    <br/>
                    <img src="images/page2_img6.jpg" alt="">
                    <img src="images/page2_img5.jpg" alt="">
                    <img src="images/page2_img4.jpg" alt="">
                    <br>
                    <h3>LA BOUTIQUE DES CHEFS </h3>
                    <br>
                    <a href="chef.php">

                        <button name="button" type="button">J'Y VAIS</button>

                    </a>

                    <div class="extra_wrapper">
                        <p><span class="col2">
                                <a href="http://blog.templatemonster.com/free-website-templates/"
                                                 rel="nofollow">
                                </a>
                            </span>
                        </p>

                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="grid_5">

            </div>
            <div class="clear"></div>
            <div class="grid_12">
                <div class="hor_separator"></div>
            </div>

            <div class="grid_12">
                <div class="car_wrap">
                    <h2>TEMOIGNAGE</h2>
                    <div class="d-flex flex-row flex-wrap justify-content-between col-12 ">
                        <?php
                        foreach ($comment as $value){
                        ?>

                            <div class="card mb-5" style="width: 18rem;">
                                <img class="card-img-top border-bottom" src="images/<?php echo $value["user"]["img"];?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title mt-3"><?php echo $value["user"]["Nom"]." ".$value["user"]["Prenom"];?></h5>
                                    <p class="card-text text-dark mb-4 mt-2"><?php echo $value["comment"];?></p>

                                </div>
                            </div>



                    <?php
                    }
                    ?>

                    </div>

            </div>
            </div>
            <div class="clear"></div>
            <div class="grid_12">
                <div class="hor_separator"></div>
            </div>
            <div class="grid_12">
                <div class="car_wrap">
                    <h2>DERNIER RECETTE</h2>
                    <a href="#" class="prev"></a><a href="#" class="next"></a>
                    <ul class="carousel1">
                        <?php
                        if ($dernier) {

                            // output data of each row
                            while ($item = $dernier->fetch_assoc()) {
                                ?>
                                <li>
                                    <div><img src="images/page1_img1.jpg" alt="">
                                        <div class="col1 upp"><a href="recette.php?id=<?php echo $item["id"];?>"><?php echo $item["titre"] ?></a></div>
                                        <span> <?php echo $item["description"] ?></span>
                                </li>
                                <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>

                    </ul>
                </div>

            </div>


            <div class="clear"></div>
            <div class="bottom_block">
                <div class="grid_6">
                    <br>
                    <h3>Rejoindrez-nous</h3>
                    <div class="socials">
                        <a href="#"><img src"images/twitter.svg"></a>
                        <a href="#"><img src"images/facebook-f.svg"></a>
                        <a href="#"><img src"images/instagram.svg"></a>
                        <a href="#"><img src"images/linkedin-in.svg"></a>
                    </div>
                    <nav>
                        <ul>
                            <li class="current"><a href="index.php">Accueil</a></li>
                            <li><a href="index-1.php">Boutique</a></li>
                            <li><a href="#">Mentions légales</a></li>
                            <li><a href="index-3.php">Galerie</a></li>
                            <li><a href="index-5.php">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="grid_6">


                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Login</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form action = "index.php" method = "post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Your email address...">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Your password...">
                        </div>
                        <input type="submit" class="btn btn-info btn-block btn-round" value="Login"/>
                    </form>

                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
            </div>
        </div>
    </div>

    <!--==============================footer=================================-->

    <footer>
        <div class="container_12">
            <div class="grid_12">
                Les Magiciens De Fouet © 2022 &nbsp;&nbsp; |&nbsp;&nbsp; <a href="#">Privacy Policy</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                Website Template designed by <a href="http://www.templatemonster.com/"
                                                rel="nofollow">TemplateMonster.com</a>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <!-- Popper JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <!-- Bootstrap JS -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script>
        $(document).ready(function() {
           $('toggle').click(function (){
               $('#loginModal').modal('show');
               $(function () {
                   $('[data-toggle="tooltip"]').tooltip()
               })
           })
        });
    </script>
</body>
</html>