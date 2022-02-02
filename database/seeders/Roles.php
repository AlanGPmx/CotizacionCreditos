<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdministrador = Role::create(['name' => 'admin']);
        $rolVendedor = Role::create(['name' => 'vendedor']);
        $rolUsuario = Role::create(['name' => 'usuario']);
    }
}
