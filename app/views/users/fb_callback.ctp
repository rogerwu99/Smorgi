<div id="beta" class="section-2">

		  <div class="content1">
                        <div class="floatleft"><h1>Facebook Login</h1></div><br /><br />
			<div class="bodycopy">Enter your Email Address to continue:</div>
                  </div>

 <?php //echo $form->create(null, array('url' => array('controller' => 'twitter', 'action' => 'verifyEmailAddress'))); ?>
 <?php echo $form->create(null, array('url' => array('controller' => 'users', 'action' => 'verifyEmailAddress'))); ?>
	<?php echo $form->hidden('oauth', array('value'=>'facebook', 'action'=>'hidden')); ?>		
			
<?php echo $form->input('Email', array('error' => array('required' => 'Email is required'), 'label' => false, 'class' => 'smallercopy' )); ?>
				<?php echo $form->submit('GO!', array('name'=>'shorten', 'div'=>'rightbutton'));
	?>		
	
	
	<div class="clear"></div>
</div>
