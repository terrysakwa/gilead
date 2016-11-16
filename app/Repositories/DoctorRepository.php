<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/16/16
 * Time: 2:03 PM
 */

namespace App\Repositories;

use App\User;


class DoctorRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    /**
     * DoctorRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     *
     */
    public function getPatient(){

        return $this->model->where('user_type', '=', 3)->get();
    }



}