
    <div id="divInscription" class="divAuthenticate">
        <h2 class="titleAuthenticate">Inscription</h2>
        <form action="" id="formInscription" class="formAuthenticate" method="post">
                <input type="hidden" name="action" value="inscription">
                
                    <label class="label" for="email">Email</label><br/>
                    <input type="text" name="email" value="<?= $_POST['email'] ?>" placeholder="example@email.com"  REQUIRED/><br/>
                    <?php if( isset( $errors['email'] ) ){ ?>
                        <span class="spanError"><?= $errors['email'] ?></span>
                    <?php } ?>
            

                <p>
                    <label class="label" for="password">Mot de passe</label><br/>
                    <input type="password" name="password" autocomplete="off" value="" REQUIRED/><br/>

                    <?php if( isset( $errors['password'] ) ){ ?>
                        <span class="spanError"><?= $errors['password'] ?></span>
                    <?php } ?>
                </p>

                <p>
                    <label class="label" for="passwordBis">Confirmer le mot de passe</label><br/>
                    <input type="password" name="passwordBis" autocomplete="off" value="" REQUIRED/><br/>

                    <?php  if( isset( $errors['passwordBis'] ) ){ ?>
                            <span class="spanError"><?= $errors['passwordBis'] ?></span>
                    <?php } ?>
                </p>
                
                <p>
                    <label class="label" for="pseudo">Pseudonyme</label><br/>
                    <input type="text" name="pseudo" value="<?= $_POST['pseudo'] ?>" REQUIRED /><br/>

                    <?php  if( isset( $errors['pseudo'] ) ){  ?>
                            <span class="spanError"><?= $errors['pseudo'] ?></span>
                    <?php }  ?>
                </p>
                
                <p>
                    <label class="label" for="datebirth">Date de naissance</label><br/>
                    <input type="date" name="dateBirth" value="<?= $_POST['dateBirth'] ?>" REQUIRED/><br/>

                    <?php  if( isset( $errors['dateBirth'] ) ){  ?>
                            <span class="spanError"><?= $errors['dateBirth'] ?></span>
                    <?php } ?>
                </p>
                
                <p>
                    <input type="submit" class="submitAuthenticate button otherButton" value="Inscription"></input>
                </p>
        </form>
    </div>
