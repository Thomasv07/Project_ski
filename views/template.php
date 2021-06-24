<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<header>
    <?php include 'header.php'; ?>
</header>

<body>
    <?= $content ?>
    <h2>Importer un fichier excel</h2>
    <form action="./import" method="POST" enctype="multipart/form-data">
        <input type="file" name="import_file">
        <input type="submit" name="import_file_btn" value="Importer">
    </form>

</body>
<footer>
    <?php include 'footer.php'; ?>
</footer>

</html>