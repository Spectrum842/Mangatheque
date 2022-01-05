
    <?php foreach($unknowManga as $manga){
        ?>
        <div id="divManga<?= $manga['ID'] ?>" class="divAdmin">
            <p>Nom : <?= $manga['name'] ?></p>
            <img src ="<?= $manga['image'] ?>" alt="logo_<?= $manga['ID']?>" style="max-width:200px; max-height:150px">
            <button id="addManga<?= $manga['ID'] ?>" class="buttonAddManga" data-post-id="<?= $manga['ID'] ?>" data-post-name="<?= $manga['name']?>" data-post-image="<?= $manga['image']?>">Modifier</button>
            
        </div>
        <?php
    }
    ?>
