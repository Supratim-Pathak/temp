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
        // ROLE 
        Permission::create(['name'=>'view role']);
        Permission::create(['name'=>'delete role']);
        Permission::create(['name'=>'add role']);
        Permission::create(['name'=>'edit role']);
        
        // PERMISSION
        Permission::create(['name'=>'view permission']);
        Permission::create(['name'=>'delete permission']);
        Permission::create(['name'=>'add permission']);
        Permission::create(['name'=>'edit permission']);
        
        // USER BASED PERMISSION
        Permission::create(['name'=>'asign userBasedPermission']);

        // ROLE BASED PERMISSION
        Permission::create(['name'=>'asign roleBasedPermission']);

        //ASIGN ROLE TO USER 

        Permission::create(['name'=>'asign roleToUser']);
        Permission::create(['name'=>'revoke roleToUser']);

    }
}
