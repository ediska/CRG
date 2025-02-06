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

if(isset($_GET['name']))
{
    $consoleRepository = new ConsoleRepository();
    $response = $consoleRepository->delete_console($_GET['name']);
}

if ($response != null)
{
    header("Location: ../../Views/Console/All.php");
    exit;
}
?>