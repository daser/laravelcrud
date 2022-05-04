<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Blog\BlogContract;


class BlogController extends Controller
{
    //

    protected $blog;

    public function __construct(BlogContract $blogcontract){
        $this->blog = $blogcontract;
    }

    public function index(){
        dd($this->blog->getAll());
    }
}
