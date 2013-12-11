
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Teacher extends CI_Controller {

 function __construct()
 {
   parent::__construct();
        $this->load->helper(array('form', 'url'));
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['status']="login";
     $this->load->view('teacher', $data);
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

}

?>

