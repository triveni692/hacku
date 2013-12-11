<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Forum extends CI_Controller {

 function __construct()
 {
   parent::__construct();
        $this->load->helper(array('form', 'url'));
         $this->load->model('addquestion');
 }

 function index()
 {
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['status'] = "login";
    $data['name'] = $session_data['name'];
  }
  else redirect('welcome','refresh');
   $comments = array();

   $db1 = $this->load->database('default', TRUE);
   $q = "SELECT * FROM `answer`;";
   $qq = $db1->query($q)->result_array();
   $data['questions']= $qq;
   $db1 = $this->load->database('hachu', TRUE);
   foreach ($qq as $key) {
    $q= "SELECT * FROM `c_".$key['id']."`";
    $q = $db1->query($q)->result_array();
    $comments[$key['id']] = $q;
   }
   $data['comments'] = $comments;
   $data['category'] = "All";

   $this->load->view('forum',$data);
 }
 
 function category($default = "none")
 {
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['status'] = "login";
    $data['name'] = $session_data['name'];
  }
  else redirect('welcome','refresh');

   $comments = array();

   $db1 = $this->load->database('default', TRUE);
   $q = "SELECT * FROM `answer` WHERE `category` = '".$default."'" ;
   if($default == "none") $q = "SELECT * FROM `answer`";
   $qq = $db1->query($q)->result_array();
   $data['questions']= $qq;
   $db1 = $this->load->database('hachu', TRUE);
   foreach ($qq as $key) {
    $q= "SELECT * FROM `c_".$key['id']."`";
    $q = $db1->query($q)->result_array();
    $comments[$key['id']] = $q;
   }
   $data['comments'] = $comments;
   $data['category'] = $default;
   if($default=="none") $data['category'] = "All";

   $this->load->view('category',$data);
 }

 function comment (){
  $id = $_POST['id'];
  $name = $_POST['whodid'];
  $content = $_POST['content'];
  $db1 = $this->load->database('hachu',TRUE);
  $table= "c_".$id;
  $q= "INSERT into ".$table." (`comment`,`whodid`) values('".$content."','".$name."')";
  $db1->query($q);
 }
}
