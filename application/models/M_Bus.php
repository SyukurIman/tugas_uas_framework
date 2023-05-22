<?php 

class M_Bus extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function countData(){
    $sql = "SELECT COUNT(*) AS dataBus FROM bus";
    return $this->db->query($sql)->result();
  }

  public function dataGrafik(){
    $sql = "SELECT bus.plat AS plat,
            SUM(CAST(trans_upn.jumlah_km AS INT)) AS total_km FROM bus 
            LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus
            GROUP BY bus.id_bus HAVING COUNT(*) > 1";
    return $this->db->query($sql)->result();
  }

  public function getAllData(){
    $sql = "SELECT bus.id_bus, bus.plat, bus.status, 
            SUM(CAST(trans_upn.jumlah_km AS INT)) AS total_km FROM bus 
            LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus
            GROUP BY bus.id_bus HAVING COUNT(*)";
    return $this->db->query($sql)->result();
  }

  public function getAllDataByFilter($data){
    $sql = "SELECT bus.id_bus, bus.plat, bus.status, 
            SUM(CAST(trans_upn.jumlah_km AS INT))AS total_km FROM bus 
            LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus
            WHERE bus.status = ? GROUP BY bus.id_bus HAVING COUNT(*)";
    return $this->db->query($sql, $data)->result();
  }

  public function deleteData($id){
    $tables = array('trans_upn', 'bus');
    $this->db->where('id_bus', $id);
    $this->db->delete($tables);
    return true;
  }
  public function insertData($data)
  {
    $this->db->insert('bus', $data);
    return true;
  }
  public function getDataById($id){
    $sql = "SELECT * FROM bus WHERE id_bus = ?";
    return $this->db->query($sql, $id)->result();
  }
  public function editData($data, $id){
    // $tables = array('trans_upn', 'bus');
    // $this->db->where('id_bus', $data['id_bus']);

    $this->db->update('bus', $data, array('id_bus' => $id));
    return true;
  }
}


?>