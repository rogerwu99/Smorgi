<?php 
/*if(!empty($_Auth['User']['id']))
{ 
    header('location:'.Router::url('/',true).'beta');
    exit;
}*/

?>
<div id="beta">
       <div id="contents">
<?php echo $this->element('logo'); ?> 
				
<div class="bodycopy" style="margin-left:-40px;"><?php echo $html->link($html->image("blank.png", array('alt'=>'', 'width'=>'40', 'height'=>'10', 'border'=>'0')), array('controller'=>'users', 'action'=>'logout'), array('escape'=>false));?>	

Thank you for signing up!  We'll let you know when we're ready for you.  
<br>
<?php echo $html->image("blank.png", array('alt'=>'', 'width'=>'40', 'height'=>'10', 'border'=>'0'));?>	

Spread the word and get access faster!<br><br></div>
<div style="margin-left:-200px;"><?php echo $this->element('sharetweet');?>              			
</div>
<div style="margin-top:-19px;margin-left:-50px;">   <?php echo $this->element('sharefb');?>           			
</div>
<div style="margin-left:100px;margin-top:-20px"><? echo $html->link($html->image("button-twitter.png", array('alt'=>'Follow Us On Twitter', 'width'=>'35', 'height'=>'35', 'border'=>'0')), 'http://twitter.com/getsmorgi', array('target'=>'_blank', 'escape'=>false)); ?></div>
	<div style="margin-left:175px;margin-top:-35px"><? echo $html->link($html->image("button-facebook.png", array('alt'=>'Follow Us On Twitter', 'width'=>'35', 'height'=>'35', 'border'=>'0')), 'http://www.facebook.com/pages/Smorgi/190013394356874', array('target'=>'_blank', 'escape'=>false)); ?></div>
				
				
				
				<br>	
<div style="margin-top:-20px;margin-left:115px;"><?php echo $this->element('fblike'); ?> </div>
<?php echo $this->element('howitworks'); ?>

</div>
</div>