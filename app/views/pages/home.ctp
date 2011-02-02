<?php 
/*if(!empty($_Auth['User']['id']))
{ 
    header('location:'.Router::url('/',true).'beta');
    exit;
}*/

?>
<?php echo $this->element('logo'); ?> 
<br>	
<?php echo $this->element('manual-login');?>
<div style="margin-top:60px;margin-left:105px;"><?php echo $this->element('fblike'); ?> </div>
<?php echo $this->element('howitworks'); ?>

