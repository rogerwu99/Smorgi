<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>Smorgi (Alpha)</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"></META>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" ></link>

	<?php echo $scripts_for_layout ?>
	<?php //echo $html->css('main'); ?>
	<?php //echo $html->css('menu'); ?>
	<?php
		/*$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))):

//header('Location: http://detectmobilebrowser.com/mobile'); 
echo $html->css('style-log-mobile'); 
else:
	
	
	
	echo $html->css('style-log'); 
endif;	*/
?>
<?php echo $html->css('supersized'); ?>
<?php echo $html->css('type'); ?>
<?php echo $html->css('style-log'); ?>

<?php echo $javascript->link('https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js'); ?>
<?php echo $javascript->link('supersized.3.0.core.js'); ?>
        <script type="text/javascript">  
		$(function(){
			$.fn.supersized.options = {  
				startwidth: 4,  
				startheight: 3,
				vertical_center: 1,
				slides : [
					{image : 'img/Times_Square_1_bg.jpg' }
				]
			};
	        $('#supersized').supersized(); 
	    });
	</script>
	
	


	
	
		<!--[if lt IE 8]>
<p>We do not support your current web browser.  Please upgrade to the latest <a href="http://www.microsoft.com/windows/Internet-explorer/default.aspx">Internet Explorer.</a></p>
<![endif]-->
	

	<!--[if IE 6]>
	  <?php echo $html->css('ie6'); ?>
	<![endif]-->
	<!--[if IE 7]>
	  <?php echo $html->css('ie7'); ?>
	<![endif]-->
	<!--[if IE 8]>
	  <?php //echo $html->css('ie7'); ?>
	<![endif]-->
</head>
<body>
	
  
<div id="content-wrapper">
	
	<div id="contentwrapper">
		<?php echo $content_for_layout; ?>
				
		</div>
	</div>	
	  	<div id="supersized"></div>
	
	
	
	
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-1271462-7");
		pageTracker._trackPageview();
	</script>

        <?php //echo $javascript->link('MM_Swap.js'); ?>
        <?php //echo $javascript->link('jquery-1.2.6.min.js'); ?>
        <?php //echo $javascript->link('form.js'); ?>
        <?php //echo $javascript->link('hint.js'); ?>
        <?php //echo $javascript->link('ready.js'); ?>
        <?php //echo $javascript->link('corner.js'); ?>
        <?php //echo $javascript->link('jquery.selectbox.js'); ?>
        <?php //echo $javascript->link('tiny_mce/tiny_mce.js'); ?>
        <script type="text/javascript">
        /*$(document).ready(function()
        {
          //hide the all of the element with class msg_body
          $(".msg_body").hide();
          //toggle the componenet with class msg_body
          $(".msg_head").click(function()
          {
            $(this).next(".msg_body").slideToggle(100);
          });
        });*/
        </script>

</body>
</html>
