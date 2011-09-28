<?php defined('SYSPATH') or die('No direct script access.');

class Response extends Kohana_Response {


	public function ob_end_clean_all()
	{
		$s = "";
		do
		{
			$s = ob_get_contents() . $s;
		} while(@ob_end_clean());
		return $s;
}



	public function write_content($text) {
		ignore_user_abort(TRUE);
		
		$text = $this->ob_end_clean_all() .$text;
		
		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) AND strpos( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
		{
			//echo $_SERVER['HTTP_ACCEPT_ENCODING'];
	
			$compressed = gzencode ($text, 5);
			//print $compressed;
			header('Content-Encoding: gzip');
			header('Content-Length: ' . strlen($compressed));
			echo $compressed.gzencode(str_repeat(' ', 10));
		}
		elseif (isset($_SERVER['HTTP_ACCEPT_ENCODING']) AND strpos( $_SERVER['HTTP_ACCEPT_ENCODING'], 'deflate') !== FALSE)
		{
			$compressed = gzdeflate($text, 5);
			header('Content-Encoding: deflate');
			header('Content-Length: ' . strlen($compressed));
			echo $compressed.gzdeflate(str_repeat(' ', 10));
		}
		else
		{
			header('Content-Length: ' . strlen($text));
			echo $text . 'none';
			echo str_repeat(" ", 10);
		}
	
		
	
		flush();

	}


	public function body($content = NULL)
	{
		
		if ($content === NULL) {
			$this->write_content($this->_body);
		}
		
		$this->_body = (string) $content;
		return $this;
	}



}