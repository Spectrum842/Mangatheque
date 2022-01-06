<div id="divAllManga">
    <?php foreach($mangas as $manga){
        ?>
        <div id="divManga<?= $manga['ID'] ?>" class="divAdmin">
            <p>Nom : <?= $manga['name'] ?></p>
            <img src ="<?= $manga['image'] ?>" alt="logo_<?= $manga['ID']?>" class="imageAdminManga" >
            <p>Auteur : <?= $manga['author'] ?></p>
            
            <p>Date de parution : <?= $manga['date_start'] ?></p>
            <p>Fin de la série : <?php if($manga['date_end'] != null){ echo $manga['date_end']; }else{ echo 'Pas de fin';} ?></p>
            <button id="deleteManga<?= $manga['ID'] ?>" class="buttonDeleteManga" data-post-id="<?= $manga['ID'] ?>" >Supprimer</button>
        </div>
        <?php
    }
    ?>

    <div id="divDeleteManga" class="modal hide">
        <span class="closeDeleteManga">x</span>
        <h2>Supprimer le manga ? </h2>
        <form action="" method="post">
            <input type="hidden" name="action" value="deleteManga" />
            <input type="hidden" id="idMangaDelete" name="idManga" value="" />

            <p>
                Voulez-vous vraiment supprimer ce manga ? 
            </p>
            <button type="submit" name="confirmation" value="yes">Confirmer</button>
            <button type="submit" name="confirmation"  value="no">Annuler</button>
        </form>
    </div>
</div>