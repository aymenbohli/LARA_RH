<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;
use App\Models\Permission;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description = 'User is allowed to manage and edit other users'; // optional
        $admin->save();


        $user = User::where('email', '=', 'bohliaymen5@gmail.com')->first();

// role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id
// or eloquent's original technique
        $user->roles()->attach($admin->id); // id only
        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
// Allow a user to...
        $createPost->description = 'create new blog posts'; // optional
        $createPost->save();

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
// Allow a user to...
        $editUser->description = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($createPost);
// equivalent to $admin->perms()->sync(array($createPost->id));

        $owner->attachPermissions(array($createPost, $editUser));
// equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));


        $user->hasRole('owner');   // false
        $user->hasRole('admin');   // true
        $user->can('edit-user');   // false
        $user->can('create-post'); // true

        $user->hasRole(['owner', 'admin']);       // true
        $user->can(['edit-user', 'create-post']); // true


        $user->hasRole(['owner', 'admin']);             // true
        $user->hasRole(['owner', 'admin'], true);       // false, user does not have admin role
        $user->can(['edit-user', 'create-post']);       // true
        $user->can(['edit-user', 'create-post'], true); // false, user does not have edit-user permission
    }

}
