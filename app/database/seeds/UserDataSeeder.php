<?php

class UserDataSeeder extends Seeder {

    public function run()
    {
      $groups = array(
          array(
              'id'          => 1,
              'name'        => 'Administrator',
              'permissions' => array(
                'admin' => 1,
                'users' => 1,
              )
          ),
          array(
              'id'          => 2,
              'name'        => 'Operator',
              'permissions' => array(
                'admin' => 1,
                'users' => 1,
              )
          ),
      );
      foreach ($groups as $group) {
        Sentry::createGroup($group);
      }

      $users = array(
          array(
            'username'  => 'doel',
            'email'     => 'admin@admin.com',
            'password'  => 'hafidz88',
            'first_name' => 'Abdul Hafidz',
            'last_name' => 'Anshari',
            'activated' => true,
          ),
          array(
            'username'  => 'dani',
            'email'     => 'dani@example.com',
            'password'  => 'dani123',
            'first_name' => 'Dani',
            'last_name' => 'Ahmad Suja`i, S.T.',
            'activated' => true,
          ),
          array(
            'username'  => 'rosid',
            'email'     => 'rosid@example.com',
            'password'  => 'rosid123',
            'first_name' => 'Rosid',
            'last_name' => 'S.T.',
            'activated' => true,
          ),
          array(
            'username'  => 'deden',
            'email'     => 'deden@example.com',
            'password'  => 'deden123',
            'first_name' => 'Deden',
            'last_name' => 'Nursaputra, S.Pd.',
            'activated' => true,
          ),
          array(
            'username'  => 'yusup',
            'email'     => 'yusup@example.com',
            'password'  => 'yusup123',
            'first_name' => 'Yusup',
            'last_name' => 'Wahyudin, S.Pd.',
            'activated' => true,
          ),
          array(
            'username'  => 'cucu',
            'email'     => 'cucu@example.com',
            'password'  => 'cucu123',
            'first_name' => 'Cucu',
            'last_name' => 'Sadikin, S.T.',
            'activated' => true,
          ),
      );
      
      foreach ($users as $user) {
        // Create the user
        $user = Sentry::createUser($user);

        // Find the group using the group id
        $operatorGroup = Sentry::findGroupById(2);

        // Assign the group to the user
        $user->addGroup($operatorGroup);

      }
    }

}