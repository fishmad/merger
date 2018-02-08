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
				Permission::create(['name' => 'sample_browse', 'label' => 'Browse', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 1]);
				Permission::create(['name' => 'sample_read', 'label' => 'Read', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 2]);
				Permission::create(['name' => 'sample_edit', 'label' => 'Edit', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 3]);
				Permission::create(['name' => 'sample_add', 'label' => 'Add', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 4]);
				Permission::create(['name' => 'sample_delete', 'label' => 'Delete', 'item_order' => 3, 'groupings' => 'Sampling', 'groupings_order' => 5]);
    }
}

/**
Permission belongs in groupings
------------------------------
Groupings_order				1
Groupings							Samples

Permission Action			browse|read|edit|add|delete|all
Permission Label			Browse
Permission Name				samples_browse







*/