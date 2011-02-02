<?php if(!empty($_Auth['User'])): ?>
	<div class="sidebar5" id="logged_in">
	<div style="padding-top:20px;"class="bodycopy">
			<?php //echo $html->link('Location', array('controller'=>'beta','action'=>'view_my_location')); ?> <!-- | -->
			<?php //echo $html->link('Profile', array('controller'=>'beta','action'=>'view_my_profile')); ?><!-- | -->
			<?php echo $html->link('Thanks for signing up', array('controller'=>'users', 'action'=>'logout')); ?>
	
			<?php
/*				if(!empty($_Auth['User']['name'])):
					echo $_Auth['User']['name'];
				else:
					echo $_Auth['User']['username'];
				endif;
				
				if ($_Auth['User']['fb_pic_url']==''):  
					echo $html->image($_Auth['User']['tw_pic_url'], array('alt' => 'Pic', 'width' => 50, 'height' => 50, 'class' => 'top'));
	        	else: 
					echo $html->image($_Auth['User']['fb_pic_url'], array('alt' => 'Pic', 'width' => 50, 'height' => 50, 'class' => 'top'));
				endif; 
	*/		?>
	</div>
	</div>
<?php 
 else:
?>		
<!--<div class="sidebarcontainer" style="display:block">
<table><tr><td class="bodyblue">or &nbsp;&nbsp;&nbsp;&nbsp;</td><td>-->
		<?php
//echo $html->link($html->image("signin_facebook.gif", array('alt'=>'Login With FB', 'width'=>'150', 'height'=>'22', 'border'=>'0')),array('controller'=>'users', 'action'=>'facebookLogin'), array('escape'=>false));	
?>
<!--</td></tr>
<tr><td></td><td>
-->	<?php
//echo $html->image("blank.png", array('alt'=>'', 'width'=>'150', 'height'=>'10', 'border'=>'0'));	
?>
<!--</td></tr>
<tr><td></td><td>
-->
<?php	//	echo $html->link($html->image("signin_twitter.gif", array('alt'=>'Login With Twitter', 'width'=>'150', 'height'=>'22', 'border'=>'0')),array('controller'=>'users', 'action'=>'getRequestURL'),array('escape'=>false));

?>
<!--</td></tr></table>
                 </div>
	-->
<?php //endif; ?>
