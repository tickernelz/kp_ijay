<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'kelola pengguna']);
        Permission::create(['name' => 'kelola surat']);
        Permission::create(['name' => 'tambah surat']);
        Permission::create(['name' => 'ubah surat']);
        Permission::create(['name' => 'hapus surat']);

        $role1 = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
        $role1->givePermissionTo('kelola pengguna');
        $role1->givePermissionTo('kelola surat');
        $role1->givePermissionTo('ubah surat');

        $role2 = Role::create([
            'name' => 'Pegawai',
            'guard_name' => 'web',
        ]);
        $role2->givePermissionTo('kelola surat');
        $role2->givePermissionTo('tambah surat');
        $role2->givePermissionTo('ubah surat');
        $role2->givePermissionTo('hapus surat');
    }
}
