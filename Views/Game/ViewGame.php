<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Inc_File.php";
# Empeche le forcage de la page
if (!isset($_SESSION['user']['access']))
{
    header("Location: ../../Views/Auth/login.php");
    exit;
}

if(isset($_GET['game']))
{
   $gameRepository = new GameRepository();
   $game = $gameRepository->get_game_by_id($_GET['game']);
}


$title_page = "view Game";
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Header.php";
?>

<div class="container">
    <div class="d-flex mt-5">
        <div class="w-25 ms-5">
            <a href="All.php" class="text-secondary nav-link"><i class="fas fa-arrow-left"></i> Retour</a>
        </div>
        <div class="w-50">
            <h1 class="text-center"><?= $game['name'] ?></h1>
        </div>
    </div>
    <hr class="w-50 text-danger mx-auto">
    <?php if($game['nameimg']): ?>
        <img src="" alt="pochette du jeu" title="<?= $game['nameimg'] ?>">
    <?php endif ?>
    
    <p>Caractèristique :</p>
    <div class="row g-0 mt-0 mb-0 py-0">
        <div class="col-12 d-flex w-100 border">
        <div class="p-3 bg-light w-50 text-center">Editeur :</div>
        <div class="p-3 border-start w-50"><?= $game['editeur'] ?></div>
        </div>
        <div class="col-12 d-flex w-100 border">
        <div class="p-3 bg-light w-50 text-center">Genre :</div>
        <div class="p-3 border-start w-50"><?= $game['genre'] ?></div>
        </div>
        <div class="col-12 d-flex w-100 border">
        <div class="p-3 bg-light w-50 text-center">Console :</div>
        <div class="p-3 border-start w-50"><?= $game['console'] ?></div>
        </div>
    </div>
    

</div>


<?php require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Footer.php"; ?>