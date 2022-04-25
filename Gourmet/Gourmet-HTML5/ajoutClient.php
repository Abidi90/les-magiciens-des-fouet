<?php
include'config.php';

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
 <?php
  include 'header.phtml';
 ?>
    <!--=======content================================-->
    <div class="content page1">
        <div class="container_12">
            <div >
                <form action="../../Models/addClient.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" >
                        Nom:
                    </label>
                    <input  class="form-control" type="text" name="nom" >
                  
                </div>
                    <br>
                <div class="mb-3">
                     <label class="form-label" >
                       Prenom:
                    </label>
                    <input  class="form-control" type="text" name="prenom" >
                </div>
                <div class="mb-3">
                     <label class="form-label" >
                       Email:
                    </label>
                    <input  class="form-control" type="email" name="email" >
                </div>
                <div class="mb-3">
                    <label class="form-label" >
                        Password:
                    </label>
                    <input  class="form-control" type="password" name="password" >
                </div>
                <div class="form-floating">
                    <label class="form-label">
                    Temoignage :
                    </label>
                    <textarea class="form-control"  name="temoignage"></textarea>
                </div>
                    <br>
                <div class="mb-3">
                    <label class="form-label">
                     Image:
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