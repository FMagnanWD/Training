<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_teacher = new Role();
        $role_teacher->name = 'Formateur';
        $role_teacher->description = 'Utilisateur proposant de formations';
        $role_teacher->save();

        $role_student = new Role();
        $role_student->name = 'Etudiant';
        $role_student->description = 'Utilisateur consomant des formations';
        $role_student->save();
    }
}
