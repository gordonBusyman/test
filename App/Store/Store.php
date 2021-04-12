<?php
namespace App\Store;

use App\Lib\DB;

/**
 * Store class
 *
 */
class Store
{
    public function getProducts()
    {
        // here need some health checks
        return DB::getInstance()
            ->query("SELECT * FROM products")
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function getApprovedComments()
    {
        // here need some health checks
        return DB::getInstance()
            ->query("SELECT * FROM comments WHERE approved_at IS NOT NULL")
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function getUnapprovedComments()
    {
        // here need some health checks
        return DB::getInstance()
            ->query("SELECT * FROM comments WHERE approved_at IS NULL")
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function approveComment($commentID)
    {
        $nowTime  = date("Y-m-d H:i:s", time());
        $updStmnt = "UPDATE comments SET approved_at='$nowTime' WHERE id=$commentID";

        //prepare stmnt should be used (ex.: to sanitize the input)
        // here need some health checks
        DB::getInstance()->query($updStmnt);
    }

    public function submitComment($commentData)
    {
        extract($commentData);
        $insStmnt = "INSERT INTO comments(user_name, user_email, comment) VALUES('$user_name', '$user_email', '$comment')";
        
        //prepare stmnt should be used (ex.: to sanitize the input)
        // here need some health checks
        DB::getInstance()->query($insStmnt);
    }
}
