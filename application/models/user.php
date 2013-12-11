
<?php
class User extends CI_Model
{
 function login($username, $password,$type)
 {

   $this -> db -> select('id,name,username, password');
   $this -> db -> from($type);
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>

