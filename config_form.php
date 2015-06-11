<?php
$page = get_option('pb_page_url');
$text = get_option('pb_banner_text');
$btn_text = get_option('pb_banner_button_text');
$btn_url = get_option('pb_banner_button_url');
$cookie = get_option('pb_cookie');
if($text == '')
	$text = 'Default';
?>
<div class="field">
    <?php echo get_view()->formLabel('pb_page_url', 'Page on which to display the banner', array('class'=>'two columns alpha', 'placeholder'=>'Click here')); ?>
    <div class="inputs five columns">
        <?php echo get_view()->formText('pb_page_url', $page, array('class' => 'textinput')); ?>
        <p class="explanation">
            Default is /search. Use /solr-search for Solr Search.
        </p>
    </div>
</div>
<div class="field">
    <?php echo get_view()->formLabel('pb_banner_text', 'Show the banner in public view?', array('class'=>'two columns alpha')); ?>
    <div class="inputs five columns omega">
        <?php echo get_view()->formCheckbox('pb_show_public', true, 
        array('checked'=>(boolean)get_option('pb_show_public'))); ?>
        <p class="explanation"><?php echo __('If checked, the banner will be shown before the content of the public search page.'); ?></p>
    </div>
</div>
<div class="field">
    <?php echo get_view()->formLabel('pb_banner_text', 'Banner text', array('class'=>'two columns alpha')); ?>
    <div class="inputs five columns">
        <?php echo get_view()->formTextarea('pb_banner_text', $text, array('class'=>'textinput', 'rows'=>4)); ?>
    </div>
</div>
<div class="field">
    <?php echo get_view()->formLabel('pb_banner_button_text', 'Button Text (if any)', array('class'=>'two columns alpha', 'placeholder'=>'Click here')); ?>
    <div class="inputs five columns">
        <?php echo get_view()->formText('pb_banner_button_text', $btn_text, array('class' => 'textinput')); ?>
        <p class="explanation">
            The text of the main button. No button if left empty.
        </p>
    </div>
</div>
<div class="field">
    <?php echo get_view()->formLabel('pb_banner_button_url', 'Button URL (if any)', array('class'=>'two columns alpha', 'placeholder'=>'http://')); ?>
    <div class="inputs five columns">
        <?php echo get_view()->formText('pb_banner_button_url', $btn_url, array('class' => 'textinput')); ?>
        <p class="explanation">
            The destination of the main button.
        </p>
    </div>
</div>
<div class="field">
    <?php echo get_view()->formLabel('pb_cookie', 'Cookie name', array('class'=>'two columns alpha')); ?>
    <div class="inputs five columns">
        <?php echo get_view()->formText('pb_cookie', $cookie, array('class' => 'textinput')); ?>
        <p class="explanation">
            Has to be changed for next banner. Expires in 5 days.
        </p>
    </div>
</div>