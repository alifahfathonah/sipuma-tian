<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function compress()
{
	$CI =& get_instance();
	$buffer = $CI->output->get_output();
 
	 $search = array(
	    '/\>[^\S ]+/s', //strip whitespaces after tags, except space
		'/[^\S ]+\</s', //strip whitespaces before tags, except space
		'/(\s)+/s', // shorten multiple whitespace sequences
		'/&lt;!--(.|\s)*?--&gt;/' //strip HTML comments
	 );


	 $replace = array(
		'>',
		'<',
		'\\1',
		''
	);
 
	$buffer = preg_replace($search, $replace, $buffer);
 
	$CI->output->set_output($buffer);
	$CI->output->_display();
}
 
/* End of file compress.php */
/* Location: ./system/application/hooks/compress.php */