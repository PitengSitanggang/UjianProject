<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        $this->db->table('admin')->insert([
            'username'   => 'admin',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'nama'       => 'Admin Warung Sitanggang',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Menu items (min 8)
        $menus = [
            [
                'nama_menu'    => 'Soto Banjar Original',
                'kategori'     => 'Soto',
                'deskripsi'    => 'Soto khas Banjar dengan kuah bening rempah pilihan, disajikan dengan ketupat, perkedel, dan telur rebus. Kenikmatan autentik dari tanah Kalimantan.',
                'harga'        => 35000,
                'gambar'       => 'soto_banjar_ori.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Soto Banjar Spesial',
                'kategori'     => 'Soto',
                'deskripsi'    => 'Versi premium dengan ayam kampung, ditambah sate hati ampela, dan taburan bawang goreng renyah. Porsi jumbo untuk selera besar.',
                'harga'        => 45000,
                'gambar'       => 'soto_banjar_spesial.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Soto Banjar Daging Sapi',
                'kategori'     => 'Soto',
                'deskripsi'    => 'Soto Banjar dengan daging sapi pilihan yang empuk, dimasak dengan rempah-rempah tradisional khas Banjar. Kuah bening yang gurih dan segar.',
                'harga'        => 50000,
                'gambar'       => 'soto_banjar_sapi.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Perkedel Kentang',
                'kategori'     => 'Lauk',
                'deskripsi'    => 'Perkedel kentang renyah di luar, lembut di dalam. Dibuat dari kentang pilihan dengan bumbu rahasia resep turun-temurun.',
                'harga'        => 8000,
                'gambar'       => 'perkedel.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Sate Ayam Banjar',
                'kategori'     => 'Lauk',
                'deskripsi'    => 'Sate ayam khas Banjar dengan bumbu kacang yang kaya rasa, dipanggang sempurna dengan arang kayu. Satu porsi isi 10 tusuk.',
                'harga'        => 25000,
                'gambar'       => 'sate_banjar.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Es Kelapa Muda',
                'kategori'     => 'Minuman',
                'deskripsi'    => 'Kelapa muda segar langsung dari Kalimantan, disajikan dingin dengan es serut dan sirup gula merah. Menyegarkan!',
                'harga'        => 18000,
                'gambar'       => 'es_kelapa.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Es Teh Manis',
                'kategori'     => 'Minuman',
                'deskripsi'    => 'Teh manis segar dengan es batu, minuman pendamping sempurna untuk Soto Banjar yang hangat.',
                'harga'        => 8000,
                'gambar'       => 'es_teh.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Paket Hemat Soto Banjar',
                'kategori'     => 'Paket',
                'deskripsi'    => 'Soto Banjar Original + Perkedel + Es Teh Manis. Paket lengkap dengan harga terjangkau untuk makan siang yang memuaskan.',
                'harga'        => 45000,
                'gambar'       => 'paket_hemat.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Kue Bingka',
                'kategori'     => 'Dessert',
                'deskripsi'    => 'Kue tradisional Banjar yang manis dan lembut, terbuat dari tepung beras, santan, dan gula. Penutup yang sempurna.',
                'harga'        => 12000,
                'gambar'       => 'kue_bingka.jpg',
                'is_available' => 1,
            ],
            [
                'nama_menu'    => 'Soto Banjar Vegetarian',
                'kategori'     => 'Soto',
                'deskripsi'    => 'Alternatif sehat tanpa daging. Soto Banjar dengan tahu, tempe, dan sayur pilihan. Tetap kaya rasa dengan kuah rempah asli.',
                'harga'        => 30000,
                'gambar'       => 'soto_vegetarian.jpg',
                'is_available' => 1,
            ],
        ];

        $now = date('Y-m-d H:i:s');
        foreach ($menus as &$menu) {
            $menu['created_at'] = $now;
            $menu['updated_at'] = $now;
        }

        $this->db->table('menu')->insertBatch($menus);
    }
}
