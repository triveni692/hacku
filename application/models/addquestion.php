
<?php
class Addquestion extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }


public function get_question()
{
	 $this -> db -> select('id,question');
   $this -> db -> from('question');
   $this -> db -> order_by('id','DESC');
   $query = $this -> db -> get();
     return $query->result_array();
}


}

?>