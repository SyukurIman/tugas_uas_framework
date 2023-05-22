<?php 

class M_Driver extends CI_Model{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function countData(){
    $sql = "SELECT COUNT(*) AS dataDriver FROM driver";
    return $this->db->query($sql)->result();
  }
  public function getAllData(){
    $sql = "SELECT driver.id_driver, driver.nama, driver.alamat, driver.no_sim, 
            SUM(CAST(trans_upn.jumlah_km AS INT)) AS total_km FROM driver 
            LEFT JOIN trans_upn ON driver.id_driver = trans_upn.id_driver
            GROUP BY driver.id_driver HAVING COUNT(*)";
    return $this->db->query($sql)->result();
  }

  public function getDetailDataById($id){
    $sql = "SELECT trans_upn.id_trans_upn , driver.id_driver, trans_upn.id_bus, trans_upn.tanggal, bus.plat, 
            CAST(trans_upn.jumlah_km AS INT) AS total_km FROM driver 
            LEFT JOIN trans_upn ON driver.id_driver = trans_upn.id_driver
            LEFT JOIN bus ON trans_upn.id_bus = bus.id_bus
            WHERE driver.id_driver = ? GROUP BY trans_upn.id_trans_upn";
    return $this->db->query($sql, $id)->result();
  }

  public function getDetailDataByIdAndDate($data){
    $sql = "SELECT trans_upn.id_trans_upn , driver.id_driver, trans_upn.id_bus, trans_upn.tanggal, bus.plat, 
            CAST(trans_upn.jumlah_km AS INT) AS total_km FROM driver 
            LEFT JOIN trans_upn ON driver.id_driver = trans_upn.id_driver
            LEFT JOIN bus ON trans_upn.id_bus = bus.id_bus
            WHERE trans_upn.id_driver = ? AND trans_upn.tanggal BETWEEN ? AND ? ";
    return $this->db->query($sql, $data)->result();
  }

  public function deleteData($id){
    $tables = array('trans_upn', 'driver');
    $this->db->where('id_driver', $id);
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
    $this->db->insert('driver', $data);
    return true;
  }
  public function getDataById($id){
    $sql = "SELECT * FROM driver WHERE id_driver = ?";
    return $this->db->query($sql, $id)->result();
  }
  public function editData($data, $id){
    // $tables = array('trans_upn', 'bus');
    // $this->db->where('id_bus', $data['id_bus']);

    $this->db->update('driver', $data, array('id_driver' => $id));
    return true;
  }
}

?>