<section>
    <div id="divTitlePage">

        <h2 class="titleDashboard" > Bonjour <?= $name ?></h2>
        
            <?php if($countCollection == 0){
                ?>
                <p>Vous n'avez pas de collection</p>
                
                <?php
            }  ?>
        <button id="addColletionButton" class="button addButton">Ajouter une collection</button>
        
        <?php if( count($errors) > 0  ){ foreach($errors as $error){ ?> <span class="spanError"><?= $error ; }} ?>
    </div>
</section>

    

<section>
    <div id="divCollections">
        <?php
            
            foreach($allCollection as $collection){
                ?>
                <div id="divCollection<?= $collection['ID'] ?>" class="divCollection">
                    <h3><?= $collection['name']?> </h3>
                    <img src ="<?= $collection['image'] ?>" alt="logo_<?= $collection['name']?>" class="logoManga"/>
                    <p><?= $collection['description']?></p>
                    <button id='updateCollection<?= $collection['id_manga'] ?>' class='updateCollection button modifyButton' data-post-id='<?= $collection['ID'] ?>' data-post-name='<?= htmlspecialchars($collection['name'])?>' data-post-image='<?= $collection['image']?>' data-post-description='<?= htmlspecialchars($collection['description'])?>'>Modifier</button>
                    <button id='deleteCollection<?= $collection['id_manga'] ?>' class='deleteCollection button deleteButton' data-post-id='<?= $collection['ID'] ?>' data-post-name='<?= htmlspecialchars($collection['name'])?>' >Supprimer</button>
                    
                    <?php if($collection['id_manga'] != 0 ) { ?>
                    <p class="moreInfoManga" data-post-id="<?= $collection['id_manga'] ?>">Plus d'infos<i class="fas fa-angle-double-down icone"></i></p>
                    <div id="divMangaDetails<?= $collection['id_manga']?>" class="hide">
                        
                        <p>Auteur : <?= $tabMangaDetails[$collection['id_manga']]['author'] ?></p>
                        <p>Date de parution : <?= $tabMangaDetails[$collection['id_manga']]['date_start'] ?></p>
                        <p>Fin de série : <?= $tabMangaDetails[$collection['id_manga']]['date_end'] ?></p>
                        <p>Type de manga : <?= $tabMangaDetails[$collection['id_manga']]['type'] ?></p>
                        <p>Genre de manga  :  <?= $tabMangaDetails[$collection['id_manga']]['category'] ?></p>
                    </div>
                    <?php }else{
                        ?>
                        <p>Pas encore d'informations sur ce manga</p>
                        <?php
                    } ?>
                    
                </div>
                <?php
            }
        ?>
    <div>
</section>

<section>
    <div id="divFormCollection" class="modal hide">
        <span class="closeFormCollection">x</span>
        <h3>Ajouter une collection</h3>
        <form action="" method="post" class="formCollection">
            <input type="hidden" name="action" value="addCollection">
            <input type="hidden" name="id_user" value=<?= $id_user ?>>
            <p>
            <select id="id_manga" name="id_manga" class="select">
                <option value="0">Choisissez un manga parmi notre collection</option>
                
            <?php
            
            foreach($allManga as $manga){
                ?>
                <option value= <?= $manga['ID'] ?> date-post-image=<?= $manga['image'] ?>> <?= $manga['name'] ?> </option>
                <?php
            }
            ?>
            </select>
            </p>
            <p>
                <label for="name">Nom de la collection ou de l'oeuvre</label>
                <input type="text" id="nameAddCollection" name="name" value="<?php if(isset($_POST['name'])){ echo($_POST['name']);}  ?>" REQUIRED/>
            </p>

            <p>
                <label for="image">Bannière de la collection</label>
                <input type="text" name="image" id="image" value="<?php if(isset($_POST['image'])){ echo($_POST['image']);}  ?>" placeholder="URL de l'image"/>
            </p>

            <p>
                <label for="description">Détails de votre collection</label>
                <textarea name="description" rows="5"><?php if(isset($_POST['description'])){ echo($_POST['description']);}  ?></textarea>
            </p>

            <input type="submit" class="button" value="Ajouter à la collection" id="buttonAddCollection" />
        </form>
    </div>
</section>

<section>
    <div id="divFormUpdate" class="modal hide" >
        <span class="closeFormUpdate">x</span>
        <h3 id="titleModalUpdate"></h3>
        
        <form action="" method="post" class="formCollection">
            <input type="hidden" name="action" value="updateCollection" />
            <input type="hidden" id="idCollection" name="idCollection" value="" />
            
            <p>
                <label for="updateName">Nom de la collection ou de l'oeuvre</label>
                <input type="text" name="updateName" id="updateName" value="<?php if(isset($_POST['updateName'])){ echo($_POST['updateName']);}  ?>" REQUIRED />
            </p>

            <p>
                <label for="updateImage">Bannière de la collection</label>
                <input type="text" name="updateImage" id="updateImage" value="<?php if(isset($_POST['updateImage'])){ echo($_POST['updateImage']);}  ?>" placeholder="URL de l'image" />

            </p>

            <p>
                <label for="updateDescription">Description</label>
                <textarea name="updateDescription" id="updateDescription" rows="5"><?php if(isset($_POST['updateDescription'])){ echo($_POST['updateDescription']);}  ?> </textarea>
            </p>

            <input type="submit" class="button" value="Enregistrer les modifications"/>
        </form>
    </div>

    </div>
</section>

<section>
    <div id="divFormDelete" class="modal hide">
    <span class="closeFormDelete">x</span>
        <h3 id="titleModalDelete">Supprimer la collection</h3>
        <form action="" method="post" class="formCollection">
            <input type="hidden" name="action" value="deleteCollection" />
            <input type="hidden" id="idCollectionDelete" name="idCollection" value="" />

            <p>
                Voulez-vous vraiment supprimer cette collection ? 
            </p>
            <button type="submit" class="button" name="confirmation" value="yes">Confirmer</button>
            <button type="submit" class="button deleteButton" name="confirmation" value="no">Annuler</button>
        </form>
    </div>
 </section>
