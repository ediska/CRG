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
$consoles = $consoleRepository->get_all_consoles($_SESSION['user']['id_collection']);

$title_page = "All_Consoles";
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Header.php";
?>

<div class="">
    <?php if($consoles != null): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Marque</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($consoles as $c): ?>
            <tr>    
                <td><?= $c['id']?></td>
                <td ><?= $c['name']?></td>
                <td><?= $c['marque']?></td>
                <td><a href="Edit.php?name=<?= $c['id'] ?>" class="text-primary"><i class="fas fa-edit"></i></a>
                    <a class="text-success" href=""><i class="far fa-eye"></i></a>
                    <a class="text-danger" href="Delete.php?name=<?= $c['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach ?>                
        </tbody>
    </table>
    <?php else: ?>
        <p class="text-center text-bold">Aucune Consoles enregistrées...</p>
    <?php endif ?>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Footer.php"; ?>