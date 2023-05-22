<?php 

class M_Kondektur extends CI_Model{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function countData(){
    $sql = "SELECT COUNT(*) AS dataKondektur FROM kondektur";
    return $this->db->query($sql)->result();
  }
  public function getAllData(){
    $sql = "SELECT kondektur.id_kondektur, kondektur.nama, 
            SUM(CAST(trans_upn.jumlah_km AS INT)) AS total_km FROM kondektur 
            LEFT JOIN trans_upn ON kondektur.id_kondektur = trans_upn.id_kondektur
            GROUP BY kondektur.id_kondektur HAVING COUNT(*)";
    return $this->db->query($sql)->result();
  }

  public function getDetailDataById($id){
    $sql = "SELECT trans_upn.id_trans_upn , kondektur.id_kondektur, trans_upn.id_bus, trans_upn.tanggal, bus.plat, 
            CAST(trans_upn.jumlah_km AS INT) AS total_km FROM kondektur 
            LEFT JOIN trans_upn ON kondektur.id_kondektur = trans_upn.id_kondektur
            LEFT JOIN bus ON trans_upn.id_bus = bus.id_bus
            WHERE kondektur.id_kondektur = ? GROUP BY trans_upn.id_trans_upn";
    return $this->db->query($sql, $id)->result();
  }

  public function getDetailDataByIdAndDate($data){
    $sql = "SELECT trans_upn.id_trans_upn , kondektur.id_kondektur, trans_upn.id_bus, trans_upn.tanggal, bus.plat, 
            CAST(trans_upn.jumlah_km AS INT) AS total_km FROM kondektur 
            LEFT JOIN trans_upn ON kondektur.id_kondektur = trans_upn.id_kondektur
            LEFT JOIN bus ON trans_upn.id_bus = bus.id_bus
            WHERE trans_upn.id_kondektur = ? AND trans_upn.tanggal BETWEEN ? AND ? ";
    return $this->db->query($sql, $data)->result();
  }

  public function deleteData($id){
    $tables = array('trans_upn', 'kondektur');
    $this->db->where('id_kondektur', $id);
    $this->db->delete($tables);
    return true;
  }

  public function deleteDataTrans($id_trans_upn){
    $this->db->where('id_trans_upn', $id_trans_upn);
    $this->db->delete('trans_upn');
    return true;
  }
  public function insertData($data)
  {
    $this->db->insert('kondektur', $data);
    return true;
  }
  public function getDataById($id){
    $sql = "SELECT * FROM kondektur WHERE id_kondektur = ?";
    return $this->db->query($sql, $id)->result();
  }
  public function editData($data, $id){
    // $tables = array('trans_upn', 'bus');
    // $this->db->where('id_bus', $data['id_bus']);

    $this->db->update('kondektur', $data, array('id_kondektur' => $id));
    return true;
  }
}

?>