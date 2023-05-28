<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration_Planner extends CI_Migration { 
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
            'amount_money' => array(
                    'type' => 'INT',
                    'constraint' => '100'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'date' => array(
                'type' => 'TIMESTAMP',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('planner');
    }

    public function down()
    {
        $this->dbforge->drop_table('planner');
    }
}