<?php
/**
 * Created by PhpStorm.
 * User: TESS
 * Date: 11/14/2016
 * Time: 9:08 PM
 */

namespace App\Repositories;

use App\User;


class RegisterPatientRepository {

    /**
     * The User model
     * @var
     */
    protected $model;

    /**
     * @param User $user
     */
    public function __construct(User $user){
        $this->model = $user;
    }

    /**
     * @param $request
     */
    public function store($request){
        $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender'    => $request->password,
            'phone_number' => $request->phone_number,
            'address'      => $request->address,
            'user_type' => 3
        ]);
    }



} 