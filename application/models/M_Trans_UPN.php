<?php 

class M_Trans_UPN extends CI_Model 
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllData(){
    $sql = "SELECT trans_upn.id_trans_upn AS id, 
            kondektur.nama AS nama_kondektur, 
            driver.nama AS nama_driver, 
            bus.plat AS plat_bus,
            bus.status AS status_bus,
            trans_upn.jumlah_km AS total_km,
            trans_upn.tanggal AS tanggal 
            FROM trans_upn 
            JOIN kondektur ON trans_upn.id_kondektur = kondektur.id_kondektur 
            JOIN bus ON trans_upn.id_bus = bus.id_bus 
            JOIN driver ON trans_upn.id_driver = driver.id_driver 
            GROUP BY trans_upn.id_trans_upn";
    return $this->db->query($sql)->result();
  }
}


?>