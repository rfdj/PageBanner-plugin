<?php

$text = get_option('pb_banner_text');
$button_text = get_option('pb_banner_button_text');
$button_url = get_option('pb_banner_button_url');

?>
<style>
#pb-wrapper{
	display: none;
	padding: 5px 15px !important;
	background-color: #f7fdfd !important;
	border-color: cadetblue !important;
	-webkit-box-shadow: gray 2px 2px 6px !important;
	-moz-box-shadow: gray 2px 2px 6px !important;
	box-shadow: gray 2px 2px 6px !important;
	font-size: 15px;
	font-weight: bold;
}
.pb-banner-button {
	display: inline-block;
	margin: 5px 20px;
	padding: 6px 14px;
	cursor: pointer;
	background-color: cadetblue;
	color: #fff !important;
	font-size: 14px;
	font-weight: bold;
	text-decoration: none;
	text-shadow:0px 1px 0px #3d768a;
}
.pb-banner-button:hover {
	background-color:#408c99;
}
.pb-banner-button:active {
	position:relative;
	top:1px;
}

</style>
<script type="text/javascript">
// <![CDATA[



jQuery(function(){

	jQuery('#pb-wrapper').delay(1000).slideDown();
	
	jQuery('.pb-banner-button').click(function(){
	
		jQuery('#pb-wrapper').slideUp();
		
		var today = new Date();
		var expireDate = new Date(today);
		expireDate.setDate(today.getDate() + 365); // 365 days
		
		// sets the cookie to 0
		document.cookie = 'pb_clicked=1; expires=' + expireDate.toGMTString() + '; path=/';
	});
});


// ]]>
</script>

<div id="pb-wrapper"><?php echo $text;?>
<?php if(!empty($button_text)): ?>
	<a href="<?php echo $button_url; ?>" class="pb-banner-button" target="_blank"><?php echo $button_text;?></a>
<?php endif; ?>
</div>