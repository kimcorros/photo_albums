<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = Http::get('https://jsonplaceholder.typicode.com/photos')->json();

        foreach ($photos as $photo) {
            $data = Photo::create([
                'id' => $photo['id'],
                'title' => $photo['title'],
                'album_id' => $photo['albumId'],
                'url' => $photo['url'],
                'thumbnail_url' => $photo['thumbnailUrl']
            ]);
            $data->save();
        }
    }
}
