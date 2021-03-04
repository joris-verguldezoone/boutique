<?php
namespace Controller;

require_once('Controller.php');

class DisplayArticle extends Controller{

    public function transfertType() // pour tricher pcq le header autogénéré fallait y penser à la conception de la bdd s/o les sous categories(gammes)
    { // cette fonction sert à ne pas utiliser directement le model dans la view 
        $model = new \Model\Display();
       $all_ID = $model->selectOneColumn('type','id'); 

       return $all_ID;
    }
//     public function typeSelected($get)
//     {
//         $displayArticle = new DisplayArticle();
//         $tab = $displayArticle->transfertType();

//         $modelType = new \Model\Display();


//         switch($_GET['typeSelected']){
//             case $tab[0]['id']:
// $modelType->displayArticlesByType($get)
//             break;
//             case $tab[1]['id']:
        
//             break;
//             case $tab[2]['id']:
                
//             break;
            
//             case $tab[3]['id']:
            
//             break;
            
//             case $tab[4]['id']:
            
//             break;
            
//             case $tab[5]['id']:
                
//             break;
                
//             case $tab[6]['id']:
        
//             break;
        
//             case $tab[7]['id']:
        
//             break;
        
                        
//             case $tab[8]['id']:
        
//             break;
        
//             default: 
//             echo 'redirect vers 404';
        
//             // selectAllWhere
//         }


//     }
}