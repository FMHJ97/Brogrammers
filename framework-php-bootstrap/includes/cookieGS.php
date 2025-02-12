<!-- Cartel de cookies -->

<!--  <div id="bloqueoBanner" class="bloqueoalert">-->
<!-- 
    
    <div id="cookieBanner" class="text-center cookiealert alert" role="alert">
        <img class="GSImageLogo" src="../assets/img/Logo.svg" alt="GroundSound">
        <p id="cookieText">
            Utilizamos cookies para mejorar la experiencia del usuario en nuestra
            web. ¿Aceptas el uso de cookies?
        </p>
        <div class="botones-cookies">
            <button id="acceptcookies" type="button">Aceptar</button>
            <button id="rejectcookies" type="button">Rechazar</button>
        </div>
        <a href="./cookies.php">Política de Cookies</a> 
    </div> 
    
    
    -->
<!--  </div> -->

<?php

require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';

// Obtenemos todos los productos disponibles de la BD.
$productos = ProductoController::findAll();
// Recogemos el primer producto para mostrarlo en el banner de novedades.
$p = $productos[0];

?>


<div id="cookieBanner" class="text-center alert cookieBanner" role="alert">
    <img class="GSImageLogo" src="../assets/img/Logo.svg" alt="GroundSound">
    <p id="cookieText">
        Utilizamos cookies propias y de terceros para mejorar la experiencia del usuario en nuestra
        web. ¿Aceptas el uso de cookies?
    </p>
    <div class="botones-cookies">
        <button id="acceptcookie" type="button" class="btn" aria-label="Close">
            Aceptar
        </button>
        <button id="rejectcookie" type="button" class="btn" aria-label="Close">
            Rechazar
        </button>
    </div>
    <a class="enlaceCookie" href="./cookies2.php" target="_blank" rel="noopener noreferrer">Política de Cookies</a>
</div>
<div class="blockWeb" id="blockWeb"></div>




<div id="newsBanner" class="container text-center alert newsbanner" role="alert">
    <div class="header">
        <img class="GSImageLogoNews" src="../assets/img/Logo.svg" alt="GroundSound">
        <h1 id="newsTextHeader">
            ¡Novedades!
        </h1>
        <h2> Aquí tienes las últimas actualizaciones.</h2>
        <button id="closeNewsX" class="close-news-btn" aria-label="Close">✖</button>
    </div>
    <div class="boxNew" id="boxNew">
        <div class="news " id="news">
            <div>
                <p id="newsText">
                    No te pierdas las nuevas gorras de Ground Sound. ¡Hazte con la tuya!
                </p>
                <p id="newsText">
                    Pincha en la imagen o accede a nuestra <a class="enlaceNews" href="./merch.php" target="_blank"
                        rel="noopener noreferrer">zona de merchandising</a>.
                </p>
            </div>
            <form action="./merch_item.php" method="POST" class="col-12 col-md-4 card card-merch-item all-items <?php echo $p->categoria; ?>" data-precio="<?php echo $p->precio; ?>" data-nombre="<?php echo $p->nombre; ?>" onclick="this.submit()">
                <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                <img class="card-img-top" src="./<?php echo $p->imagen; ?>" alt="<?php echo $p->nombre; ?>"
                    height="10px">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $p->nombre; ?></h3>
                    <span>€<?php echo $p->precio; ?> EUR</span>
                </div>
            </form>
        </div>
    </div>
    <div class="boxNew" id="boxNew">
        <div class="news " id="news">
            <div>
                <p id="newsText">
                    Nueva incorporación a GroundSound Festival. 2Pac vuelve del más allá para un concierto único.
                <p id="newsText">
                    Revisa todos nuestros artistas en nuestro <a class="enlaceNews" href="./lineup.php" target="_blank"
                        rel="noopener noreferrer">cartel del festival</a>.
                </p>
            </div>
            <div class="col-12 col-md-4 card card-merch-item-News all-items">
                <img class="card-img-top-News" src="./assets/img/LineUp/2pac.jpg" alt="2Pac">
                <div>
                    <h3 class="card-title card-title-News">2Pac</h3>
                </div>
            </div>
        </div>
    </div>
    <button id="closenews" type="button" class="btn" aria-label="Close">
        Leido
    </button>
</div>






<!-- <script src="../js/cookiesGSs.js"></script> -->


<script src="../js/cookiealert.js"></script>