
    <div id="divConnexion" class="divAuthenticate">
        <h2 class="titleAuthenticate">Connexion</h2>
        <form action="" method="post" id="formConexxion" class="formAuthenticate">
            <input type="hidden" name="action" value="connexion" />
            <p>
                <label for="email" class="label">Email</label><br/>
                <input type="text" name="email" value="<?= $_SESSION['email']?>" placeholder="example@email.com" /><br/>
            
                <?php if( isset( $errors['email'] ) ){ ?> <span class="spanError"><?= $errors['email'] ?></span><?php } ?>
            </p>

            <p>
                <label for="password" class="label">Password</label><br/>
                <input type="password" name="password" autocomplete="on" /><br/>
                <?php if( isset( $errors['password'] ) ){ ?> <span class="spanError"><?= $errors['password'] ?></span><?php } ?>
            </p>
            
            <p>
                <input type="submit" class="submitAuthenticate button otherButton" value="Connexion" />
            </p>
            
        </form>
    </div>
