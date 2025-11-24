<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBankSoal extends Migration
{
    public function up()
    {
        // Tabel banksoal
        $this->forge->addField([
            'id_banksoal' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_banksoal' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'topik_pembelajaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'mata_pelajaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'id_pengajar' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_banksoal', true);
        $this->forge->createTable('banksoal');

        // Tabel soal
        $this->forge->addField([
            'id_soal' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_banksoal' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'pertanyaan' => [
                'type' => 'TEXT'
            ],
            'opsi_a' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'opsi_b' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'opsi_c' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'opsi_d' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'jawaban' => [
                'type'       => 'VARCHAR',
                'constraint' => '1'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_soal', true);
        $this->forge->createTable('soal');
    }

    public function down()
    {
        $this->forge->dropTable('soal');
        $this->forge->dropTable('banksoal');
    }
}
