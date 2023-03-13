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
                'nama'=>'Riska Laundry Sukawarna',
                'alamat'=>'Sukawarna, Cicendo, Bandung',
                'tlp'=>'076548932145'
            ],
        ]);

        DB::table('users')->insert([
            [
                'nama'=>'Administrator',
                'username'=>'admin',
                'foto'=>'admin.jpg',
                'password'=>bcrypt('1234'),
                'role'=>'admin',
                'outlet_id'=>1,
            ],
            [
                'nama'=>'Kasir',
                'username'=>'kasir',
                'foto'=>'kasir.jpg',
                'password'=>bcrypt('1234'),
                'role'=>'kasir',
                'outlet_id'=>1,
            ],
            [
                'nama'=>'Pemilik',
                'username'=>'owner',
                'foto'=>'owner.jpg',
                'password'=>bcrypt('1234'),
                'role'=>'owner',
                'outlet_id'=>3,
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
                'nama_paket'=>'Express (6 Jam)',
                'harga'=> 25000,
                'diskon'=> 0,
                'harga_akhir'=> 25000,
                'jenis'=> 'kiloan',
                'outlet_id'=>1,
            ],
        ]);

        DB::table('members')->insert([
            [
                'nama'=>'Riska Rahmadhani',
                'jenis_kelamin'=>'P',
                'alamat'=>'Sukawarna, Cicendo, Bandung.',
                'tlp'=>'888777666888',
            ],
            [
                'nama'=>'Warsono',
                'jenis_kelamin'=>'L',
                'alamat'=>'Sukamanah, Desa Karangsari, Kec. Padaherang.',
                'tlp'=>'888222666555',
            ],
            [
                'nama'=>'Wanyi',
                'jenis_kelamin'=>'P',
                'alamat'=>'Cipicung, Desa Karangsari, Kec. Padaherang.',
                'tlp'=>'888777666333',
            ],
        ]);
    }
}
