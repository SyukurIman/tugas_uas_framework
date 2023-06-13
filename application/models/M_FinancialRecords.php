<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_FinancialRecords extends CI_Model
{
    public function getRecords()
    {
        // Mengambil daftar pengeluaran dan pemasukan dari database
        $query = $this->db->get('financial_records');
        return $query->result();
    }

    public function addRecord($type, $amount, $description, $date)
    {
        // Menambahkan record baru ke dalam database
        $data = array(
            'date' => $date,
            'type' => $type,
            'amount' => $amount,
            'description' => $description
        );
        $this->db->insert('financial_records', $data);
        return true;
    }

    public function deleteRecord($id)
    {
        // Menghapus record dari database berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('financial_records');
    }

    public function edit($data, $id)
    {
        if (!$this->db->update('financial_records', $data, array('id' => $id)))
        {
            return false;
        } 
        return true;
    }
    public function getRecordsById($id_plan)
    {
        $sql = 'SELECT * FROM financial_records WHERE id = ?';
        $data = $this->db->query($sql, $id_plan)->result();
        if (!$data) {
            return false;
        }
        return $data;
    }
    public function amount_money($id)
    {
        $sql = 'SELECT `type`,`amount` FROM financial_records WHERE id = ?';
        $data = $this->db->query($sql, $id)->result();
        if (!$data) {
            return false;
        }

        $total_amount = 0;
        foreach ($data as $key => $data_user) {
            if ($data_user->type == 'Pemasukkan') {
                $total_amount += $data_user->amount;
            } else {
                $total_amount -= $data_user->amount;
            }
        }

        return $total_amount;
    }
}