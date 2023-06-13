<?php 

class M_Planner extends CI_Model 
{

  public function getData($id){
    $sql = 'SELECT * FROM planner WHERE id_user = ?';
    $data = $this->db->query($sql, $id)->result();
    if (!$data) {
      return false;
    }
    return $data;
  }

  public function insert_data($data)
  {
    if (!$this->db->insert('planner', $data))
    {
      return false;
    } 
    return true;
  }

  public function update_plan($data)
  {
    if (!$this->db->insert('history_planner', $data))
    {
      return false;
    } 
    return true;
  }

  public function edit($data, $id)
  {
    if (!$this->db->update('planner', $data, array('id' => $id)))
    {
      return false;
    } 
    return true;
  }

  public function get_data_by_id($id_plan)
  {
    $sql = 'SELECT * FROM planner WHERE id = ?';
    $data = $this->db->query($sql, $id_plan)->result();
    if (!$data) {
      return false;
    }
    return $data;
  }

  public function get_all_data_history($id)
  {
    $sql = 'SELECT * FROM history_planner WHERE id_plan = ?';
    $data = $this->db->query($sql, $id)->result();
    if (!$data) {
      return false;
    }
    return $data;
  }

  public function delete_plan($id)
  {
    if ($this->db->where('id', $id)->delete('planner')) {
      if (!$this->db->where('id_plan', $id)->delete('history_planner')) {
        return false;
      }
      return true;
    }
    return false;
  }
  public function get_name_bill($id_plan)
  {
      $sql = 'SELECT `name_bill` FROM planner WHERE id = ?';
      $data = $this->db->query($sql, $id_plan)->result();
      if (!$data) {
          return false;
      }
      return $data;
  }
}


?>