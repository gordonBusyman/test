<?php
namespace App\Controller;

use App\Lib\Twig;
use App\Store\Store;

/**
 * Catalogue controller class
 *
 */
class Catalogue
{
    public function index()
    {
        $s = new Store();

        echo Twig::get()->render('catalogue.html.twig', [
            'products' => $s->getProducts(),
            'comments' => $s->getApprovedComments(),
        ]);

        // Pagination, filters and the rest
    }
}
