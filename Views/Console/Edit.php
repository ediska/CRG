<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Inc_File.php";
# Empeche le forcage de la page
if (!isset($_SESSION['user']['access']))
{
    header("Location: ../../Views/Auth/login.php");
    exit;
}

$consoleRepository = new ConsoleRepository();

# Recuperation des valeurs de la console
if(isset($_GET['name']))
{
    $console = $consoleRepository->get_console_by_id($_GET['name']);
}

if (isset($_POST) && !empty($_POST))
{
    # On enregistre les données
    $response = $consoleRepository->update_console($_POST);

    if ($response != false)
    {
        header('Location: ../../Views/Console/All.php');
        exit;
    }

    $error = "Veuillez rééssayer à nouveau...";
}

$title_page = "Edit Console";
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Header.php";
?>

<div class="container">
    <div class="d-flex mt-5">
        <div class="w-25 ms-5">
            <a href="All.php" class="text-secondary nav-link"><i class="fas fa-arrow-left"></i> Retour</a>
        </div>
        <div class="w-50">
            <h4>EDITER UNE CONSOLE</h4>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
        <input type="hidden" name="id" value="<?= $console['id'] ?>">
        <input type="hidden" name="idcollection" value="<?= $_SESSION['user']["id_collection"] ?>">
        <div class="mb-3 ms-auto">
            <label for="inputname" class="form-label">Name <span class="text-danger"> * </span></label>
            <input type="text" name="name" id="inputname" class="form-control" value="<?= $console['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="inputmarque" class="form-label">Marque</label>
            <input type="text" name="marque" id="inputmarque" class="form-control" value="<?= $console['marque'] ?>">
        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-sm btn-outline-primary" value="Valider">
        </div>
    </form>
</div>




<?php require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Header.php"; ?>