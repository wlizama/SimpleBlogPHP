<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;

class PostController extends BaseController{

    public function getIndex(){
        
        $blog_posts = BlogPost::all();
        return $this->render("admin/posts.twig", ["blog_posts" => $blog_posts]);
    }

    public function getCreate(){
        
        return $this->render("admin/insert-posts.twig");
    }

    public function postCreate(){
        
        $errors = [];
        $result = false;
        $validator = new Validator();

        $validator->add("title", "required");
        $validator->add("content", "required");

        if ($validator->validate($_POST)) {
            $blogPosts = new BlogPost([
                "title" => $_POST["title"],
                "content" => $_POST["content"]
            ]);

            if ($_POST["imagen"]) {
                $blogPosts->img_url = $_POST["imagen"];
            }

            $blogPosts->save();

            $result = true;
        }
        else{
            $errors = $validator->getMessages();
            // var_dump($errors);
        }


        return $this->render("admin/insert-posts.twig", ["result" => $result, "errors" => $errors]);
    }
}