<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Inc_File.php";
# Empeche le forcage de la page
if (!isset($_SESSION['user']['access']))
{
    header("Location: ../../Views/Auth/login.php");
    exit;
}

# Recuperation des information des jeux
$games_repository = new GameRepository();
$nb_games = $games_repository->get_count_games($_SESSION['user']['id_collection']);
$last_game = $games_repository->get_last_game($_SESSION['user']['id_collection']);
# Recuperation des informations des consoles

$title_page = "Home";
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Header.php";
?>

    <div class="container mt-5 bg-light">
        <h1 class="text-center"><?= $_SESSION['user']['collection_name'] ?> :</h1>
        <div class="row text-right">
            <small>
                Bonjour 
                <em><b>    
                    <?php echo html_entity_decode($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?> 
                    <?php echo html_entity_decode($_SESSION['user']['lastname'], ENT_QUOTES, 'UTF-8'); ?> 
                </b></em>
                , voici une vue de votre collection :
            </small>
        </div>
        <div class="row justify-content-between mt-5">
            <div class="col-md-5 rounded border border-2 border-danger shadow" style="background-color:#00AAAA;">
                <h2 class="text-right text-white">Games :</h2>
                <div class="w-75">
                    <ul>
                        <li class="justify-content-between">
                            Total games : <span class="text-end text-danger"><b><?= ($nb_games != null) ? $nb_games : "0" ?></span></b>
                        </li>
                        <li>
                            Dernier jeu enregistré :  <span class="text-danger"><b><?= ($last_game != null) ? $last_game['name']." - ".$last_game['console'] : "Aucun Jeux" ?></b></span>
                        </li>
                    </ul>
                </div> 
            </div>
            <div class="col-md-5 rounded border border-2 border-danger">
                <h2 class="text-right">Consoles :</h2>
                <div class="w-75">
                    <ul>
                        <li class="justify-content-between">
                            Total consoles : <span class="text-end text-danger"><b></span></b>
                        </li>
                        <li>
                            Derniere console enregistrée :  <span class="text-danger"><b></b></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Footer.php"; ?>