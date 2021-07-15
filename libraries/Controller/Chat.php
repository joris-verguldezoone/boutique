<?php

namespace Controller;

require_once('Controller.php');

class Chat extends Controller
{
    public function createGroupConversation($objet)
    {
        // check si la room existe,
        // creer ou sauter l'étape de la room
        // sendMsg 
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['sub'];
            $user_img = $_SESSION['user']['picture'];
        }
        if (isset($_SESSION['utilisateur'])) {
            $user_id = $_SESSION['utilisateur']['id'];
            $user_img = $_SESSION['utilisateur']['image'];
        }
        $model = new \Model\Chat;
        $result = $model->asignGroup($objet);
        return $result;
    }
    public function loadConversation()
    {
        if (isset($_SESSION['utilisateur'])) {
            $userID = $_SESSION['utilisateur']['id'];
        } elseif (isset($_SESSION['user'])) {
            $userID = $_SESSION['user']['sub'];
        }
        $model = new \Model\Chat;

        $result = $model->fetchOneValueCol('groups', 'id_user', $userID);
        return $result;
    }
    public function fetchConversation($groupID)
    {

        $model = new \Model\Chat;

        $result1 = $model->fetch_groupChat($groupID);
        // $result1 = json_encode($result1);

        $result2 = $model->fetchOneValueCol('group_message', 'id_group', $groupID);


        return $result = [$result1, $result2];
    }
    public function sendMessages($group_id, $content)
    {
        if (isset($_SESSION['utilisateur'])) {
            $userID = $_SESSION['utilisateur']['id'];
        } elseif (isset($_SESSION['user'])) {
            $userID = $_SESSION['user']['sub'];
        }
        $model = new \Model\Chat;

        $result = $model->sendMsg($group_id, $userID, $content);
        return $result;
    }
}
