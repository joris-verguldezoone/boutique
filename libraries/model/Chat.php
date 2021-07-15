<?php

namespace Model;

require_once("Model.php");

class Chat extends Model
{

    public function asignGroup($objet)
    {
        if (isset($_SESSION['user']['sub'])) {
            $hiddenID = $_SESSION['user']['sub'];
            $result1 = $this->verifyGroup('666666');
            $result2 = $this->verifyGroup($_SESSION['user']['sub']);
            $name = "Admin";
            $user_name = $_SESSION['user']['name'];
            $user_img = $_SESSION['user']['picture'];
        }
        if (isset($_SESSION['utilisateur']['id'])) {
            $hiddenID = $_SESSION['utilisateur']['id'];
            $result2 = $this->verifyGroup($hiddenID);
            $result1 = $this->verifyGroup('666666');
            $name = "Admin";
            $user_name = $_SESSION['utilisateur']['login'];
            $user_img = $_SESSION['utilisateur']['image'];
        }

        var_dump($result1);
        var_dump($result2);

        $bool = true;
        foreach ($result1 as $value) {

            foreach ($result2 as $value2) {
                var_dump($bool, 'ici');
                if ($value['id_group'] == $value2['id_group']) {
                    $bool = false;
                    var_dump($bool);
                    // return var_dump('already exist');
                } else {
                    $bool = true;
                    var_dump($bool);
                }
            }
        }
        $selectCount = $this->rowCount('groups', "id_user", $hiddenID);
        $selectCount = intval($selectCount[0]['COUNT(*)']);
        var_dump($selectCount);
        if ($selectCount < 3) {

            $uniqIDGroup = uniqid();
            $convertStr = strval($hiddenID);
            $admin_img = "https://image.shutterstock.com/image-vector/admin-stamp-watermark-scratched-style-260nw-1138728377.jpg";


            $sql = "INSERT INTO groups (id_user, id_group, name, img, objet) VALUES (:hiddenID, :uniqIDGroup, :target_name, :img, :objet)";
            $result = $this->pdo->prepare($sql); // user
            $result->bindValue(":hiddenID", $convertStr, \PDO::PARAM_STR);
            $result->bindValue(":uniqIDGroup", $uniqIDGroup, \PDO::PARAM_STR);
            $result->bindValue(":target_name", $name, \PDO::PARAM_STR); // target name 
            $result->bindValue(":img", $admin_img, \PDO::PARAM_STR);
            $result->bindValue(':objet', $objet, \PDO::PARAM_STR);
            $result->execute();


            $sql2 = "INSERT INTO groups (id_user ,id_group, name, img, objet) VALUES (:user_id, :uniqIDGroup, :name, :img, :objet)";
            $result2 = $this->pdo->prepare($sql2); // admin
            $result2->bindValue(":user_id", '666666', \PDO::PARAM_STR);
            $result2->bindValue(":uniqIDGroup", $uniqIDGroup, \PDO::PARAM_STR);
            $result2->bindValue(':name', $user_name, \PDO::PARAM_STR);
            $result2->bindValue(":img", $user_img, \PDO::PARAM_STR);
            $result2->bindValue(':objet', $objet, \PDO::PARAM_STR);
            $result2->execute();

            var_dump('group created');
            return array($result1, $result2);
        } else {
            return 'mes couilles';
        }
    }
    public function verifyGroup($user_id)
    {
        $sql = "SELECT * FROM groups WHERE id_user = :user_id";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':user_id', $user_id, \PDO::PARAM_STR);
        $result->execute();

        $fetch = $result->fetchAll(\PDO::FETCH_ASSOC);


        return $fetch;
    }
    public function fetch_groupChat($id_group)
    {
        if (isset($_SESSION['user'])) {
            $id_utilisateur = $_SESSION['user']['sub'];
        } elseif (isset($_SESSION['utilisateur'])) {
            $id_utilisateur = $_SESSION['utilisateur']['id'];
        }
        $sql = "SELECT * FROM groups WHERE id_group = :id_group AND id_user = :google_id";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_group', $id_group, \PDO::PARAM_STR);
        $result->bindValue(':google_id', $id_utilisateur, \PDO::PARAM_STR);

        $result->execute();

        $fetch = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $fetch;
    }
    public function sendMsg($id_group, $id_user, $content)
    {

        if (isset($_SESSION['user'])) {
            $image = $_SESSION['user']['picture'];
        } elseif (isset($_SESSION['utilisateur'])) {
            $image = $_SESSION['utilisateur']['image'];
        }

        $tz_object = new \DateTimeZone('Europe/Paris');

        $date = new \DateTime();
        $date->setTimezone($tz_object);
        $date = $date->format('Y-m-d H:i:s');

        $sql = "INSERT INTO group_message (id_group, id_user, content, date, image) VALUES (:id_group, :id_user, :content, :date, :image)";

        $result = $this->pdo->prepare($sql);
        $result->bindValue(":id_group", $id_group, \PDO::PARAM_STR);
        $result->bindValue(":id_user", $id_user, \PDO::PARAM_STR);
        $result->bindValue(":content", $content, \PDO::PARAM_STR);
        $result->bindValue(":date", $date, \PDO::PARAM_STR);
        $result->bindValue(":image", $image, \PDO::PARAM_STR);


        $result->execute();
    }
}
