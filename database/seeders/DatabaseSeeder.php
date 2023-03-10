<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outlets')->insert([
            [
                'nama'=>'Riska Laundry Cipicung',
                'alamat'=>'Cipicung, Desa Karangsari, kec. Padaherang',
                'tlp'=>'085237849124'
            ],
            [
                'nama'=>'Riska Laundry Sukamanah',
                'alamat'=>'Sukamanah, Desa Karangsari, Kec. Padaherang',
                'tlp'=>'086512893457'
            ],
            [
                'nama'=>'Dika Ame Laundry',
                'alamat'=>'Anggaraksan, Desa Maruyungsari, Kec. Padaherang',
                'tlp'=>'999777666222'
            ],
            [
                'nama'=>'Caca Laundry',
                'alamat'=>'Tegalsari, Desa Cicapar, Kec. Banjarsari',
                'tlp'=>'888222444555'
            ],
            [
                'nama'=>'Laundry Cahaya',
                'alamat'=>'Padaherang',
                'tlp'=>'017652890912'
            ],
        ]);

        DB::table('users')->insert([
            [
                'nama'=>'Administrator',
                'username'=>'admin',
                'password'=>bcrypt('1234'),
                'role'=>'admin',
                'outlet_id'=>1,
            ],
            [
                'nama'=>'Kasir',
                'username'=>'kasir',
                'password'=>bcrypt('1234'),
                'role'=>'kasir',
                'outlet_id'=>1,
            ],
            [
                'nama'=>'Pemilik',
                'username'=>'owner',
                'password'=>bcrypt('1234'),
                'role'=>'owner',
                'outlet_id'=>3,
            ],
            [
                'nama'=>'Pevita Pearce',
                'username'=>'pevita',
                'password'=>bcrypt('1234'),
                'role'=>'kasir',
                'outlet_id'=>3,
            ],
            [
                'nama'=>'Unaa',
                'username'=>'unaa',
                'password'=>bcrypt('1234'),
                'role'=>'kasir',
                'outlet_id'=>4,
            ],
            [
                'nama'=>'Rini Yulia',
                'username'=>'rini',
                'password'=>bcrypt('1234'),
                'role'=>'kasir',
                'outlet_id'=>4,
            ],
            [
                'nama'=>'Eneng Risma',
                'username'=>'enengrisma',
                'password'=>bcrypt('1234'),
                'role'=>'kasir',
                'outlet_id'=>5,
            ],
        ]);

        DB::table('pakets')->insert([
            [
                'nama_paket'=>'Reguler',
                'harga'=> 7000,
                'diskon'=> 0,
                'harga_akhir' => 7000,
                'jenis'=> 'kiloan',
                'outlet_id'=>1,
            ],
            [
                'nama_paket'=>'Bed Cover',
                'harga'=> 5000,
                'diskon'=> 0,
                'harga_akhir'=> 5000,
                'jenis'=> 'bed_cover',
                'outlet_id'=>1,
            ],
            [
                'nama_paket'=>'Reguler (2 Hari)',
                'harga'=> 8000,
                'diskon'=> 0,
                'harga_akhir'=> 8000,
                'jenis'=> 'kiloan',
                'outlet_id'=>4,
            ],
            [
                'nama_paket'=>'Express (1 Hari)',
                'harga'=> 15000,
                'diskon'=> 0,
                'harga_akhir'=> 15000,
                'jenis'=> 'kiloan',
                'outlet_id'=>4,
            ],
            [
                'nama_paket'=>'Express (6 Jam)',
                'harga'=> 25000,
                'diskon'=> 0,
                'harga_akhir'=> 25000,
                'jenis'=> 'kiloan',
                'outlet_id'=>4,
            ],
            [
                'nama_paket'=>'Reguler (2 Hari)',
                'harga'=> 10000,
                'diskon'=> 0,
                'harga_akhir'=> 10000,
                'jenis'=> 'kiloan',
                'outlet_id'=>5,
            ],
            [
                'nama_paket'=>'Cuci Cepat (1 Hari)',
                'harga'=> 20000,
                'diskon'=> 0,
                'harga_akhir'=> 20000,
                'jenis'=> 'kiloan',
                'outlet_id'=>5,
            ],
            [
                'nama_paket'=>'Cuci Fast Hour (6)',
                'harga'=> 35000,
                'diskon'=> 0,
                'harga_akhir'=> 35000,
                'jenis'=> 'kiloan',
                'outlet_id'=>5,
            ],
        ]);

        DB::table('members')->insert([
            [
                'nama'=>'Rizki Fauzi',
                'jenis_kelamin'=>'L',
                'alamat'=>'Cipicung, Desa Karangsari, Kec. Padaherang.',
                'tlp'=>'888777666888',
            ],
            [
                'nama'=>'Yuni Alpiani',
                'jenis_kelamin'=>'P',
                'alamat'=>'Sukamanah, Desa Karangsari, Kec. Padaherang.',
                'tlp'=>'888222666555',
            ],
            [
                'nama'=>'Desi Yuliani',
                'jenis_kelamin'=>'P',
                'alamat'=>'Cipicung, Desa Karangsari, Kec. Padaherang.',
                'tlp'=>'888777666333',
            ],
            [
                'nama'=>'Melisa Putri',
                'jenis_kelamin'=>'P',
                'alamat'=>'Cangkring.',
                'tlp'=>'888000222333',
            ],
            [
                'nama'=>'Roger Danuarta',
                'jenis_kelamin'=>'P',
                'alamat'=>'Banjarsari.',
                'tlp'=>'888444555666',
            ],
            [
                'nama'=>'Amelia Apandi',
                'jenis_kelamin'=>'P',
                'alamat'=>'Padaherang.',
                'tlp'=>'023451765412',
            ],
        ]);
    }
}
