<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->nom = "Administrateur";
        $role->description= "Gestion du site e-commerce";
        $role->save();

        $role = new Role();
        $role->nom ="Acheteur";
        $role->description = "Acheteur du site";
        $role->save();

    }
}
