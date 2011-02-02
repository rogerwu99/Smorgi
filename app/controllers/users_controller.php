<?php
App::import('Vendor', 'oauth', array('file' => 'OAuth'.DS.'oauth_consumer.php'));
App::import('Vendor', 'facebook');
App::import('Sanitize');
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form','Session');
	var $components = array('Auth', 'Recaptcha', 'Email');
	var $uses = array('User', 'Mail');
	var $facebook;
	var $twitter_id;
	//var $root_url = "http://localhost:8888";
	var $root_url = "http://www.smorgi.com";

	function logout()
	{
		$user=$this->Auth->getUserInfo();
//		$avail=$this->Available->findByUserId((int)$user['id']);
		//var_dump($this->Available->findByUserId((int)$user['id']));
//var_dump($this->Available->findByUserId(50));
	//	$this->Available->read(null, $avail['Available']['id']);
	//	$this->Available->set('available' , false);
	//	$this->Available->save();
			
//		$root_url = "http://localhost:8888";
	$root_url = "http://www.smorgi.com";
		$facebook = $this->createFacebook();
		$session=$facebook->getSession();
		$url = $facebook->getLogoutUrl(array('req_perms' => 'email,user_birthday,user_about_me,user_location,publish_stream','next' => $root_url));

		$this->Session->destroy();
		
// when i logout with twitter only, i get redirected to facebook?

		if(!empty($session)){
			$facebook->setSession(null);
			$this->Auth->logout($url);
		}
		else {
		    $this->Auth->logout();
		}
	}

	function login()
    {
		$this->layout = 'about';
	}
	
	function getRequestURL(){
	 $root_url = "http://localhost:8888";
//$root_url = "http://www.smorgi.com";
		$consumer=$this->createConsumer();
		$requestToken = $consumer->getRequestToken('http://twitter.com/oauth/request_token', $root_url.'/users/twitterCallback');
  		$this->Session->write('twitter_request_token', $requestToken);
		$this->redirect('http://twitter.com/oauth/authenticate?oauth_token='.$requestToken->key);
		exit();
	}
	
	function twitterCallback() {
		$requestToken = $this->Session->read('twitter_request_token');
		$consumer = $this->createConsumer();
		$accessToken = $consumer->getAccessToken('http://twitter.com/oauth/access_token', $requestToken);
		$this->Session->write('twitter_access_token',$accessToken);
		
		
		
		
		
		$db_results = $this->User->find('first', array('conditions' => (array('User.tw_access_key'=>$accessToken->key)), 'fields'=>(array('User.username', 'User.password'))));
		if (!empty($db_results)) {
			$user_record_1=array();
			$user_record_1['Auth']['username']=$db_results['User']['username'];
			$user_record_1['Auth']['password']=$db_results['User']['password'];
			$this->Auth->authenticate_from_oauth($user_record_1['Auth']);
			$this->redirect('/');
		}
		//$this->layout = 'about';
		
  	}
	public function register(){
		$this->data = Sanitize::clean($this->data, array('encode' => false));

		$email = $this->data['Users']['email'];
		$this->data=array();
		$this->User->create();
		$this->data['User']['email'] = (string) $email;
		//$password = $this->data['User']['password']= $this->__randomString();
		$username = $this->data['User']['username']= (string) $email;
		
		$this->User->set($this->data);
		if ($this->User->validates()){
			$this->User->save();
			//$user_record_1=array();
			//$user_record_1['Auth']['username']=$username;
			//$user_record_1['Auth']['password']=$password;
			//$joe = $username;
//			$this->Auth->authenticate_from_oauth($user_record_1['Auth']);
			$this->redirect(array('controller'=>'mail', 'action'=>'send_welcome_message', $email, $username));//$this->data['User']['name']));
		}
		else {
			$errors = $this->User->invalidFields(); // contains validationErrors array
			
			$this->Session->setFlash($errors['email'],'default');
			$this->redirect('/');
		}
	
	}
	public function corpReg(){
		/*$email = $this->data['Corp']['email'];
		$company = $this->data['Corp']['email'];
		$corpURL = $this->data['Corp']['email'];
		$phone = $this->data['Corp']['email'];
		$address1 = $this->data['Corp']['email'];
		$city = $this->data['Corp']['email'];
		$state = $this->data['Corp']['email'];
		$zip = $this->data['Corp']['email'];
		$country = $this->data['Corp']['email'];
		
		$this->data=array();
		$this->User->create();
		
		$this->Corp->create();
		
		$this->data['User']['email'] = (string) $email;
		$password = $this->data['User']['password']= $this->__randomString();
		$username = $this->data['User']['username']= (string) $email;
		
		$this->User->save($this->data);
		
		$user_record_1=array();
		$user_record_1['Auth']['username']=$username;
		$user_record_1['Auth']['password']=$password;
		$joe = $username;
		$this->Auth->authenticate_from_oauth($user_record_1['Auth']);
		$this->redirect(array('controller'=>'mail', 'action'=>'send_welcome_message', $email, $joe));//$this->data['User']['name']));
		$this->redirect('/');
	*/
	}
	
	
	
	public function verifyEmailAddress(){
		$type = $this->data['User']['oauth'];
		$email_address = $this->data['User']['Email'];
		$this->data = array();
		$this->User->create();
		$username='';
		$password='';
		$update = true;
		$db_results = $this->User->find('first', array('conditions' => (array('User.email'=>$email_address))));
		
		// i already have an account - i'm just updating the data with the 2nd social network
		if (!empty($db_results)) {
				$updated_id = $db_results['User']['id'];
				$this->User->read(null,$updated_id);
				switch ($type){
					case 'twitter':
		
						$accessToken=$this->Session->read('twitter_access_token');
						$consumer = $this->createConsumer();
						$content=$consumer->get($accessToken->key,$accessToken->secret,'http://twitter.com/account/verify_credentials.xml', array());
						$user = simplexml_load_string($content);
						$this->data['User']['twitter_handle'] = (string) $user->screen_name;
						$this->data['User']['tw_user_url'] = (string) $user->url;
						$this->data['User']['tw_uid'] = (int) $user->id;
						$this->data['User']['tw_pic_url'] = (string) $user->profile_image_url;
						$this->data['User']['tw_location'] =  (string) $user->location;
						$this->data['User']['tw_access_key'] =  $accessToken->key;
						$this->data['User']['tw_access_secret'] =  $accessToken->secret;
	
						break;
		
					case 'facebook':
						$facebook = $this->createFacebook();
						$session=$facebook->getSession();
						if(!empty($session)){
							try{
								$user=json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$session['access_token']));
							}
							catch(FacebookApiException $e){
								error_log($e);
							}
							$this->data['User']['fb_uid'] = (int) $user->id;
							$this->data['User']['fb_pic_url'] = 'http://graph.facebook.com/'.$user->id.'/picture';
							$this->data['User']['fb_location'] = '';
							$this->data['User']['fb_access_key'] = $session['access_token'];

							
					}
					break;
				}
				$username = $db_results['User']['username'];
				$password = $db_results['User']['password'];

				
		}
		// new account
		else {
			
			$update = false;
			
			switch ($type){
				case 'twitter':
		
					$accessToken=$this->Session->read('twitter_access_token');
					$consumer = $this->createConsumer();
					$content=$consumer->get($accessToken->key,$accessToken->secret,'http://twitter.com/account/verify_credentials.xml', array());
					$user = simplexml_load_string($content);
					$this->data['User']['type'] = 'twitter';
					$this->data['User']['name'] = (string) $user->name;
					$this->data['User']['email'] = (string) $email_address;
					$this->data['User']['twitter_handle'] = (string) $user->screen_name;
					$this->data['User']['tw_user_url'] = (string) $user->url;
					$this->data['User']['tw_uid'] = (int) $user->id;
					$this->data['User']['tw_pic_url'] = (string) $user->profile_image_url;
					$this->data['User']['tw_location'] =  (string) $user->location;
					$this->data['User']['tw_access_key'] =  $accessToken->key;
					$this->data['User']['tw_access_secret'] =  $accessToken->secret;
	
						
				break;
		
				case 'facebook':
					$facebook = $this->createFacebook();
					$session=$facebook->getSession();
					if(!empty($session)){
						try{
							$user=json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$session['access_token']));
						}
						catch(FacebookApiException $e){
							error_log($e);
						}
						$this->data['User']['type'] = 'facebook';
						$this->data['User']['name'] = (string) $user->name;
						$this->data['User']['email'] = (string) $email_address;
						$this->data['User']['fb_uid'] = (int) $user->id;
						$this->data['User']['fb_pic_url'] = 'http://graph.facebook.com/'.$user->id.'/picture';
						$this->data['User']['fb_location'] = '';
						$this->data['User']['fb_access_key'] = $session['access_token'];
					}
					break;
				}
				$password = $this->data['User']['password']= $this->__randomString();
				$username = $this->data['User']['username']= (string) $email_address;
			
			}
			$this->User->save($this->data);
			$id = $this->User->id;
		//	echo $id;
		//	$update_available = $this->Available->find('first', array('conditions' => (array('Available.user_id'=>$id))));
	/*		if (!empty($update_available)){
					$this->Available->create();
			}
			else {
				$this->Available->read(null, $update_available['Available']['id']);
			}
			$this->Available->set(array(
											'user_id' => $id,
											'available' => true
											));
			$this->Available->save();
		*/	
			$user_record_1=array();
			$user_record_1['Auth']['username']=$username;
			$user_record_1['Auth']['password']=$password;
			$joe = $username;
			$this->Auth->authenticate_from_oauth($user_record_1['Auth']);
	
			if ($update){
				//$this->redirect(array('controller'=>'mail', 'action'=>'send_new_registrant', $email_address, $joe));//$this->data['User']['name']));
				$this->redirect('/');//$this->data['User']['name']));
			}
			else {
				$this->redirect(array('controller'=>'mail', 'action'=>'send_welcome_message', $email_address, $joe));
			}
		}
	private  function __randomString($minlength = 20, $maxlength = 20, $useupper = true, $usespecial = false, $usenumbers = true){
        $charset = "abcdefghijklmnopqrstuvwxyz";
        if ($useupper) $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($usenumbers) $charset .= "0123456789";
        if ($usespecial) $charset .= "~@#$%^*()_+-={}|][";
        if ($minlength > $maxlength) $length = mt_rand ($maxlength, $minlength);
        else $length = mt_rand ($minlength, $maxlength);
        $key = '';
        for ($i=0; $i<$length; $i++){
            $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];
        }
        return $key;
    }

	private function createConsumer() {
        return new OAuth_Consumer('4SGxL3rtEiaoXMJUxNdSfA', 'rVLFvx7kh9RhsK8bwX6ppBM9oWA6de1I8u2aX0JQfg');
    }
	private function createFacebook(){
		return new Facebook(array(
			'appId'=>'181441235223251',
			'secret'=>'9bbd8d2859cbe7b39fd46d769c9024da',
			'cookie'=>true
		));
	}
	public function facebookLogin(){
		$facebook = $this->createFacebook();
		$session=$facebook->getSession();
//		$root_url = 'http://localhost:8888';
	$root_url = "http://www.smorgi.com";
	$full_url = $root_url . '/users/fbCallback';
		$login_url = $facebook->getLoginUrl(array('req_perms' => 'email,user_birthday,user_about_me,user_location,publish_stream','next' => $full_url));
		if(!empty($session)){
			$this->Session->write('fb_acces_token',$session['access_token']);
			$facebook_id = $facebook->getUser();
	
			$db_results = $this->User->find('first', array('conditions' => (array('User.fb_uid'=>$facebook_id)), 'fields'=>(array('User.username','User.password'))));

			if (!empty($db_results)) {
				//echo 'results not empty';
				$user_record_1=array();
				$user_record_1['Auth']['username']=$db_results['User']['username'];
				$user_record_1['Auth']['password']=$db_results['User']['password'];
				$this->Auth->authenticate_from_oauth($user_record_1['Auth']);
				$this->redirect('/');
			}
			else{
			echo 'empty';
		//	var_dump($session);
				$this->redirect($login_url);
			}
	
		}
		else{
			//echo ' in here';
		//	var_dump($session);
			$this->redirect($login_url);
		}
	}
	
	public function fbCallback(){
		$facebook = $this->createFacebook();
		$session=$facebook->getSession();
			$facebook_id = $facebook->getUser();
	
			$db_results = $this->User->find('first', array('conditions' => (array('User.fb_uid'=>$facebook_id)), 'fields'=>(array('User.username','User.password'))));

			if (!empty($db_results)) {
				//echo 'results not empty';
				$user_record_1=array();
				$user_record_1['Auth']['username']=$db_results['User']['username'];
				$user_record_1['Auth']['password']=$db_results['User']['password'];
				$this->Auth->authenticate_from_oauth($user_record_1['Auth']);
				$this->redirect('/');
			}
		$this->layout = 'page';
	}
	function get_friends(){
		$user_id=array();
		$facebook = $this->createFacebook();
		$session=$facebook->getSession();
		if(!empty($session)){
			try{
				

				$user=json_decode(file_get_contents('https://graph.facebook.com/me/friends?access_token='.$session['access_token']),true);
				
				foreach ($user['data'] as $friend){
					$user_id[]=$friend;
				}
			}
			catch(FacebookApiException $e){
				echo 'error';
				error_log($e);
			}	
		}
		return $user_id;
	}
	function get_followers($id=null){
		$user_id = array();
		$accessToken=$this->Session->read('twitter_access_token');
		$consumer = $this->createConsumer();
		if (!$id) {
			$content = $consumer->get($accessToken->key,$accessToken->secret,'http://twitter.com/account/verify_credentials.xml', array());
			$user = simplexml_load_string($content);
			$id=$user->id;
		}
		
		$content1 = $consumer->get($accessToken->key,$accessToken->secret,'http://api.twitter.com/1/followers/ids.json?user_id='.$id, array());
		$user1 = json_decode($content1);
		$x=0;
		foreach ($user1 as $follower){
			$user_id[]=$follower;
			//echo $follower.' ';
			$content2 = $consumer->get($accessToken->key,$accessToken->secret, 'http://api.twitter.com/1/users/show/'.$follower.'.json',array());
			$user2=json_decode($content2);
			//echo $user2['user']['screen_name'].' '.$user2['user']['profile_image_url'];
			$x++;
			if ($x>20) break;
		}
		return $user_id;
	}
}
?>
