<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Administer roles & permissions', 'label' => 'Administer roles & permissions', 'item_order' => 1, 'groupings' => 'Gates & Policies', 'groupings_order' => 1]);
        Permission::create(['name' => 'frontend_reader', 'label' => 'Front-end Reader', 'item_order' => 2, 'groupings' => 'Basic', 'groupings_order' => 2]);
    }
}
