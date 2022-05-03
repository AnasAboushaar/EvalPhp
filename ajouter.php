<?php

require_once 'db.php';

require_once 'vendor/autoload.php';

$query = $db->query('SELECT adverts.title, adverts.description, adverts.postal_code, adverts.city, adverts.type, adverts.price FROM adverts');
$adverts = $query->fetchAll();


$title = null;
$description = null;
$code = null;
$type = null;
$prix = null;
$city = null;
$error = null;

if (!empty($_POST)) {

    $title = htmlspecialchars(strip_tags($_POST['title']));
    $description = htmlspecialchars(strip_tags($_POST['description']));
    $code = htmlspecialchars(strip_tags($_POST['code']));
    $type = htmlspecialchars(strip_tags($_POST['type']));
    $prix = htmlspecialchars(strip_tags($_POST['price']));
    $city = htmlspecialchars(strip_tags($_POST['city']));

    if (
        !empty($title)
        && !empty($description)
        && !empty($code)
        && !empty($type)
        && !empty($prix)
        && !empty($city)
    ) {
        if(empty($_POST['adverts'])){

       
        $query = $db->prepare('INSERT INTO adverts (title, description, postal_code, city , type, price) VALUES (:title, :description, :postal_code, :city, :type, :price))');

        $query->bindValue(':title', $_title);
        $query->bindValue(':description', $description);
        $query->bindValue(':postal_code', $code);
        $query->bindValue(':city', $city);
        $query->bindValue(':type', $type);
        $query->bindValue(':price', $prix, PDO::PARAM_INT);
        $query->execute();

        header('Location: acceuil.php?successAdd=1');
    } else {
        $error = 'you have to fill the fields';
    }
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvalAnas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-dark py-4">
        <div class="container">

            <div class="row">

                <div class="col-6 col-lg-12 text-start text-lg-center">
                    <a href="index.php" title="Philo..." class="text-white text-decoration-none h1 logo">
                        Add your announcements.
                    </a>
                </div>
                <div class="col-12 d-none d-lg-block">
                </div>
            </div>
        </div>
    </header>

    <main class="py-5">
        <div class="container">
            <form method="post" enctype="multipart/form-data" class="w-50 mx-auto">
                <?php if ($error !== null) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de l’annonce</label>
                    <input type="text" value="<?php echo $title; ?>" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description de l’annonce</label>
                    <textarea class="form-control" id="description" name="description" rows="10"><?php echo $description; ?></textarea>
                </div>
                <div class="row mb-4">
                    <div class="col mb-3">
                        <label for="code" class="form-label">Code postal </label>
                        <input class="form-control" type="text" id="code" name="code" value="<?php echo $code; ?>">
                        <div id="coverHelpBlock" class="form-text">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col mb-3">
                            <label for="city" class="form-label">Ville </label>
                            <input class="form-control" type="text" id="city" name="city" value="<?php echo $city; ?>">
                            <div id="coverHelpBlock" class="form-text">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="type" class="form-label">Type d’annonce</label>
                            <input class="form-control" type="text" id="type" name="type" value="<?php echo $type; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Prix</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">€</span>
                                <span class="input-group-text">0.00</span>
                                <input type="text" class="form-control" aria-label="Euro amount (with dot and two decimal places)" name="price" value="<?php echo $prix; ?>">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">add the announcements</button>
            </form>
        </div>
    </main>
</body>

</html>