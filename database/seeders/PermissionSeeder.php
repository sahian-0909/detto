<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',

            'cotizacion_index',
            'cotizacion_create',
            'cotizacion_show',
            'cotizacion_edit',
            'cotizacion_destroy',

            'viatico_index',
            'viatico_create',
            'viatico_show',
            'viatico_edit',

            'kilometraje_index',
            'kilometraje_create',
            'kilometraje_show',
            'kilometraje_edit',
            'kilometraje_destroy',

            'cliente_index',
            'cliente_create',
            'cliente_show',
            'cliente_edit',
            'cliente_destroy',
            'cliente_archivar',

            'almacen_index',
            'almacen_create',
            'almacen_show',
            'almacen_edit',
            'almacen_destroy',

            'prenda_index',
            'prenda_create',
            'prenda_show',
            'prenda_edit',
            'prenda_destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
