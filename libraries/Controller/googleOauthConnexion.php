<?php
require_once('../../vendor/autoload.php');
require_once('../../vendor/google/apiclient/src/Client.php');

require_once('../../libraries/model/Connexion.php');
require_once('../../libraries/model/Profil.php');

use Google\Client;

function verifyGoogleConnect()
{

    if (!isset($_SESSION)) {
        session_start();
    }
    $id_token = $_POST['token'];
    $clientID = '1005217148028-lc9gsl07v3enlepc7ld5uut8cj0sqbl9.apps.googleusercontent.com';

    $client = new Client(['client_id' => $clientID]);
    $payload = $client->verifyIdToken($id_token);
    if ($payload) {
    } else {
        echo 'invalid token id';
    }
    $model = new \Model\Connexion;
    $fetchInfoUser = new \Model\Profil();

    $alreadyExist = $model->alreadyTakenCheck('utilisateurs_google', 'id_google', $payload['sub']);
    if (!$alreadyExist) {

        $model->registerGoogleUser($payload['sub'], $payload['name'], $payload['picture']);
    } else {
        $allInfo = $fetchInfoUser->getAllInfoUser($payload['sub']);
        // $_SESSION['user']['picture'] = $allInfo['image'];
        // var_dump($_SESSION);
        $payload['picture'] = $allInfo['picture'];
        // var_dump($allInfo['image']);
        $_SESSION['user'] = $payload;
        $_SESSION['connected'] = true;

        $id = $_SESSION['user']['sub'];

        // $model->updateOneValue('utilisateur', 'connection', 'id_google', 1, $id); 
        // permet de savoir si les utilisateurs sont connecté mais cela n'est pas encore utilisé sur ce projet
    }
    echo json_encode($payload);
}
verifyGoogleConnect();
