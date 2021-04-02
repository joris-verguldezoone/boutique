        <footer>
        <div id="flex_footer">
            <div class="text">
                <i class="fas fa-shipping-fast"></i>
                <p class="text_footer">Livraison 
                    <br>Express</p>
            </div>
            <div class="text">
                <i class="fas fa-headphones-alt"></i>
                <p class="text_footer">SAV, 100% <br>disponique</p>
            </div>
            <div class="text">
            <i class="fas fa-sign-out-alt"></i>
                <p class="text_footer">Retour possible<br>sous 15 jours</p>
            </div>
            <div class="text">
            <i class="fas fa-map-marker-alt"></i>
            <p class="text_footer">De partout<br> en France</p>
            </div>
        </div>
        <div>
            <hr>
        </div>
        <div id="flex_footer_second">
            <div id="paiement">
                <p class="text_second">Mode de paiement</p>
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-stripe"></i>
            <i class="fab fa-cc-mastercard"></i>
            </div>
            <div id="logo_transport">
                <div id="transport">
                    <p class="text_second">Nos transporteurs</p>
                <img src="<?php echo $chronopost?>" alt="Chronopost" class="img_transport">
                <img src="<?php echo $colissimo?>" alt="Colissimo" class="img_transport">
                </div>
            </div>
          
        </div>
        <div>
            <hr>
        </div>
        <div id="reseaux_footer">
            <p id="contact">Un problème ? Contactez-nous.</p>
        <div>        
            <a href="https://twitter.com/" target="_blank" class="logo_reseaux_footer">A</a>
            <a href="https://www.facebook.com/" target="_blank" class="logo_reseaux_footer">B</a>
            <a href="https://www.linkedin.com/" target="_blank" class="logo_reseaux_footer">D</a>
            <a href="https://www.youtube.com/" target="_blank" class="logo_reseaux_footer">F</a>
            <a href="https://www.instagram.com/" target="_blank" class="logo_reseaux_footer">V</a>
        </div>
        </div>
        <div class='last_div_footer'>
            <a href="<?php echo $mention ?>" target="_blank" id="a_mention">Mentions Légales</a>
            <div>
                <?php
                if(isset($_SESSION['connected']) == true){

                    echo"
    
                    <form method='POST' action='".$deconnexion."'>
                        <button type='submit' id='submitDeconnxion' name='submitDeconnxion'>Deconnexion</button>
                    </form>";
                }
                
                ?>
            </div>
            <i class="far fa-copyright"> Hardjojo & Kiritshuko</i>
        </div>
        </footer>
    </body>
</html>