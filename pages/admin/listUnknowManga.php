
    <?php foreach($unknowManga as $manga){
        ?>
        <div id="divManga<?= $manga['ID'] ?>" class="divAdmin">
            <p>Nom : <?= $manga['name'] ?></p>
            <img src="<?= $manga['image'] ?>" alt="logo_<?= $manga['name']?>" class="imageAdminManga" />
            <button id="addManga<?= $manga['ID'] ?>" class="buttonAddManga" data-post-id="<?= $manga['ID'] ?>" data-post-name="<?= $manga['name']?>" data-post-image="<?= $manga['image']?>">Modifier</button>
            
        </div>
        <?php
    }
    ?>
