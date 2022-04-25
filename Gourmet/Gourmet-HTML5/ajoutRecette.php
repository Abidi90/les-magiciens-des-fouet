<?php
include 'config.php';

$sql="SELECT ID, Nom, Prenom ,imgCui FROM cuisinier";
$cuisiniers=$connect->query($sql)->fetch_all(MYSQLI_ASSOC);

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
        <div class="container_12 header">
            <div class="grid_12">
                <a href="index.html"><img src="images/magicien.png" width="150" alt="EXTERIOR"></a> 

                <div class="menu_block">
                    <nav class="">
                        <ul class="sf-menu">

                            <li><a class="current" href="index.php">Accueil</a></li>
                            <li><a href="boutique.php">Boutique</a></li>
                            <li><a href="gelerie.php">Galerie</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="ajoutRecette.php">Ajout recette</a></li>
                            
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
    <!--=======content================================-->

    <div class="content page1">
        <div class="ic"></div>
        <br>
        <div class="container_12">
            <div >
                <form action="../../Models/addrecette.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" >
                       <h6> Titre :</h6>
                    </label>
                    <input  class="form-control" type="text" name="titre" >
                    </div>
                    <br>
                    <div class="form-floating">
                    <label class="form-label">
                        
                    <h6> Description : </h6>
                    </label>
                    <textarea class="form-control"  name="description"></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                    <label class="form-label">
                        <h6> Cuisinier N° : </h6>
                    </label>
                    <select  class="form-control" name='cuisinier'>
                        <?php
                        if($cuisiniers){
                            

                            foreach($cuisiniers as $cuisinier){

                              echo  '<option value='.$cuisinier["ID"].'>'.$cuisinier["Nom"].' '.$cuisinier["Prenom"].'</option>';

                            }

                        }
                        ?>
                        
                    </select>
                    </div>
                    <br>
                    <div class="mb-3">
                    <label class="form-label">
                    <h6> IMG </h6>
                    </label>
                    <input class="form-control" type="file" name="img">
                    </div>
                    <br>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                    </div>
                </form>

              
            </div>
        </div>
    
    </div>
</div>
</body>
</html>