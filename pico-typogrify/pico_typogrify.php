<?php

/**
 * Typogrify for Pico
 *
 * @author Mike Rockwood
 * @link http://mikerockwood.com
 * @license http://opensource.org/licenses/MIT
 */

class Pico_Typogrify {
	
	public $config = array();
	
	public function __construct()
	{		
		// default settings
		$this->config = array(			
			'amp' => true,
			'widont' => true,
			'SmartyPants' => true,
			'caps' => true,
			'initial_quotes' => true,
			'do_guillemets' => false,
			'dash' => true
		);
	}
	
	public function config_loaded(&$settings)
	{		
		// overwrite default settings if any appear in site config
		if (isset($settings['typogrify_amp']))
			$this->config['amp'] = $settings['typogrify_amp'];
		if (isset($settings['typogrify_widont']))
			$this->config['widont'] = $settings['typogrify_widont'];
		if (isset($settings['typogrify_SmartyPants']))
			$this->config['SmartyPants'] = $settings['typogrify_SmartyPants'];
		if (isset($settings['typogrify_caps']))
			$this->config['caps'] = $settings['typogrify_caps'];
		if (isset($settings['typogrify_initial_quotes']))
			$this->config['initial_quotes'] = $settings['typogrify_initial_quotes'];
		if (isset($settings['typogrify_do_guillemets']))
			$this->config['do_guillemets'] = $settings['typogrify_do_guillemets'];
		if (isset($settings['typogrify_dash']))
			$this->config['dash'] = $settings['typogrify_dash'];
	}

	public function before_render(&$twig_vars, &$twig)
	{
		require_once "php-typogrify.php";
		
		// where the magic happens
		$typogrify = new Twig_SimpleFilter('typogrify', function ($string) {
			if ($this->config['amp']) {
				$string = amp($string);
			}
			if ($this->config['widont']) {
				$string = widont($string);
			}
			if ($this->config['SmartyPants']) {
				$string = SmartyPants($string);
			}
			if ($this->config['caps']) {
				$string = caps($string);
			}
			if ($this->config['initial_quotes']) {
				$string = initial_quotes($string, $do_guillemets = $this->config['do_guillemets']);
			}
			if ($this->config['dash']) {
				$string = dash($string);
			}
			
			return $string;
		});	
		
		// add twig filter
		$twig->addFilter($typogrify);
	}

}

?>