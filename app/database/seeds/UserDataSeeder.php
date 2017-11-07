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
            'username'  => 'budi',
            'email'     => 'budi@example.com',
            'password'  => 'budi123',
            'first_name' => 'Budi',
            'last_name' => 'Setianto S.Pd.',
            'activated' => true,
          ),
          array(
            'username'  => 'dul',
            'email'     => 'dul@example.com',
            'password'  => 'dulok',
            'first_name' => 'Abdul Syukur',
            'last_name' => 'S.Pd.',
            'activated' => true,
          ),
          array(
            'username'  => 'wahyudin',
            'email'     => 'wahyudin@example.com',
            'password'  => 'wahyudin123',
            'first_name' => 'Wahyudin',
            'last_name' => 'S.Kom.',
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
            'username'  => 'cahyana',
            'email'     => 'cahyana@example.com',
            'password'  => 'cahyana123',
            'first_name' => 'Cahyana',
            'last_name' => 'S.Kom.',
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