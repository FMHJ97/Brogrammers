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




<div id="newsBanner" class="text-center alert newsbanner" role="alert">
    <div class="header">
        <img class="GSImageLogoNews" src="../assets/img/Logo.svg" alt="GroundSound">
        <h1 id="newsTextHeader">
            ¡Novedades!
        </h1>
        <h2> Aquí tienes las últimas actualizaciones.</h2>
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
            <a href="./merch_item.php?id=8" class="col-12 col-md-4 card card-merch-item-News all-items">
                <img class="card-img-top-News" src="./assets/img/merch/gorra.png" alt="Gorra GroundSound">
                <div class="card-body-News">
                    <h3 class="card-title card-title-News">Gorra
                        GroundSound (Golden Dream)</h3>
                </div>
            </a>
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
                <img class="card-img-top-News" src="./assets/img/lineUp/2pac.jpg" alt="2Pac">
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