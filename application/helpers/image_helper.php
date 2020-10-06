<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function image($image_url = null)
{
	$result = base_url($image_url);

	if($image_url == null)
	{
		$result = base_url('assets/images/no-image.jpg');
	}

	if(!file_exists($image_url)){
		$result = base_url('assets/images/no-image.jpg');
	}

	if(!is_file($image_url)){
		$result = base_url('assets/images/no-image.jpg');
	}

	return $result;
}