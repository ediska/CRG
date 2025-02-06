<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Inc_File.php";
# Empeche le forcage de la page
if (!isset($_SESSION['user']['access']))
{
    header("Location: ../../Views/Auth/login.php");
    exit;
}

$game_repository = new GameRepository();
$games = $game_repository->get_all_games($_SESSION['user']['id_collection']);

$title_page = "All_Games";
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Header.php";
?>

<div class="">
    <?php if($games != null): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Genre</th>
                <th>Editeur</th>
                <th>Console</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($games as $game): ?>
            <tr>    
                <td><?= $game['id']?></td>
                <td ><?= $game['name']?></td>
                <td><?= $game['nameimg']?></td>
                <td><?= $game['genre']?></td>
                <td><?= $game['editeur']?></td>
                <td><?= $game['console']?></td>
                <td><a href="Edit.php?game=<?= $game['id'] ?>"class="text-primary"><i class="fas fa-edit"></i></a>
                    <a class="text-success" href="ViewGame.php?game=<?= $game['id'] ?>"><i class="far fa-eye"></i></a>
                    <a class="text-danger" href="Delete.php?game=<?= $game['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach ?>                
        </tbody>
    </table>
    <?php else: ?>
        <p class="text-center text-bold">Aucun jeux enregistrés...</p>
    <?php endif ?>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Footer.php"; ?>