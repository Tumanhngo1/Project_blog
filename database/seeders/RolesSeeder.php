<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::create([
            'name' => 'nguoi dung', 
            'slug' => 'user',
            'permissions' =>'post.update'
            
        ]);
        $editor = Role::create([
            'name' => 'Biên tập viên', 
            'slug' => 'editor',
            'permissions' => 
                'post.create'
            
        ]);
    }
}
