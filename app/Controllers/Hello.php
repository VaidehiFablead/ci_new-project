<?php

namespace App\Controllers;

class Hello extends BaseController
{
    public function greet()
    {
       echo "it is greet method";
    }

    public function index()
    {
        echo "it is index method!";
    }

    public function bye(){
        echo "bye bye...!";
    }
}
