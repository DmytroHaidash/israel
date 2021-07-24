<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
         $this->call(PagesTableSeeder::class);
         //$this->call(ArticlesTableSeeder::class);
         //$this->call(CategoriesTableSeeder::class);
         //$this->call(DirectionsTableSeeder::class);
         //$this->call(MethodsTableSeeder::class);
         //$this->call(CommandsTableSeeder::class);
         //$this->call(ReviewsTableSeeder::class);
         $this->call(QuestionsTableSeeder::class);
         //$this->call(ServicesTableSeeder::class);
    }
}
