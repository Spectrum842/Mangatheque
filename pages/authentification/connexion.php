<section>
    <div id="divConnexion" class="divAuthenticate">
        <h2 class="titleAuthenticate">Connexion</h2>
        <form action="" method="post" id="formConexxion" class="formAuthenticate">
            <input type="hidden" name="action" value="connexion" />

            <div class="divCenter">
                <p>
                    <label for="email" class="label">Email</label>
                </p>
                <p>
                    <input type="text" name="email" placeholder="example@email.com" />
                </p>
                
                <?php if( isset( $errors['email'] ) ){ ?> 
                <p>
                    <span class="spanError"><?= $errors['email'] ?></span>
                </p><?php } ?>
            </div>


            <div class="divCenter">
            <p>
                <label for="password" class="label">Password</label>
            </p>
            <p>
                <input type="password" name="password" autocomplete="on" />
            </p>
            <?php if( isset( $errors['password'] ) ){ ?> 
            <p>
                <span class="spanError"><?= $errors['password'] ?></span>
            </p><?php } ?>

            <p>
                <a href="/app/controllers/Inscription.php" alt="redirectionInscription">Pas encore de compte ? Inscrivez-vous !</a>
            </p>

            <p>
                <input type="submit" class="submitAuthenticate button otherButton" value="Connexion" />
            </p>
            
            
        </form>
    </div>
</section>
