<?php

class Seeds_Users
{
    public static function run()
    {
		$auth = \Auth::instance();
		$password = $auth->hash_password('admin123');

		\DB::insert('users')->columns(['username', 'password', 'group', 'email', 'last_login', 'login_hash', 'profile_fields', 'created_at', 'updated_at'])
			->values(['admin', $password, 100, 'admin@example.com', null, null, '', time(), time()])
			->execute();

        echo "✔ Seeded users\n";
    }
}
