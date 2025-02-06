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

if (isset($_POST) && !empty($_POST))
{
    $consoleRepository = new ConsoleRepository();
    $response = $consoleRepository->add_console($_POST);

    if ($response != false)
    {
        $success = $response;
    } else {
        $error = "Un probleme est survenu, veuillez essayer à nouveau...";
    }
}

$title_page = "Add Console";
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Header.php";
?>

<div class="container">
    <div class="d-flex mt-5">
        <div class="w-25 ms-5">
            <a href="All.php" class="text-secondary nav-link"><i class="fas fa-arrow-left"></i> Retour</a>
        </div>
        <div class="w-50">
            <h4>AJOUTER UNE CONSOLE</h4>
        </div>
    </div>
    <div class="w-50 mt-3 mx-auto">
        <!-------- BLOC MESSAGE ------->
        <?php if($success != null): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i></strong>
                    <?= $success ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <?php if($error != null): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i></strong>
                    <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
        <input type="hidden" name="idcollection" value="<?= $_SESSION['user']["id_collection"] ?>">
        <div class="mb-3 ms-auto">
            <label for="inputname" class="form-label">Name <span class="text-danger"> * </span></label>
            <input type="text" name="name" id="inputname" class="form-control">
        </div>
        <div class="mb-3">
            <label for="inputmarque" class="form-label">Marque</label>
            <input type="text" name="marque" id="inputmarque" class="form-control">
        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-sm btn-outline-primary" value="Valider">
        </div>
    </form>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Footer.php"; ?>