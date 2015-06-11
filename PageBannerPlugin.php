<?php
/**
 * Page Banner plugin
 *
 * @copyright Ruud de Jong for the Meertens Institute / University of Twente
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */
 
 

define('PB_PLUGIN_DIR', dirname(__FILE__));
define('PB_PAGE_PATH', 'pb/');

class PageBannerPlugin extends Omeka_Plugin_AbstractPlugin
{
	
    protected $_hooks = array(
	    'admin_plugin_uninstall_message',
	    'define_acl',
		'config_form', 
		'config',
        'public_content_top'
	);

    protected $_filters = array();
		
	/**
     * @var array Options and their default values.
     */
    protected $_options = array(
		'pb_page_url' => '/search',
        'pb_show_public' => true,
		'pb_banner_text' => 'Help mee deze pagina te verbeteren. Geef uw mening over deze pagina met 10 vragen.',
		'pb_banner_button_text' => 'Help mee',
		'pb_banner_button_url' => '',
		'pb_cookie' => 'pb_clicked'
	);

	
	
    public function hookAdminPluginUninstallMessage()
    {
        echo '<p><strong>Warning</strong>: Uninstalling the Page Banner plugin
            will remove the Page Banner.</p>';
    }

	/**
	 * Define the acces to controllers and actions
	 */
	public function hookDefineAcl($args)
	{
		$acl = $args['acl'];
			
	    $indexResource = new Zend_Acl_Resource('PageBanner_Index');
        $acl->add($indexResource);
    
        $acl->allow(null, 'PageBanner_Index');

	}
    


	

	
    /**
     * Display the plugin config form.
     */
    public function hookConfigForm()
    {
        require 'config_form.php';
    }

    /**
     * Set the options from the config form input.
     */
    public function hookConfig($args)
    {
        $post = $args['post'];
    	set_option('pb_page_url', $post['pb_page_url']);
    	set_option('pb_show_public', (int)(boolean)$post['pb_show_public']);
    	set_option('pb_banner_text', $post['pb_banner_text']);
    	set_option('pb_banner_button_text', $post['pb_banner_button_text']);
    	set_option('pb_banner_button_url', $post['pb_banner_button_url']);
    	set_option('pb_cookie', $post['pb_cookie']);
    }

	/**
	 * Display the banner if on search page and banner is activated
	 */
	public function hookPublicContentTop($args){
		
		if (current_url() == get_option('pb_page_url') && (boolean)get_option('pb_show_public')){
			
			if(!isset($_COOKIE[get_option('pb_cookie')]) || $_COOKIE[get_option('pb_cookie')] == false){
				include('views/public/index/index.php');
			}
			
		}
    }

	
}




?>