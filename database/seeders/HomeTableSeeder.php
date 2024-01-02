<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home')->delete();
        
        \DB::table('home')->insert(array (
            0 => 
            array (
                'id' => 1,
                'judul' => 'My Perpustakaan',
                'deskripsi' => 'Content Menagement System (CMS)',
                'link' => 'https://www.youtube.com/',
                'gambar' => 'hero2.jpg',
                'created_at' => '2023-05-25 09:54:59',
                'updated_at' => '2023-05-25 09:54:59',
            ),
            1 => 
            array (
                'id' => 2,
                'judul' => 'Semua Serba Digital',
                'deskripsi' => 'Kamu bisa posting buku mu disini',
                'link' => 'https://www.instagram.com/',
                'gambar' => 'hero3.webp',
                'created_at' => '2023-05-25 09:54:59',
                'updated_at' => '2023-05-25 09:54:59',
            ),
        ));
        
        
    }
}