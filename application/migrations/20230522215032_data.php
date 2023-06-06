<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_data extends CI_Migration { 
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'id_user' => array(
                'type' => 'INT',
                'constraint' => '100'
             ),
            'name_bill' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'target_uang' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'uang_now' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'target_tanggal' => array(
                'type' => 'TIMESTAMP',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('planner');

        $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'id_plan' => array(
                'type' => 'INT',
                'constraint' => '100'
             ),
            'amount_money' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'tanggal datetime default current_timestamp',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('history_planner');

        $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'avatar' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'created_at datetime default current_timestamp',
            'login_at' => array(
                'type' => 'TIMESTAMP',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');
    }

    public function down()
    {
        $this->dbforge->drop_table('planner');
        $this->dbforge->drop_table('user');
    }
}