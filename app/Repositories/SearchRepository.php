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
    /**
     * Search for a patient
     * @param $query
     * @return mixed
     */
    public function search($query){

        return User::where('name', 'LIKE', "%$query%")
            ->where('user_type', 3)
            ->orWhere('email', 'LIKE', "%$query%")
            ->paginate(10);
    }

    /**
     * Check if patient exists
     * @param $query
     * @return mixed
     */
    public function checkIfPatientExists($query){

        if(User::where('email', '=', $query)
            ->where('user_type', 3)->exists()){

            return User::where('email', '=', $query)
                ->where('user_type', 3)
                ->first();
        }else{

            return null;
        }
    }

}