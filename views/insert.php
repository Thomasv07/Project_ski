<?php ob_start(); ?>
<h1>Création d'événement</h1>
<form action="./insert" method="POST" enctype="multipart/form-data">
    <div>
        <label for="tournament">Evenement:</label>
        <input type="text" name="city" id="city" placeholder="Nom de l'épreuve" required>
        <input type="date" name="date" id="date" required>
    </div>
    <section class="participant">
        <p>Ajouter des participants :</p>
        <div>
            <input type="file" name="picture[]" accept=".jpg, .jpeg, .gif, .png" id="imgInp">
        </div>
        <div>
            <input type="text" name="firstname" id="firstname" placeholder="Prénom" required>
        </div>
        <div>
            <input type="text" name="lastname" id="lastname" placeholder="Nom" required>
        </div>
        <div>
            <input type="date" name="dob" id="dob" required>
        </div>
        <div>
            <input type="text" name="email" id="email" placeholder="Email" required>
        </div>
        <select name="category" id="category">
            <option value="M1">M1</option>
            <option value="M2">M2</option>
            <option value="M3">M3</option>
            <option value="Sénior">Sénior</option>
            <option value="Snow">Snow</option>
            <option value="Nouvelle Glisse">Nouvelle Glisse</option>
        </select>
        <input type="button" id='add' value="+">
    </section>
    <div id="container"></div>
    <input type="submit" name="submit" value="Valider">
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>