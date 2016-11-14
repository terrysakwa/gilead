<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create User doctor
         * Referenced by type 1
         */
        User::create([
            'name'      => 'Doctor Terry',
            'email'     => 'doctor@gilead.com',
            'password'  => bcrypt('123456'),
            'gender'    => 1,
            'phone_number' => '0712675071',
            'address'     => 'Juja',
            'user_type' => 1
        ]);

        /**
         * Create User Receptionist
         * Referenced by type 2
         */
        User::create([
            'name'      => 'Receptionist Faith',
            'email'     => 'receptionist@gilead.com',
            'password'  => bcrypt('123456'),
            'gender'    => 1,
            'phone_number' => '0712345678',
            'address'     => 'Nairobi',
            'user_type' => 2
        ]);

        /**
         * Create User Receptionist
         * Referenced by type 2
         */
        User::create([
            'name'      => 'Patient Terry',
            'email'     => 'patient@gilead.com',
            'password'  => bcrypt('123456'),
            'gender'    => 1,
            'phone_number' => '0712675123',
            'address'     => 'Mombasa',
            'user_type' => 3
        ]);
    }
}
