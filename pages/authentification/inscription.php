<section>
    <div id="divInscription" class="divAuthenticate">
        <h2 class="titleAuthenticate">Inscription</h2>
        <form action="" id="formInscription" class="formAuthenticate" method="post">
                <input type="hidden" name="action" value="inscription">
                
                <div class="divCenter">
                    <p>
                        <label class="label" for="email">Email</label>
                    </p>
                    <p>
                        <input type="text" name="email" value="<?php if(isset($_POST['email'])){echo($_POST['email']); }  ?>" placeholder="example@email.com"  REQUIRED/>
                    </p>
                    <?php if( isset( $errors['email'] ) ){ ?>
                        <p><span class="spanError"><?= $errors['email'] ?></span></p>
                    <?php } ?>
                </div>

                <div class="divCenter">
                    <p>
                        <label class="label" for="password">Mot de passe</label>
                    </p>

                    <p><input type="password" name="password" autocomplete="off" value="" REQUIRED/></p>
                        <?php if( isset( $errors['password'] ) ){ ?>
                            <p><span class="spanError"><?= $errors['password'] ?></span></p>
                        <?php } ?>
                    </p>
                </div>
                <div class="divCenter">
                    <p>
                        <label class="label" for="passwordBis">Confirmer le mot de passe</label>
                    </p>
                    <p>
                        <input type="password" name="passwordBis" autocomplete="off" value="" REQUIRED/>
                    </p>
                        <?php  if( isset( $errors['passwordBis'] ) ){ ?>
                                <p><span class="spanError"><?= $errors['passwordBis'] ?></span></p>
                        <?php } ?>
                    </p>
                </div>
                
                <div class="divCenter">
                    <p>
                        <label class="label" for="pseudo">Pseudonyme</label>
                    </p>
                    <p>
                        <input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])){ echo($_POST['pseudo']);}  ?>" REQUIRED />
                    </p>
                        <?php  if( isset( $errors['pseudo'] ) ){  ?>
                    <p><span class="spanError"><?= $errors['pseudo'] ?></span></p>
                        <?php }  ?>
                
                <div class="divCenter">
                    <p>
                        <label class="label" for="datebirth">Date de naissance</label>
                    </p>
                    <p>
                        <input type="date" name="dateBirth" value="<?php if(isset($_POST['dateBirth'])){ echo($_POST['dateBirth']);}  ?>" REQUIRED/>
                    </p>
                        <?php  if( isset( $errors['dateBirth'] ) ){  ?>
                    <p><span class="spanError"><?= $errors['dateBirth'] ?></span></p>
                        <?php } ?>
                </div>
                <p id="submitAuthenticate">
                    <input type="submit" class="submitAuthenticate button otherButton" value="Inscription"></input>
                </p>
        </form>
    </div>
</section>