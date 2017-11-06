<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PostController extends BaseController{

    public function getIndex(){
        global $pdo;

        $query = $pdo->prepare("SELECT * from blog_post ORDER BY id DESC");
        $query->execute();

        $blog_posts = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $this->render("admin/posts.twig", ["blog_posts" => $blog_posts]);
    }

    public function getCreate(){
        
        return $this->render("admin/insert-posts.twig");

    }

    public function postCreate(){
        
        global $pdo;
        $title = $_POST["title"];
        $content = $_POST["content"];

        $sql = "INSERT INTO blog_post(title, content) VALUES (:title, :content)";
        $query = $pdo->prepare($sql);

        $result = $query->execute([
            'title' => $title,
            'content' => $content
        ]);

        return $this->render("admin/insert-posts.twig", ["result" => $result]);
    }
}