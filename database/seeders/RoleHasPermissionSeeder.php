<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Admin
        $administrador_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($administrador_permissions->pluck('id'));

        // Vendedor
        $vendedor_permissions = $administrador_permissions->filter(function($permission) {
            return substr($permission->name, 0, 5) != 'user_' &&
                substr($permission->name, 0, 5) != 'role_' &&
                substr($permission->name, 0, 15) != 'cliente_destroy' &&
                substr($permission->name, 0, 16) != 'cliente_archivar' &&
                substr($permission->name, 0, 15) != 'almacen_destroy' &&
                substr($permission->name, 0, 18) != 'cotizacion_destroy' &&
                substr($permission->name, 0, 12) != 'kilometraje_' &&
                substr($permission->name, 0, 7) != 'prenda_' &&
                substr($permission->name, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($vendedor_permissions);
    }
}
