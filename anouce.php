<?php


require_once 'db.php';


require_once 'vendor/autoload.php';






$query = $db->prepare('SELECT adverts.id AS id, adverts.title, adverts.description, adverts.postal_code, adverts.city, adverts.type, adverts.price, adverts.reservation_message FROM adverts');


$id = htmlspecialchars(strip_tags($_GET['id']));
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();


$advert = $query->fetch();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Announcement. - <?php echo $advert['title']; ?></title>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
       
    </head>

    <header class="bg-dark py-4">
        <div class="container">

            <div class="row">

                <div class="col-6 col-lg-12 text-start text-lg-center">
                    <a href="index.php" title="Philo..." class="text-white text-decoration-none h1 logo">
                        Announcement.
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
                <li><a href="acceuil.php" title="announcements" class="text-secondary text-decoration-none">Consulter toutes les annonces</a></li>
            </ul>
        </nav>
    </div>

</header>
    <body>
    

        <main class="pt-5">
            <div class="container">
                <article>
                    <h1 class="h1 text-start text-lg-center"><?php echo $advert['title']; ?></h1>
                    <div class="row pt-lg-2 justify-content-center">
                        <div class="col-12 col-lg-4 text-start text-lg-end">
                            <p class="text-secondary m-0"><?php echo $advert['postal_code']; ?></p>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="d-lg-flex align-items-center justify-content-center gap-2">
                                <a href="acceuil.php?adverts.id=<?php echo $advert['id']; ?>" title="<?php echo $advert['title']; ?>" class="badge rounded-pill bg-primary text-decoration-none">
                                    <?php echo $advert['type']; ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 text-lg-start">
                            <?php echo "{$advert['city']} {$advert['price']}"; ?>
                        </div>
                        
                        <div class="col-12 py-5 text-center">
                            <?php echo $advert['reservation_message']; ?>
                        </div>
                        <div class="col-12 col-lg-6 article">
                            
                            <p><?php echo $advert['description']; ?></p>    
                        </div>
                        <div class="d-flex align-items-center gap-2 py-2">
                                    <a href="consult.php?id=<?php echo $advert['id'];?>" title="" class="badge rounded-pill bg-secondary text-decoration-none"> For reservation Click here
                                   
                                    </a>
                                </div>
                    </div>
                </article>
            </div>
    </body>
</html>