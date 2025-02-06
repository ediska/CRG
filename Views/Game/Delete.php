<?php 
session_start();
require_once $_SERVER['DOCUMENT_ROOT']."/Core/Inc/Inc_File.php";
# Empeche le forcage de la page
if (!isset($_SESSION['user']['access']))
{
    header("Location: ../../Views/Auth/login.php");
    exit;
}

$response = null;

if(isset($_GET['game']))
{
    $gameRepository = new GameRepository();
    $response = $gameRepository->delete_game($_GET['game']);
    
    
}

if ($response != null)
{
    header("Location: ../../Views/Game/All.php");
    exit;
}



?>

