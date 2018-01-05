<?php
/*
  Name: Facebook Page Likes count
	Version : 1
	Author: Linesh Jose
	Url: https://linesh.com
	Donate:  http://bit.ly/donate-linesh
	github: https://github.com/lineshjose
	Copyright: Copyright (c) 2012 LineshJose.com
	
	Note: This script is free; you can redistribute it and/or modify  it under the terms of the GNU General Public License as published by 
		the Free Software Foundation; either version 2 of the License, or (at your option) any later version.This script is distributed in the hope 
		that it will be useful,    but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
		See the  GNU General Public License for more details.

-----------------------------------------------------------

	This php function returns your Facebook Page Likes count
	
	$value: your Facebook page username or ID
	
	Usage: 
			<p>Likes: <strong><?php echo fb_count('LineshJoseDotCom');?></strong></p> // User name
			<p>Likes: <strong><?php echo fb_count('114877608587606');?></strong></p> // Profile ID 
	
*/
function fb_count($value='') 
{ 
	 if($value){
		 $url='http://api.facebook.com/method/fql.query?query=SELECT fan_count FROM page WHERE';
		 if(is_numeric($value)) { $qry=' page_id="'.$value.'"';} //If value is a page ID
		 else {$qry=' username="'.$value.'"';} //If value is not a ID. 
		 $xml = @simplexml_load_file($url.$qry) or die ("invalid operation");
		 $fb_count = $xml->page->fan_count;
		 return $fb_count;
	}else{
		return '0';
	}
}
?>
