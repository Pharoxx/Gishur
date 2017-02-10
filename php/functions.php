<?php 
	function base_dir(){
		$theme = get_stylesheet_directory_uri();
		$site = get_site_url();
		$res = substr($theme, strlen($site)+1, strlen($theme)) . "/";
		return $res;
	}

	// prints custom options from Theme Option Framework plugin
	function print_option($option_id){
		
		// if result string contains url then make it relative
		$res_str = of_get_option($option_id);
		$site_url = get_site_url();
		if (strpos( $res_str, $site_url ) !== false){
			$res_str = substr($res_str, strlen($site_url)+1, strlen($res_str));
		}

		// transform "---" to "<br/>"
		if (strpos( $res_str, '---' ) !== false){
			$res_str = str_replace('---', '<br/>', $res_str);
		}

		echo $res_str;
	}

	function print_contact_map_places(){
		$places = array(
			of_get_option('hp_contact_map_address_1'),
			of_get_option('hp_contact_map_address_2'),
			of_get_option('hp_contact_map_address_3'),
			of_get_option('hp_contact_map_address_4'),
			of_get_option('hp_contact_map_address_5')
		);

		for($i = 0; $i < 6; $i++) {
			if( $places[$i] != "" ){
				echo "<p>" . $places[$i] . "</p>";
			}
		}
	}

	function print_faq_answers(){
		
		echo "<div style='display:none;'>";

		for($i = 1; $i < 11; $i++) {
			echo "<div id='faq_answer_" . $i . "'>";
			$option_id = "hp_faq_answer_" . $i;
			echo of_get_option($option_id);
			echo "</div>";
		}

		echo "</div>";

	}
?>
