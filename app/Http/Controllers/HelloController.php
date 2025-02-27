<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // buat method
    function index(){
        echo "Hello";
    }
    function word_message(){
        echo "word";
    }
    function create(){
        
    }
}