<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;

class PostController extends BaseController{

    public function getIndex(){
        
        $blog_posts = BlogPost::all();
        return $this->render("admin/posts.twig", ["blog_posts" => $blog_posts]);
    }

    public function getCreate(){
        
        return $this->render("admin/insert-posts.twig");
    }

    public function postCreate(){
        
        $blogPosts = new BlogPost([
            "title" => $_POST["title"],
            "content" => $_POST["content"]
        ]);
        $blogPosts->save();

        $result = true;

        return $this->render("admin/insert-posts.twig", ["result" => $result]);
    }
}