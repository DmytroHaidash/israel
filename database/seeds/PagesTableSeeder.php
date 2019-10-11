<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => 'Послуги та цiни',
                'slug' => 'service'
            ],
            [
                'title' => 'Наш центр',
                'slug' => 'about'
            ],
            [
                'title' => 'Методи лiкування',
                'slug' => 'method'
            ],
            [
                'title' => 'Напрямки роботи',
                'slug' => 'direction'
            ],
            [
                'title' => 'Питання та відповіді',
                'slug' => 'question'
            ],
        ];
        $faker = Faker\Factory::create('ru_RU');
        foreach ($pages as $item) {
            $page = \App\Models\Page::create([
                'slug' => $item['slug'],
            ]);
            if($item['slug'] == 'about' )
            {
                $page->addMediaFromUrl($faker->imageUrl(1920, 900))
                    ->toMediaCollection('uploads');
            }else{
            $page->addMediaFromUrl($faker->imageUrl(1920, 900))
                ->toMediaCollection('page');
            }

            foreach (config('app.locales') as $locale) {
                $page->translates()->create([
                    'lang' => $locale,
                    'title' => $item['title'],
                    'content' => [
                        'description' => ucfirst($faker->sentence),
                        'body' => '<p>'.implode('</p><p>', $faker->sentences(rand(3, 10))).'</p>'
                    ]
                ]);
            }
        }
    }
}
