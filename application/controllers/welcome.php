
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Welcome extends CI_Controller {

 function __construct()
 {
   parent::__construct();
        $this->load->helper(array('form', 'url'));
         $this->load->model('addquestion');
          $this->load->model('poll');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
     $data['type'] = $session_data['type'];
     $data['name'] = $session_data['name'];
     $data['status']="login";
     if($session_data['type']=="teacher")
     $this->load->view('teacher', $data);
   else $this->load->view('student', $data);
   }
   else
   {
     $this->load->view('login');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('welcome', 'refresh');
 }
  function updatequestion()
 {$query=$this->db->query("delete from question");
    $file = fopen("http://localhost/selectedquestion.txt","r");
    $char="";
while (! feof ($file))
  {
    $new=fgetc($file);
  $char= $char.$new;
  if($new=="?"){
    $req = "select * from askedquestion where question like('%".$char."%');";
    $q=$this->db->query($req)->result_array();
    if(!$q){
    $insert="insert into question (question) values('".$char."')";
    $this->db->query($insert);
    }
    $char="";

  }

  }

fclose($file);

   $data['question'] = $this->addquestion->get_question();
   $this->load->view('addquestion',$data);
 }

   function updateaskquestion()
 {
   $question=$_POST['question'];
   $len1 = strlen($question);
   $ques = substr($question,1,$len1-25);
   $insert="insert into askedquestion (question) values('".$ques."')";
   $this->db->query($insert);

 }
   function updateanswerquestion()
 {
   $question=$_POST['question'];
   $len1 = strlen($question);
   $ques = substr($question,1,$len1-27);
   $insert="insert into answer (question) values('".$ques."')";
   $this->db->query($insert);
   $insert="insert into askedquestion (question) values('".$ques."')";
   $this->db->query($insert);

 }


 function poll()
 {

   $this->load->view('poll');
 }
  function pollsubmit()
 {  
    $select="select max(keyy) as 'max' from poll";
    $keyyyy = $this->db->query($select)->result_array();
    $keyy="";
    foreach ($keyyyy as $key) {
      $keyy=$key['max']+1;
    }
    
    $count=$_POST['count'];
    $pollquestion=$_POST['pollquestion'];
    $insert="insert into poll (type,keyy,value) values('".$pollquestion."','".$keyy."','-1')";
    $this->db->query($insert);

    while($count>0){
      $option=$_POST["option".$count];
    $insert="insert into poll (type,keyy) values('".$option."','".$keyy."')";
    $this->db->query($insert);
      $count--;
    }
    $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['id'] = $session_data['id'];
     $data['type'] = $session_data['type'];
     $data['name'] = $session_data['name'];
     $data['poll']="poll";
     $this->load->view('teacher',$data);
 }


 function pollresult(){
     $select="select max(keyy) as 'max' from poll";
    $keyyyy = $this->db->query($select)->result_array();
    $keyy="";
    foreach ($keyyyy as $key) {
      $keyy=$key['max'];
    }

    $data['poll'] = $this->poll->get_poll($keyy);
     $this->load->view('pollresult',$data);

 }

}

?>

