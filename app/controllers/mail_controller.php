<?php 
class MailController extends AppController 
{
    var $name = 'Mail';
    var $uses = array('User');//, 'Error', 'ErrorCode', 'Alert');
    var $components = array('Email');
    
    function send_new_registrant($email, $name) 
    {
        $this->Email->to = 'rogerwu99@yahoo.com';
        $this->Email->subject = 'NEW REGISTRANT';
        $this->Email->replyTo = 'robot@smorgi.com';
        $this->Email->from = 'ROBOT <robot@smorgi.com>';
        $this->Email->template = 'new_registrant';
        $this->set('email', $email);
        $this->set('name', $name); 
	
		 $this->Email->send();
		//exit;	
    } 
	function send_welcome_message($email, $name)
	{
		$this->Email->to = $email;
        $this->Email->subject = 'Welcome to Smorgi';
        $this->Email->replyTo = 'contact@smorgi.com';
        $this->Email->from = 'Smorgi <rogerwu99@smorgi.com>';
        $this->Email->template = 'welcome';
        $this->set('email', $email);
        $this->set('name', $name); 
		
		$this->Email->send();
		
		$this->send_new_registrant($email,$name);
		$this->redirect('/pages/thankyou');
	
		
		
		
	//	return;
	//exit;
	}
}
?>