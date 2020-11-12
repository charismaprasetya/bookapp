<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::table('books')->insert([
            'title' => 'War of the Worlds',
            'description' => 'A science fiction masterpiece about Martians invading London',
            'author' => 'H. G. Wells',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'title' => 'A Wrinkle in Time',
            'description' => 'A young girl goes on a mission to save her father who has gone missing after working on a mysterious project called a tesseract.',
            'author' => 'Madeleine L\'Engle',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('author')->insert([
            'name' => 'Andrea Hirata',
            'gender' => 'Female',
            'biography' => 'Penulis terkenal di Indonesia yang pertama adalah Andrea Hirata. Penulis asal Bangka Belitung, yang lahir pada 24 Oktober 1976 ini, mulai dikenal berkat karya pertamanya yang berjudul Laskar Pelangi.',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('author')->insert([
            'name' => 'Pidi Baiq',
            'gender' => 'Female',
            'biography' => 'Banyak menghasilkan karya tulis tentang percintaan, Pidi Baiq juga masuk sebagai penulis terkenal di Indonesia, yang karyanya juga berhasil difilmkan.',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}