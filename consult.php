<?php

require_once 'db.php';
require_once 'vendor/autoload.php';

$query = $db->query('SELECT adverts.id, adverts.title, adverts.description, adverts.postal_code, adverts.city, adverts.type, adverts.price, adverts.reservation_message FROM adverts');


$adverts = $query->fetchAll();

foreach ($adverts as $advert);


if ($advert['reservation_message'] === null) {
} else {
    $reserved = 'reserved';
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil.</title>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<header>

    <header class="bg-dark py-4">
        <div class="container">

            <div class="row">

                <div class="col-6 col-lg-12 text-start text-lg-center">
                    <a href="index.php" title="Philo..." class="text-white text-decoration-none h1 logo">
                        Consult for reservations.
                    </a>
                </div>
                <div class="col-12 d-none d-lg-block">
                </div>
            </div>
        </div>

        <div class="col-12 d-none d-lg-block">
            <nav>
                <ul class="d-flex align-items-center justify-content-center gap-5 py-3">
                    <li><a href="ajouter.php" title="ajouter" class="text-secondary text-decoration-none">Ajouter une annonce</a></li>
                    <li><a href="acceuil.php" title="announcements" class="text-secondary text-decoration-none">Acceuil</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <body>
        <main class="py-5">
            <div class="container">




                <div class="row">



                    <div class="col-12 col-lg-6 pb-5">


                        <article>
                            <a href="#?id=<?php echo $advert['title']; ?>" title="<?php echo $advert['title']; ?>" class="text-dark text-decoration-none">
                                <h1 class="pt-2"><?php echo $advert['title'] ?></h1>
                            </a>
                            <p class="text-secondary">
                                <?php echo $advert['postal_code']; ?>
                            </p>
                            <p class="py-2">
                                <?php echo $advert['description']; ?>
                            </p>
                            <div class="d-flex align-items-center gap-2">
                                <a href="anouce.php?id=" title="" class="badge rounded-pill bg-primary text-decoration-none">
                                    <?php echo $advert['city']; ?>
                                </a>
                            </div>
                            <div class="d-flex align-items-center gap-2 py-2">
                                <a href="anouce.php?id=" title="" class="badge rounded-pill bg-primary text-decoration-none"> Price €
                                    <?php echo $advert['price']; ?>
                                </a>
                                <div class="d-flex align-items-center gap-2 py-2">
                                    <a href="anouce.php?id=<?php echo $advert['id']; ?>" title="" class="badge rounded-pill bg-secondary text-decoration-none">
                                        <?php echo $advert['reservation_message']; ?>
                                        </a>

                                        <div class="alert alert-danger py-2">
                                            <?php echo $reserved; ?>
                                        </div>
                                    
                                </div>





                        </article>
                    </div>


                </div>
            </div>
        </main>
    </body>

</html>