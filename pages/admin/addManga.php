<div id="divAddManga" class="modal hide">
    <span class="closeAddManga">x</span>
        <h2 id="titleModal">Ajouter un manga</h2>
        <form action="" method="post">
            <input type="hidden" id="action" name="action" value="addManga"/>
            <input type="hidden" id="idManga" name="idManga" value=""/>
            
            <p>
                <label for="name">Nom du manga</label>
                <input type="text" id="name" name="name" value="<?= $_POST['name'] ?>" REQUIRED/>
            </p>


            <p>
                <label for="author">Auteur</label>
                <input type="text" id="author" name="author"  value="<?= $_POST['author'] ?>" REQUIRED/>
            </p>

            <p>
                <label for="image">Image de l'oeuvre</label>
                <input type="text" id="image" name="image" id="image" value="<?= $_POST['image'] ?>" placeholder="URL de l'image" REQUIRED/>
            </p>

            <p>
                <label for="date_start">Date de parution</label>
                <input type="date" id="date_start" name="date_start" id="date_start" value="<?= $_POST['date_start'] ?>"/>
            </p>

            <p>
                <label for="date_end">Fin de l'oeuvre</label>
                <input type="date" id="date_end" name="date_end" id="date_end" value="<?= $_POST['date_end'] ?>"/>
            </p>

            <p>
                <label for="type">Type d'oeuvre ( shonen, shojo, seinen, ...)</label>
                <input type="text" id="type" name="type" id="type" value="<?= $_POST['type'] ?>"/>
            </p>

            <p>
                <label for="category">Genre de l'oeuvre ( action, aventure, comédie, ...)</label>
                <input name="category" id="category" name="category" id="category" value="<?= $_POST['category'] ?>"/>
            </p>

            <input type="submit" name="submit"/>
        </form>
    </div>

    