       <div id="beta" class="section-1" style="margin-top:30px;">
           <div id="contents">
			<?php //echo $this->element('login');?>
<br><br>	
<div class="bodycopy" style="margin-left:-40px;"><?php echo $html->link($html->image("blank.png", array('alt'=>'', 'width'=>'40', 'height'=>'10', 'border'=>'0')), array('controller'=>'users', 'action'=>'logout'), array('escape'=>false));?>	

Thank you for signing up!  We'll let you know when we're ready for you.  
<br>
<?php echo $html->image("blank.png", array('alt'=>'', 'width'=>'40', 'height'=>'10', 'border'=>'0'));?>	

Spread the word and get access faster!<br><br></div>
<div style="margin-left:-120px;"><?php echo $this->element('sharetweet');?>              			
</div>
<div style="margin-top:-19px;margin-left:120px;">   <?php echo $this->element('sharefb');?>           			
</div>
<?php //echo $this->element('twitter');?>
<br><br><br>
<div id="twitter_button" style="margin-left:-290px;"><? echo $html->link($html->image("twitter_follow.gif", array('alt'=>'Follow Us On Twitter', 'width'=>'162', 'height'=>'35', 'border'=>'0')), 'http://twitter.com/getsmorgi', array('target'=>'_blank', 'escape'=>false)); ?></div>

				
</div>


		</div>		