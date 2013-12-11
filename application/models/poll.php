
<?php
class Poll extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }


public function get_poll($keyy)
{
	 $this -> db -> select('id,type,value');
   $this -> db -> from('poll');
   $this -> db -> where('keyy =',$keyy);
   $query = $this -> db -> get();
     return $query->result_array();
}


}

?>