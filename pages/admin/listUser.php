<div id="divAllUser">
    <?php foreach($users as $user){
        ?>
        <div id="divUser<?= $user['ID'] ?>" class="divAdmin">
            <p>Email : <?= $user['email'] ?></p>
            <p>Pseudo : <?= $user['pseudo'] ?></p>
            <p>datebirth : <?= $user['datebirth'] ?></p>
            <p>role : <?= $user['role'] ?></p>
        </div>
        <?php
    }
    ?>

</div>