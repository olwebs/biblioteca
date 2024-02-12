<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        * El sistema tiene 3 roles:
        * administrador
        * bibliotecario
        * reader
        */
        $admin = Role::create(['name' => 'admin']);
        $librarian = Role::create(['name' => 'librarian']);
        $reader = Role::create(['name' => 'reader']);
        
        Permission::create(['name' => 'index'])->syncRoles([$admin,$librarian,$reader]);
        Permission::create(['name' => 'login'])->syncRoles([$admin,$librarian,$reader]);
        Permission::create(['name' => 'authors'])->syncRoles([$admin,$librarian]);
        Permission::create(['name' => 'editorials'])->syncRoles([$admin,$librarian]);
        Permission::create(['name' => 'subjects'])->syncRoles([$admin,$librarian]);
        Permission::create(['name' => 'books'])->syncRoles([$admin,$librarian,$reader]);
        Permission::create(['name' => 'users'])->syncRoles([$admin,$librarian]);

        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($librarian);
        User::find(3)->assignRole($reader);
    }
}
