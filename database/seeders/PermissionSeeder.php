<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name'=>'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppDashboard->id,
            'name'=>'Access Dashboard',
            'slug'=>'app.dashboard',
        ]);

//        Role
        $moduleAppRoles = Module::updateOrCreate(['name'=>'Role Management']);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppRoles->id,
            'name'=>'Access Role',
            'slug'=>'app.roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppRoles->id,
            'name'=>'Create Role',
            'slug'=>'app.roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppRoles->id,
            'name'=>'Edit Role',
            'slug'=>'app.roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppRoles->id,
            'name'=>'Delete Role',
            'slug'=>'app.roles.destroy',
        ]);

//        User
        $moduleAppUsers = Module::updateOrCreate(['name'=>'User Management']);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppUsers->id,
            'name'=>'Access User',
            'slug'=>'app.users.index',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppUsers->id,
            'name'=>'Create User',
            'slug'=>'app.users.create',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppUsers->id,
            'name'=>'Edit User',
            'slug'=>'app.users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppUsers->id,
            'name'=>'Delete User',
            'slug'=>'app.users.destroy',
        ]);

//        Backep
        $moduleAppBackups = Module::updateOrCreate(['name'=>'Backup Management']);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppBackups->id,
            'name'=>'Access Backup',
            'slug'=>'app.backups.index',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppBackups->id,
            'name'=>'Create Backup',
            'slug'=>'app.backups.create',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppBackups->id,
            'name'=>'Download Backup',
            'slug'=>'app.backups.download',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppBackups->id,
            'name'=>'Delete Backup',
            'slug'=>'app.backups.destroy',
        ]);

        //        Pages
        $moduleAppPages = Module::updateOrCreate(['name'=>'Page Management']);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppPages->id,
            'name'=>'Access Page',
            'slug'=>'app.page.index',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppPages->id,
            'name'=>'Create Page',
            'slug'=>'app.page.create',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppPages->id,
            'name'=>'Edit Page',
            'slug'=>'app.page.edit',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$moduleAppPages->id,
            'name'=>'Delete Page',
            'slug'=>'app.page.destroy',
        ]);

    }
}
