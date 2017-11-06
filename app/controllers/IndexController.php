<?php 

namespace App\Controllers;


class IndexController extends BaseController{
    
    public function getIndex(){
    
        global $pdo;

        $query = $pdo->prepare("SELECT * from blog_post ORDER BY id DESC");
        $query->execute();

        $blog_posts = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $this->render("index.twig", ["blog_posts" => $blog_posts]);

    }
}