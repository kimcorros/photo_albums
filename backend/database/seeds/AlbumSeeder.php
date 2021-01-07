<?php

use Illuminate\Database\Seeder;
use App\Album;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Output\ConsoleOutput;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = Http::get('https://jsonplaceholder.typicode.com/albums')->json();

        foreach ($albums as $album) {
            $data = Album::create([
                'id' => $album['id'],
                'title' => $album['title']
            ]);
            $data->save();
        }
    }
}
