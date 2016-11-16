<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/16/16
 * Time: 2:54 PM
 */

namespace App\Repositories;
use App\User;


class SearchRepository
{
    public function search($query){

        return User::where('name', 'LIKE', "%$query%")
            ->where('user_type', 3)
            ->orWhere('email', 'LIKE', "%$query%")
            ->paginate(10);
    }

}