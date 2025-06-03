<?php

class Seeds_Categories
{
    public static function run()
    {
        $categories = array(
            ['name' => 'category 1'],
            ['name' => 'category 2'],
            ['name' => 'category 3'],
        );

        foreach ($categories as $category) {
            \DB::insert('categories')->set($category)->execute();
        }

        echo "✔ Seeded categories\n";
    }
}
