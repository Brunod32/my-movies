<!DOCTYPE html>
<html lang="fr-Fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/main.css">
    <title>My Movies</title>
</head>

<body>
    <?php

    // Gérer l'autochargement de classe
    // Fonction permettant de charger
    function loadClass(string $class)
    {
        if ($class === "DotEnv") {
            require_once "./config/$class.php";
        } else if (str_contains($class, "Controller")) {
            require_once "./Controller/$class.php";
        } else  {
            require_once "./Entity/$class.php";
        }
    }
    
    spl_autoload_register("loadClass");

    $movieController = new MovieController();
    $movies = $movieController->getAll();

    $categoryController = new CategoryController();
    $categories = $categoryController->getAll();
    // echo "<pre>";
    // var_dump($categories);
    // echo "</pre>";

    // $movie = new Movie([
    //     "id" => 1,
    //     "title" => "Avatar",
    //     "description" => "Un film avec des gens bleu",
    //     "image_url" => "https://fr.web.img6.acsta.net/medias/nmedia/18/78/95/70/19485155.jpg",
    //     "release_date" => "2009-12-16",
    //     "director" => "James Cameron",
    //     "category_id" => 3
    // ]);
    // $movie->setId(1)->setTitle("Avatar")->setDescription("Un film avec des gens bleu...")->setDirector("James Cameron");

    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-film"></i>My Movies</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./views/create.php">Publier un film</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <h1>My Movies</h1>
        <h3>Découvrez et partager des films</h3>
        <img src="./images/logo.png" alt="Logo My Movies">

        <section class="container d-flex justify-content-center">
            <?php
            foreach ($movies as $movie) :
                // echo "<pre>";
                // var_dump($movie);
                // echo "</pre>";
                $category = $categoryController->get($movie->getCategory_id());
            ?>
                <div class="card mx-2" style="width: 18rem;">
                    <img src="<?= $movie->getImage_url() ?>" class="card-img-top" alt="<?= $movie->getTitle() ?>">
                    <div class="card-body">
                    <h5 class="card-title"><?= $movie->getTitle() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $movie->getRelease_date() ?> - <?= $movie->getDirector() ?></h6>
                    <p class="card-text"><?= $movie->getDescription() ?></p>
                    <footer class="blockquote-footer" style="color: <?=$category->getColor() ?>"><?= $category->getName() ?></footer>
                    <a href="#" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="./views/delete.php?id=<?= $movie->getId() ?>" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>
            <?php endforeach ?>
        </section>
    </main>

    <footer>

    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>