<?php
class template
{
	private $title;
	private $css = array();
	private $script = array();
	
	public function setTitle($string)
	{
		$this->title = $string;
	}
	
	public function getTitle()
	{
		return ($this->title) ? $this->title : false;
	}
	
	public function addScript($script)
	{
		if(is_array($script))
			$this->script = array_merge($this->script, $script);
		else
			$this->script[] = $script;
	}
	
	public function getScript()
	{
		return $this->script;
	}
	
	public function addCSS($css)
	{
		if(is_array($css))
			$this->css = array_merge($this->css, $css);
		else
			$this->css[] = $css;
	}
	
	public function getCSS()
	{
		return $this->css;
	}
}
?>