<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/Core/Inc/Inc_File.php";

$error = null;
if (isset($_POST))
{
    if ((isset($_POST['username']) && !empty($_POST['username'])) && (isset($_POST['email']) && !empty($_POST['email']))
        && (isset($_POST['nameCollection']) && !empty($_POST['nameCollection'])) && (isset($_POST['password']) && !empty($_POST['password'])) 
        && (isset($_POST['confPassword']) && !empty($_POST['confPassword'])))
    {
        # Verification du formulaire
        $validation_form = new ValidationForm();
        $validation = $validation_form->validate_register($_POST);

        if (isset($validation['success']))
        {
            $user_repository = new UserRepository();
            # On enregistre l'user
            $insertU = $user_repository->create_user($_POST);
            # Verification de l'enregistrement
            if ($insertU != null)
            {
                $collection_repository = new ColectionRepository();
                # On insert le nom de la collection
                $insertCol = $collection_repository->create_collection($_POST['nameCollection'], $insertU);
                # On redirige vers la page login
                header('Location: Login.php');
                exit;
            } else {
                $error = "Une erreur est survenue veuillez renouvelez l'inscription...";
            }
        } else {
            $error = $validation['error'];
        }

    } else {
        $error = "Vous devez remplir tous les champs qui ont * en rouge.";
    } 
}
$title_page = "Register";
require_once $_SERVER["DOCUMENT_ROOT"]."/Core/Inc/Header.php";
?>
<div class="container">
        <div class="d-flex mt-5">
            <div class="w-25 ms-5">
                <a href="../../index.php" class="text-secondary nav-link"><i class="fas fa-arrow-left"></i> Retour</a>
            </div>
            <div class="w-50">
                <h1 class="text-center">Inscription</h1>
            </div>
        </div>
        <p class="text-center mb-5">Merci de vous inscrire, vous pourrez alors utiliser l'application de gestion...</p>
        <div class="w-50 mx-auto border border-dark p-3 mt-5 rounded shadow">
        <?php if(!$error == null && $_POST): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-exclamation-triangle"></i></strong>
                 <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-4 offset-1">
                        <div class="mb-3">
                        <label for="formNameRegister" class="form-label">Name :</label>
                        <input type="text"  name="name" class="form-control" id="formNameRegister" placeholder="name.....">
                        </div>
                    </div>
                    <div class="col-md-4 offset-1">
                        <div class="mb-3">
                        <label for="formLastnameRegister" class="form-label">Lastname :</label>
                        <input type="text"  name="lastname" class="form-control" id="formLastnameRegister" placeholder="lastname....">
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-md-4 offset-1">
                        <div class="mb-3">
                        <label for="formUsernameRegister" class="form-label">Username / Login <b class="text-danger">*</b> :</label>
                        <input type="text"  name="username" class="form-control" id="formUsernameRegister" placeholder="Username.....">
                        </div>
                    </div>
                    <div class="col-md-4 offset-1">
                        <div class="mb-3">
                        <label for="formEmailRegister" class="form-label">Email <b class="text-danger">*</b> :</label>
                        <input type="Email"  name="email" class="form-control" id="formEmailRegister" placeholder="example@exemple.com">
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-md-6 offset-1">
                    <label for="formNameCollectionRegister" class="form-label">Name of Collection <b class="text-danger">*</b> :</label>
                    <input type="text"  name="nameCollection" class="form-control" id="formNameCollectionRegister" placeholder="name collection....">
                </div>
                <div class="row">
                    <div class="col-md-4 offset-1">
                        <div class="mb-3">
                        <label for="formPasswordRegister" class="form-label">Password <b class="text-danger">*</b> :</label>
                        <input type="password"  name="password" class="form-control form-control-sm" id="formPasswordRegister">
                        </div>
                    </div>
                    <div class="col-md-4 offset-1">
                        <div class="mb-3">
                        <label for="formConfirmPasswordRegister" class="form-label">Confirm Password <b class="text-danger">*</b> :</label>
                        <input type="password"  name="confPassword" class="form-control form-control-sm" id="formConfirmPasswordRegister">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="S'incrire">
                </div>
            </form>
        </div>
    </div>

<?php require_once $_SERVER["DOCUMENT_ROOT"]."/Core/Inc/Footer.php"; ?>