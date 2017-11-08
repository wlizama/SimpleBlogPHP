<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogPost;

class IndexController extends BaseController{
    
    public function getIndex(){
    
        $blog_posts = BlogPost::query()->orderBy("id", "desc")->get();

        return $this->render("index.twig", ["blog_posts" => $blog_posts]);

    }
}