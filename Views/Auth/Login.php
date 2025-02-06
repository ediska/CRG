<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/Core/Inc/Inc_File.php";

$error = null;

if (isset($_POST))
{
    # Vérification que tous les champs sont remplis
    if (!empty($_POST['email']) && !empty($_POST['password']))
    {
        $user_repository = new UserRepository();
        # Recuperation des données du formulaire
        $login = htmlentities($_POST['email']);
        $mdp_form = htmlentities($_POST['password']);
        # Verification si $login est un email ou le username
        if (filter_var($login, FILTER_VALIDATE_EMAIL))
        {
            $result = $user_repository->get_user_by('email', $login);
        } else {
            $result = $user_repository->get_user_by('username', $login);
        }

        # Vérification du retour de la requete
        if (isset($result['email']))
        {
            # Vérification du password
            if (md5($mdp_form) == $result['password'])
            {
                # Déclaration de la session
                session_start();
                $_SESSION['user'] = [
                    "access" => "1",
                    "id" => $result['id'],
                    "name" => $result['name'],
                    "lastname" => $result['lastname'],
                    "username" => $result['username'],
                    "email" => $result['email'],
                    "password" => $result['password'],
                    "id_collection" => $result['id_collection'],
                    "collection_name" => $result['collection_name']
                ];

                # Redirection vers Home_collection
                header("Location: ../Home/Home_Collection.php");
                exit;
            } else {
                $error = "Password incorrect..."; 
            }
        } else {
            $error = "Email ou usename inconnue";
        }
    }
}




$title_page = "Login";
require_once $_SERVER["DOCUMENT_ROOT"]."/Core/Inc/Header.php";
?>

<div class="container">
    <div class="w-50 position-absolute top-50 start-50 translate-middle mt-5">
        <h2 class="text-center mb-5"><i class="fa-solid fa-unlock"></i> Connexion à mon espace :</h2> 
        
        <form action="" method="POST">
            <?php if($error != null): ?>
                <div class="alert alert-danger alert-dismissible fade show w-25 mx-auto" role="alert">
                    <strong><?= $error ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="w-50 mb-3 row mx-auto">
                <label for="email" class="col-sm-2 col-form-label">Email / Pseudo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="w-50 mb-3 row mx-auto">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="w-50 mb-3 row justify-content-center mx-auto">
                <div class="col-6">
                <button type="submit" class="btn btn-outline-primary btn-sm mb-3">Me connecter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"]."/Core/Inc/Footer.php"; ?>