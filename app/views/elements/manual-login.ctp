<div class="sidebar5" style="display:block">
	<?php 
	echo $javascript->link('toggle.js');
	if ($session->check('Message.flash')): ?>
	
	<div class="bodyred" style="margin-bottom:10px;"><?php $session->flash();?></div><?php endif; ?> 
	<div class="sidebar7">
<span class="bodyblue"><i>Sign up and we'll let you know when we're ready!</i></span>
	</div>

	<?php
	echo $form->create('Users', array('url'=>array('controller'=>'users', 'action'=>'register')));
	echo $form->input('email',  array('placeholder' => 'Enter Your Email', 'type' => 'text', 'id'=>'largeinput', 'label'=>false));
	?>
	
	<div id="submit_button">
	
<?
	echo $form->submit('Sign Up!', array('name'=>'submit', 'class'=>'button_green'));
	echo $form->end();
?>
</div> <div class="bodyblue" style="margin-left:310px;margin-top:-5px;"><b><i><?php echo $html->link("How It Works", "#", array('onClick'=>'toggle(\'learn\');')); ?></i></b></div> </div>         

