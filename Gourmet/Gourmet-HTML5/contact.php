<!DOCTYPE html>
<html lang="fr">
     <head>
     <title>Contacts</title>
     <meta charset="utf-8">
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/form.css">
     <script src="js/jquery.js"></script>
     <script src="js/jquery-migrate-1.1.1.js"></script>
     <script src="js/superfish.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
     <script src="js/sForm.js"></script>
     <script src="js/Forms.js"></script>
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
     </head>
     <body>
       <div class="main">
<!--==============================header=================================-->
 <?php
  include 'header.phtml';
 ?>
<!--=======content================================-->

<div class="content"><div class="ic"></div>
  <div class="container_12">
    <div class="grid_6">
      <h2>Trouvez-nous</h2>
            <div class="map">
            <figure class="img_inner">
                          <iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11560.378889703003!2d1.4028771!3d43.5837433!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x691f583aa08f550b!2sCapitole%20Secr%C3%A9tariat!5e0!3m2!1sfr!2stn!4v1649865229860!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </figure>
              <address>
                            <dl>
                                <dt><p>Les magiciens du Fouet 
                                <br>
                                150 Rue Nicolas Louis Vauquelin <br>
                                31100 TOULOUSE       
                            </p>
                                </dt>
                                
                                
                                <dd>Tél: 05 34 61 26 23</dd>
                            </dl>
                         </address>
 
          </div>
    </div>
    <div class="grid_5 prefix_1">
      <h2>Contactez-nous</h2>
      <form id="form">
      <div class="success_wrapper">
      <div class="success">Contact form submitted!<br>
      <strong>We will be in touch soon.</strong> </div></div>
      <fieldset>
      <label class="name">
      <input type="text" value="Enter your name">
      <br class="clear">
      <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
      <label class="email">
      <input type="text" value="Enter your e-mail">
      <br class="clear">
      <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>
      <label class="phone">
      <input type="tel" value="Enter your phone">
      <br class="clear">
      <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
      <label class=" message">
      <textarea>Write your message</textarea>
      <br class="clear">
      <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span> </label>
      <div class="clear"></div>
      <div class="btns"><a data-type="reset" class="btn">Supprimer</a><a data-type="submit" class="btn">Envoiyer</a>
      <div class="clear"></div>
      </div></fieldset></form>
    </div>
    <div class="clear"></div>
    <div class="bottom_block">
      <div class="grid_6"> 
      <div class="grid_6">
        <br>
        <h3>Rejoindrez-nous</h3>
        <div class="  ">
                        <a href="#"><img  style="width:8% " src="images/twitter.svg"></a>
                        <a href="#"><img  style="width:5%" src="images/facebook-f.svg"></a>
                        <a href="#"><img  style="width:8%" src="images/instagram.svg"></a>
                        <a href="#"><img  style="width:8%" src="images/linkedin-in.svg"></a>
                    </div>
        <nav><ul>
                   <li ><a href="index.php">Accueil</a></li>
                   <li ><a href="boutique.php">Boutique</a></li>
                   <li><a href="#">Mentions légales</a></li>
                   <li><a href="gelerie.php">Galerie</a></li>
                   <li class="current"><a href="contact.php">Contacts</a></li>
                 </ul></nav>
      </div>
      <div class="grid_6">
       
              </form> 
          </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<!--==============================footer=================================-->

<footer>    
  <div class="container_12">
    <div class="grid_12">
      Les Magiciens De Fouet © 2022  &nbsp;&nbsp;,  Les Droits Réservers.
    </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>