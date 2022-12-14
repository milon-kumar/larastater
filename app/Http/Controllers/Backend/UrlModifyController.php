<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class UrlModifyController extends Controller
{
    public function index($slug)
    {
        $page =  Page::findBySlug($slug);
        if ($page){
            return view('layouts.backend.page.view',[
                'page'=>$page,
            ]);
        }else{
            return view('layouts.backend.error.404');
        }
    }
}
