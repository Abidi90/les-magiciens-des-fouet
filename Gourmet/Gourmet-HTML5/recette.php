<?php
$recette_id = $_GET['id'];
include 'config.php';
session_start();
$recette='';
$cuisinier="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  * FROM recette where id=".$recette_id;
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

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
     <head>

     <title>Accueil</title>
     <meta charset="utf-8">
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
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
      $(window).load(function(){
      $('.slider')._TMS({
              show:0,
              pauseOnHover:false,
              prevBu:'.prev',
              nextBu:'.next',
              playBu:false,
              duration:800,
              preset:'fade', 
              pagination:true,//'.pagination',true,'<ul></ul>'
              pagNums:false,
              slideshow:8000,
              numStatus:false,
              banners:false,
          waitBannerAnimation:false,
        progressBar:false
      })  
      });
      
     $(window).load (
    function(){$('.carousel1').carouFredSel({auto: false,prev: '.prev',next: '.next', width: 960, items: {
      visible : {min: 1,
       max: 4
},
height: 'auto',
 width: 240,

    }, responsive: false, 
    
    scroll: 1, 
    
    mousewheel: false,
    
    swipe: {onMouse: false, onTouch: false}});
    
    
    });      

     </script>
     <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
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
  top: 50%;
  left: 50%;
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
    <h1><a href="index.html"><img src="images/magicien.png" alt="EXTERIOR"></a> </h1>
    
         <div class="menu_block">
           <nav  class="" >
            <ul class="sf-menu">
          
              <li><a class="current" href="index.php">Accueil</a></li>
              <li><a href="boutique.php">Boutique</a> </li>  
              <li><a href="gelerie.php">Galerie</a></li>   
              <li><a href="blog.php">Blog</a></li>
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
          
            
          <img src="images/slide1.jpg"  alt=""> 
          
          

          
          
         

        
      </div>
      
    </div>
 </div>
<!--=======content================================-->

<div class="content page1"><div class="ic"></div>
  <div class="container_12">
      <div class="grid_7">
        <h2>Bienvenu</h2>
        <div class="page1_block col1">
          <img src="images/welcome_img.png" alt="">
          
          <div class="clear"></div>
        </div>
      </div>
      <div class="grid_5">
          <?php

          if ($recette) {

          // output data of each row
          while ($item = $recette->fetch_assoc())   {

          ?>



              <h2><?php echo $item["titre"] ?></h2>

              <span class="text-dark "><?php echo $item["description"] ?></span>

              <?php
              }
              } else {
                  echo "0 results";
              }
              ?>

      </div>

      <div class="clear "></div>
     <div class="ic"></div>
        <br>
        <div class="container_12">
            <div >
                <form action="../../Models/addTemoignage.php" method="POST" enctype="multipart/form-data">
                
                    <br>
                    <div class="form-floating">
                    <label class="form-label">  
                    <h6> Commentaire: </h6>
                    </label>
                    <textarea class="form-control"  name="content"></textarea>
                    </div>
                   
                   
                    <br>
                    <div class="mb-3">
                    <label class="form-label">
                    <h6> IMG TEMOIN </h6>
                    </label>
                    <input class="form-control" type="file" name="imgTemoi">
                    </div>
                    <br>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Commenter</button>
                    </div>
                </form>

              
            </div>
        </div>
    
      <div class="grid_12 ">
        <div class="car_wrap">

    
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
        <nav><ul>
                   <li class="current"><a href="index.php">Accueil</a></li>
                   <li ><a href="boutique.php">Boutique</a></li>
                   <li><a href="#">Mentions légales</a></li>
                   <li><a href="gelerie.php">Galerie</a></li>
                   <li><a href="contact.php">Contacts</a></li>
                 </ul></nav>
      </div>
      
        
        
          </div>
      </div>
      
    </div>
  </div>
</div>

   
<!--==============================footer=================================-->

<footer>    
  <div class="container_12">
    <div class="grid_12">
     Les Magiciens De Fouet © 2022  &nbsp;&nbsp; |&nbsp;&nbsp;   <a href="#">Privacy Policy</a>    &nbsp;&nbsp;|&nbsp;&nbsp;  
    </div>
    <div class="clear"></div>
  </div>
</footer>

</div>
       <script src="js/jquery.js"></script>
       <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
       <!-- Popper JS -->
       <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
       <!-- Bootstrap JS -->
       <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
       <script>
</body>
</html>