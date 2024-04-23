<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'Posts view';
    }

    public function detail(int $id)
    {
        return 'Post ' . $id;
    }
}
