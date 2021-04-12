<?php
namespace App\Controller;

use App\Store\Store;
use App\Controller\Admin;
use App\Controller\Catalogue;

/**
 * Comments controller class
 *
 */
class Comments
{
    public function submit()
    {
        if (isset($_REQUEST) && !empty($_REQUEST)) {
            $s = new Store();

            $s->submitComment([
                'user_name'  => $_REQUEST['name'],
                'user_email' => $_REQUEST['email'],
                'comment'    => $_REQUEST['comment'],
            ]);
            // Check for result
        }
        // ELSE some warning

        header("Location: /catalogue");
        (new Catalogue())->index();
    }

    public function approve()
    {
        if (isset($_REQUEST) && !empty($_REQUEST)) {
            $s = new Store();

            $s->approveComment($_REQUEST['approve']);
            // Check for result
        }
        // ELSE some warning
        
        header("Location: /admin");
        (new Admin())->index();
    }
}
