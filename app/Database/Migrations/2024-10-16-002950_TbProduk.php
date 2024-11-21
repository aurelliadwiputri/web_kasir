<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "produk_id" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, // Tambahkan unsigned untuk kunci utama
                'auto_increment' => true,
            ],
            "nama_produk" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false, // Tambahkan null false jika ini wajib
            ],
            "harga" => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false, // Tambahkan null false untuk harga
            ],
            "stok" => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0, // Berikan default untuk stok
                'null' => false,
            ],
        ]);

        // Tambahkan primary key
        $this->forge->addKey('produk_id', true);

        // Membuat tabel tb_produk
        $this->forge->createTable('tb_produk');
    }

    public function down()
    {
        // Menghapus tabel tb_produk saat rollback
        $this->forge->dropTable('tb_produk');
    }
}
