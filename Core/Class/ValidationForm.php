<?php


class ValidationForm
{
    public function validate_register($array)
    {
        $result = [];

        $user = new UserRepository();

        # Vérification si l'email existe
        $verif_email = $user->get_user_by('email',$array['email']);

        if ($verif_email == false)
        {
            $verif_username = $user->get_user_by('username', $array['username']);
            # Vérification de username
            if ($verif_username == false)
            {
                # On verifie l'egalité des password
                if ($array['password'] == $array['confPassword'])
                {
                    $result['success'] = "Valide";
                } else {
                    $result['error'] = "Les password doivent être identique...";
                }
            } else {
                $result['error'] = "Username existe déjà...";
            }

        } else {
            $result['error'] = "Email existe déjà...";
        }

        return $result;
    }
}