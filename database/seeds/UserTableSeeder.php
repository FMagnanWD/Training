<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_teacher = Role::where('name', 'Formateur')->first();
        $role_student  = Role::where('name', 'Etudiant')->first();

        $employee = new User();
        $employee->name = 'David';
        $employee->email = 'formateur@example.com';
        $employee->password = bcrypt('secret');
        $employee->save();
        $employee->roles()->attach($role_teacher);

        $manager = new User();
        $manager->name = 'Florian';
        $manager->email = 'etudiant@example.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($role_student);
    }
}
