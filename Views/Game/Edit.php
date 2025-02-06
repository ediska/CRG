<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Inc_File.php";
# Empeche le forcage de la page
if (!isset($_SESSION['user']['access']))
{
    header("Location: ../../Views/Auth/login.php");
    exit;
}

$error = null;
$success = null;

# Recuperation donnée du jeu
if(isset($_GET['game']))
{
    $gameRepository = new GameRepository();
    $game = $gameRepository->get_game_by_id($_GET['game']);
    
    # Recuperation des console de la collection de l'user
    $consoleRepository = new ConsoleRepository();
    $consoles = $consoleRepository->get_all_consoles($_SESSION['user']['id_collection']);

    if ((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['console']) && !empty($_POST['console'])))
    {
        # On enregistre les données
        $response = $gameRepository->update_game($_POST);
        # On verifie le retour
        if ($response != false)
        {
            $success = $response;
        } else {
            $error = "Un probleme est survenue, veuillez essayer à nouveau....";
        }
    }
}


$title_page = "Edit Game";
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

    <div class="w-50 mt-3 mx-auto">
        <!-------- BLOC MESSAGE ------->
        <?php if($success != null && $_POST): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i></strong>
                    <?= $success ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <?php if($error != null && $_POST): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i></strong>
                    <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idcollection" value="<?= $_SESSION['user']['id_collection'] ?>" >
                <input type="hidden" name="id" value="<?= $game['id'] ?>" >
                <div class="mb-3 ms-auto">
                    <label for="inputnameg" class="form-label">Name Game <b class="text-danger">*</b></label>
                    <input type="text" name="name" id="inputnamef" class="form-control" value="<?= $game['name']?>">
                </div>
                <div class="mb-3 ms-auto">
                    <label for="inputnamec" class="form-label">Console <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" name="console">
                        <option value="">Select console</option>
                    <?php foreach($consoles as $cname): ?>
                        <?php if($game['console'] == $cname['name']): ?>
                            <option value="<?= $cname['name'] ?>" selected>
                        <?php else: ?>
                            <option value="<?= $cname['name'] ?>"  >
                        <?php endif ?>
                            <?= $cname['name'] ?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputediteur" class="form-label">Editeur</label>
                    <input type="text" name="editeur" id="inputediteur" class="form-control" value="<?= $game['editeur']?>">
                </div>
                <div class="mb-3">
                    <label for="inputgenre" class="form-label">Genre</label>
                    <input type="text" name="genre" id="inputgenre" class="form-control" value="<?= $game['genre']?>">
                </div>
                <div class="mb-3">
                    <label for="inputdescription" class="form-label">Description</label>
                    <textarea class="form-control" id="inputdescription" rows="3" name="description"></textarea>
                </div>
                <div class="mb-3"> 
                    <label for="formFile" class="form-label">Img du jeux</label>
                    <input type="hidden" name="nameimg" value="<?= $game['nameimg'] ?>" >
                    <input class="form-control" type="file" id="formFile" name="imgGame" >
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-sm btn-primary" value="Valider">
                </div>
            </form>
        </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Footer.php"; ?>