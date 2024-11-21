<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => 'true',
                'auto_increment' => 'true'
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR', // Mengubah dari INT ke VARCHAR
                'constraint' => '15'  // Panjang maksimal 15 karakter (bisa diubah sesuai kebutuhan)
            ],
        ]);

        $this->forge->addKey('id_pelanggan', true); // Menambahkan kunci primer
        $this->forge->createTable('tb_pelanggan'); // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_pelanggan saat rollback
        $this->forge->dropTable('tb_pelanggan');
    }
}
