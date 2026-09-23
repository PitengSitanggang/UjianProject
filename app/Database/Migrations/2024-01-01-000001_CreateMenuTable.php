<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_menu'   => ['type' => 'VARCHAR', 'constraint' => 200],
            'kategori'    => ['type' => 'ENUM', 'constraint' => ['Soto', 'Lauk', 'Minuman', 'Dessert', 'Paket'], 'default' => 'Soto'],
            'deskripsi'   => ['type' => 'TEXT'],
            'harga'       => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'gambar'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'is_available'=> ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}
