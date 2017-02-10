<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	$wp_editor_settings = array(
		'wpautop' => false,
		'textarea_rows' => 4,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	// HP - Banner

	$options[] = array(
		'name' => __('עמוד הבית - באנר ראשי', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('תמונה', 'options_check'),
		'desc' => __('גודל תמונה 600x600 צריך להיות fade לבצע רקע של הבאנר מכל הכיוונים', 'options_check'),
		'id' => 'hp_banner_image',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('צבע פרוסה', 'options_check'),
		'desc' => __('צבע הרקע של הפרוסה', 'options_check'),
		'id' => 'hp_banner_bgcolor',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('כותרת גדולה', 'options_check'),
		'id' => 'hp_banner_h1',
		'desc' => 'הכותרת הגדולה בבאנר בדך הבית',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => __('טקסט כותרת', 'options_check'),
		'id' => 'hp_banner_p',
		'desc' => 'הטקסט הקטן בבאנר בדך הבית',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => __('טקסט כפתור', 'options_check'),
		'id' => 'hp_banner_btn_text',
		'desc' => 'הטקסט שיופיע על הכפתור',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('קישור כפתור', 'options_check'),
		'id' => 'hp_banner_btn_link',
		'desc' => 'הקישור שאליו יוביל הכפתור',
		'type' => 'text'
	);

	// HP - Second Slice, Features 

	$options[] = array(
		'name' => __('עמוד הבית - פרוסת תחומי עיסוק', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('צבע פרוסה', 'options_check'),
		'desc' => __('צבע הרקע של הפרוסה', 'options_check'),
		'id' => 'hp_featuers_bgcolor',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('כותרת פרוסה', 'options_check'),
		'id' => 'hp_features_title',
		'desc' => 'הכותרת הגדולה בראש הפרוסה',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('ריבוע 1 - כותרת', 'options_check'),
		'id' => 'hp_features_box1_title',
		'desc' => 'כותרת הריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 1 - טקסט', 'options_check'),
		'id' => 'hp_features_box1_text',
		'desc' => 'טקסט שיוצג הריבוע',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => __('ריבוע 1 - טקסט לקישור', 'options_check'),
		'id' => 'hp_features_box1_link_text',
		'desc' => 'טקסט שיוצג בקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 1 - כתובת לקישור', 'options_check'),
		'id' => 'hp_features_box1_link_href',
		'desc' => 'כתובת לקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('ריבוע 2 - כותרת', 'options_check'),
		'id' => 'hp_features_box2_title',
		'desc' => 'כותרת הריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 2 - טקסט', 'options_check'),
		'id' => 'hp_features_box2_text',
		'desc' => 'טקסט שיוצג הריבוע',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => __('ריבוע 2 - טקסט לקישור', 'options_check'),
		'id' => 'hp_features_box2_link_text',
		'desc' => 'טקסט שיוצג בקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 2 - כתובת לקישור', 'options_check'),
		'id' => 'hp_features_box2_link_href',
		'desc' => 'כתובת לקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('ריבוע 3 - כותרת', 'options_check'),
		'id' => 'hp_features_box3_title',
		'desc' => 'כותרת הריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 3 - טקסט', 'options_check'),
		'id' => 'hp_features_box3_text',
		'desc' => 'טקסט שיוצג הריבוע',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => __('ריבוע 3 - טקסט לקישור', 'options_check'),
		'id' => 'hp_features_box3_link_text',
		'desc' => 'טקסט שיוצג בקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 3 - כתובת לקישור', 'options_check'),
		'id' => 'hp_features_box3_link_href',
		'desc' => 'כתובת לקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('ריבוע 4 - כותרת', 'options_check'),
		'id' => 'hp_features_box4_title',
		'desc' => 'כותרת הריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 4 - טקסט', 'options_check'),
		'id' => 'hp_features_box4_text',
		'desc' => 'טקסט שיוצג הריבוע',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => __('ריבוע 4 - טקסט לקישור', 'options_check'),
		'id' => 'hp_features_box4_link_text',
		'desc' => 'טקסט שיוצג בקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('ריבוע 4 - כתובת לקישור', 'options_check'),
		'id' => 'hp_features_box4_link_href',
		'desc' => 'כתובת לקישור בריבוע',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	// HP - Slice 3 - About Me

	$options[] = array(
		'name' => __('עמוד הבית - פרוסת אודותיי', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('צבע פרוסה', 'options_check'),
		'desc' => __('צבע הרקע של הפרוסה', 'options_check'),
		'id' => 'hp_aboutme_bgcolor',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('כותרת', 'options_check'),
		'id' => 'hp_aboutme_title',
		'desc' => 'כותרת לפרוסת אודותיי',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תמונה', 'options_check'),
		'desc' => __('גודל תמונה 840x660 צריך להיות fade לבצע רקע של הבאנר מכל הכיוונים', 'options_check'),
		'id' => 'hp_aboutme_image',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('טקסטים', 'options_check'),
		'desc' => __('כותרות בבולד', 'options_check'),
		'id' => 'hp_aboutme_texts',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => __('טקסט לכפתור', 'options_check'),
		'id' => 'hp_aboutme_btn_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('קישור לכפתור', 'options_check'),
		'id' => 'hp_aboutme_btn_link',
		'type' => 'text'
	);

	// HP - Slice 4 - Contact Me

	$options[] = array(
		'name' => __('עמוד הבית - פרוסת צור קשר', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('צבע פרוסה', 'options_check'),
		'desc' => __('צבע הרקע של הפרוסה', 'options_check'),
		'id' => 'hp_contact_bgcolor',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('כותרת', 'options_check'),
		'id' => 'hp_contact_title',
		'desc' => 'כותרת לפרוסה',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('כותרת לטופס השארת פרטים', 'options_check'),
		'id' => 'hp_contact_form_title',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('טקסט לכפתור לטופס השארת פרטים', 'options_check'),
		'id' => 'hp_contact_form_btn',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('כותרת למספר טלפון', 'options_check'),
		'id' => 'hp_contact_phone_title',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('טקסט למספר טלפון', 'options_check'),
		'id' => 'hp_contact_phone_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('טקסט לכפתור למספר טלפון', 'options_check'),
		'id' => 'hp_contact_phone_btn',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('כותרת לכתובת מייל', 'options_check'),
		'id' => 'hp_contact_mail_title',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('טקסט לכתובת מייל', 'options_check'),
		'id' => 'hp_contact_mail_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('טקסט לכפתור לכתובת מייל', 'options_check'),
		'id' => 'hp_contact_mail_btn',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('כותרת למפה', 'options_check'),
		'id' => 'hp_contact_map_title',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('טקסט למפה', 'options_check'),
		'id' => 'hp_contact_map_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('כתובת 1', 'options_check'),
		'id' => 'hp_contact_map_address_1',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('כתובת 2', 'options_check'),
		'id' => 'hp_contact_map_address_2',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('כתובת 3', 'options_check'),
		'id' => 'hp_contact_map_address_3',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('כתובת 4', 'options_check'),
		'id' => 'hp_contact_map_address_4',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('כתובת 5', 'options_check'),
		'id' => 'hp_contact_map_address_5',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('תמונה לבועית הודעה', 'options_check'),
		'desc' => __('גודל תמונה 56x56', 'options_check'),
		'id' => 'hp_contact_message_image',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('טקסט לבועית הודעה', 'options_check'),
		'id' => 'hp_contact_message_text',
		'type' => 'text'
	);

	/* HP - Slice 5 - Blog */

	$options[] = array(
		'name' => __('עמוד הבית - פרוסת בלוג', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('צבע פרוסה', 'options_check'),
		'desc' => __('צבע הרקע של הפרוסה', 'options_check'),
		'id' => 'hp_blog_bgcolor',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('כותרת', 'options_check'),
		'id' => 'hp_blog_title',
		'desc' => 'כותרת לפרוסה',
		'type' => 'text'
	);

	/* HP - Slice 6 - FAQ */

	$options[] = array(
		'name' => __('עמוד הבית - פרוסת שאלות ותשובות', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('צבע פרוסה', 'options_check'),
		'desc' => __('צבע הרקע של הפרוסה', 'options_check'),
		'id' => 'hp_faq_bgcolor',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('כותרת', 'options_check'),
		'id' => 'hp_faq_title',
		'desc' => 'כותרת לפרוסה',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 1', 'options_check'),
		'id' => 'hp_faq_question_1',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 1', 'options_check'),
		'id' => 'hp_faq_answer_1',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 2', 'options_check'),
		'id' => 'hp_faq_question_2',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 2', 'options_check'),
		'id' => 'hp_faq_answer_2',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 3', 'options_check'),
		'id' => 'hp_faq_question_3',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 3', 'options_check'),
		'id' => 'hp_faq_answer_3',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 4', 'options_check'),
		'id' => 'hp_faq_question_4',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 4', 'options_check'),
		'id' => 'hp_faq_answer_4',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 5', 'options_check'),
		'id' => 'hp_faq_question_5',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 5', 'options_check'),
		'id' => 'hp_faq_answer_5',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 6', 'options_check'),
		'id' => 'hp_faq_question_6',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 6', 'options_check'),
		'id' => 'hp_faq_answer_6',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 7', 'options_check'),
		'id' => 'hp_faq_question_7',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 7', 'options_check'),
		'id' => 'hp_faq_answer_7',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 8', 'options_check'),
		'id' => 'hp_faq_question_8',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 8', 'options_check'),
		'id' => 'hp_faq_answer_8',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 9', 'options_check'),
		'id' => 'hp_faq_question_9',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 9', 'options_check'),
		'id' => 'hp_faq_answer_9',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('שאלה 10', 'options_check'),
		'id' => 'hp_faq_question_10',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תשובה 10', 'options_check'),
		'id' => 'hp_faq_answer_10',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	/* HP - Slice 7 - Testimonials */

	$options[] = array(
		'name' => __('עמוד הבית - פרוסת סיפרו עליי', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('צבע פרוסה', 'options_check'),
		'desc' => __('צבע הרקע של הפרוסה', 'options_check'),
		'id' => 'hp_testimonials_bgcolor',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('כותרת', 'options_check'),
		'id' => 'hp_testimonials_title',
		'desc' => 'כותרת לפרוסה',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('תמונה 1', 'options_check'),
		'desc' => __('גודל תמונה 400x400', 'options_check'),
		'id' => 'hp_testimonials_1_image',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('טקסט 1', 'options_check'),
		'id' => 'hp_testimonials_1_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תאריך ומיקום 1', 'options_check'),
		'id' => 'hp_testimonials_1_time_and_loc',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('תמונה 2', 'options_check'),
		'desc' => __('גודל תמונה 400x400', 'options_check'),
		'id' => 'hp_testimonials_2_image',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('טקסט 2', 'options_check'),
		'id' => 'hp_testimonials_2_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תאריך ומיקום 2', 'options_check'),
		'id' => 'hp_testimonials_2_time_and_loc',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('תמונה 3', 'options_check'),
		'desc' => __('גודל תמונה 400x400', 'options_check'),
		'id' => 'hp_testimonials_3_image',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('טקסט 3', 'options_check'),
		'id' => 'hp_testimonials_3_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תאריך ומיקום 3', 'options_check'),
		'id' => 'hp_testimonials_3_time_and_loc',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __('תמונה 4', 'options_check'),
		'desc' => __('גודל תמונה 400x400', 'options_check'),
		'id' => 'hp_testimonials_4_image',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('טקסט 4', 'options_check'),
		'id' => 'hp_testimonials_4_text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('תאריך ומיקום 4', 'options_check'),
		'id' => 'hp_testimonials_4_time_and_loc',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'options_check'),
		'type' => 'info'
	);

	/* General Settings */

	$options[] = array(
		'name' => __('הגדרות כלליות', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('מספר טלפון', 'options_check'),
		'desc' => __('יופיע ברכיבים שונים באתר', 'options_check'),
		'id' => 'general_phone',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('כתובת מייל', 'options_check'),
		'desc' => __('יופיע ברכיבים שונים באתר', 'options_check'),
		'id' => 'general_mail',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('קישור לפייסבוק', 'options_check'),
		'desc' => __('יופיע ברכיבים שונים באתר', 'options_check'),
		'id' => 'general_fblink',
		'type' => 'text'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	return $options;
}