<?php
function include_part($path = null)
{
	$CI =& get_instance();
	if($path)
	{
		if(is_array($path))
		{
			for($i=0; $i < count($path); $i++) {
				$CI->load->view($path[$i]);
			}
		} else {
			$CI->load->view($path);
		}
	}
}