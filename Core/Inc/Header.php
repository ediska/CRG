<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= (isset($title_page) ? $title_page : "C-RG") ?></title>
        <!-- Links for CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/Asset/Library/fontawesome/css/all.min.css"> 
        <!-- Links for Javascript -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    </head>
    <body>
        <!--  Navbar  -->
        <?php if(isset($_SESSION['user']['access'])):?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">C R G</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Console
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../../Views/Console/Add.php">Add Console</a></li>
                                    <li><a class="dropdown-item" href="../../Views/Console/All.php">All Console</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Stat Console</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Game
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../../Views/Game/Add.php">Add Game</a></li>
                                    <li><a class="dropdown-item" href="../../Views/Game/All.php">All Game</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Stat Game</a></li>
                                </ul>
                            </li>
                            <!-- Add Dropdown Buy -->
                            <!-- Add Dropdown Prêt --->
                        </ul>
                        <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                            <li class="nav-item dropdown me-5">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i>  <?= $_SESSION['user']['username'] ?>
                                </a>
                                <ul class="dropdown-menu me-2" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Compte</a></li>
                                    <li><a class="dropdown-item" href="#">Achats</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="../../Views/Auth/Logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>    
                    </div>
                </div>
            </nav>
        <?php else: ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">C R G</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <!--  Gestion collection -->
                            <!--  Gestion Ajout envie d'achat -->
                            <!--  Gestion Pret -->
                            <!--  Gestion Export -->
                            <!--  Gestion veille tarifaire -->
                        </ul>
                        <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="../../Views/Auth/Login.php">Mon Espace</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../Views/Auth/Register.php">M'inscrire</a>
                            </li>
                        </ul>    
                    </div>
                </div>
            </nav>
        <?php endif ?>
            <div class="container-fluid">