<?php
/*
Plugin Name: Фильтер информации
Description: Удаление плохих слов
Plugin URL: http://wpfolder/
Author: Никита
Author URL: http://vk.com/nikitaxxteon/
Version: 1.0
*/

define ('KVD_FAVORITS_DIR', plugin_dir_path(__FILE__));


function kvd_cenzorship($the_content)
{
	static $badwords = array()
	if (empty($badwords))
	{
	    $badwords = explode(',',file_get_contents(CENZORSHIP_DIR . '
                badwords.txt'));				
	}
	for($i = 0, $c = count($badwords); $i < $c; $i++){
		$the_content = preg_replace('#'.$badwords[$i].'#iu','{плохое слово}', $the_content)
	}
	return $the_content;
}
add_filter('the_content','kvd-cenzorship')

?>