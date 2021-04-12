<?php
namespace App\Controller;

use App\Lib\Twig;
use App\Store\Store;

/**
 * Admin controller class
 *
 */
class Admin
{
    public function index()
    {
        $s = new Store();
 
        echo Twig::get()->render('admin.html.twig', [
             'comments' => $s->getUnapprovedComments(),
         ]);
    }
}
