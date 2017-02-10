<?php require_once "/wp-content/themes/gishur/php/functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PreProd</title>
	<link href="https://fonts.googleapis.com/css?family=Assistant:400,600&amp;subset=hebrew" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_dir() . 'styles.css'; ?>" />
	<script src="<?php echo base_dir() . 'js/jQuery.js'; ?>"></script>
	<script src="<?php echo base_dir() . 'js/functions.js'; ?>"></script>
	<script src="<?php echo base_dir() . 'js/disable_scrolling.js'; ?>"></script>
	<script src="<?php echo base_dir() . 'js/scripts.js'; ?>"></script>

</head>
<body>

	<style>
		#loader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: #191919;
			z-index: 998;
		}
		#loader img {
			position: fixed;
			top: 50%;
			left: 50%;
			width: 240px;
			margin: -90px auto auto -120px;
			z-index: 999;
		}
	</style>
	<div id="loader">
		<img src="img/loader.gif" alt="loading..." />
	</div>

	<div id="php_tests">
		<?php
			print_contact_map_places();
		?>
	</div>

	<div class="burger-btn">
		<span></span>
		<span></span>
		<span></span>
	</div>

	<div class="wrapper">
		<div class="logo">
			<a href="/" title="גישור ברגישות"></a>
		</div>
	</div>

	<div id="navigation">
		<div class="wrapper">
			<?php
				$args = [
					"menu" => "ניווט ראשי",
					"menu_class" => 'wp_menu',
					"menu_id" => "wp_nav",
					"container" => ""

				];
				wp_nav_menu($args);
			?>
		</div>
	</div>
	
	<div class="hero-image" style="background-color: <?php print_option('hp_banner_bgcolor'); ?>;">
		<div class="wrapper" style="background-image: url('<?php print_option('hp_banner_image'); ?>');">
			<div class="mid-box">
				<h1>
					<?php print_option('hp_banner_h1'); ?>
				</h1>
				<p class="tagline">
					<?php print_option('hp_banner_p'); ?>
				</p>
				<a href="<?php print_option('hp_banner_btn_link'); ?>" class="cta color-9">
					<?php print_option('hp_banner_btn_text'); ?>
				</a>
			</div>
			<a href="tel:0543846915" target="_blank" class="phone-link">054-384-6915</i>
			<a href="mailto:somemail@somewhere.com" target="_blank" class="mail-link">somemail@somewhere.com</a>
		</div>
	</div>

	<div id="features" class="section" style="background-color: <?php print_option('hp_featuers_bgcolor'); ?>">
		<div class="wrapper">
			<h2 class="section-title"><?php print_option('hp_features_title'); ?></h2>
			
			<div class="four-boxes">
				<div class="box">
					<h3>
						<?php print_option('hp_features_box1_title'); ?>
					</h3>
					<p>
						<?php print_option('hp_features_box1_text'); ?>
					</p>
					<a href="<?php print_option('hp_features_box1_link_href'); ?>">
						<?php print_option('hp_features_box1_link_text'); ?>
					</a>
				</div>
				<div class="box">
					<h3>
						<?php print_option('hp_features_box2_title'); ?>
					</h3>
					<p>
						<?php print_option('hp_features_box2_text'); ?>
					</p>
					<a href="<?php print_option('hp_features_box2_link_href'); ?>">
						<?php print_option('hp_features_box2_link_text'); ?>
					</a>
				</div>
				<div class="box">
					<h3>
						<?php print_option('hp_features_box3_title'); ?>
					</h3>
					<p>
						<?php print_option('hp_features_box3_text'); ?>
					</p>
					<a href="<?php print_option('hp_features_box3_link_href'); ?>">
						<?php print_option('hp_features_box3_link_text'); ?>
					</a>
				</div>
				<div class="box">
					<h3>
						<?php print_option('hp_features_box4_title'); ?>
					</h3>
					<p>
						<?php print_option('hp_features_box4_text'); ?>
					</p>
					<a href="<?php print_option('hp_features_box4_link_href'); ?>">
						<?php print_option('hp_features_box4_link_text'); ?>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div id="about_me" class="section" style="background-color: <?php print_option('hp_aboutme_bgcolor'); ?>">
		<div class="wrapper" style="background-image: url('<?php print_option('hp_aboutme_image'); ?>');">
			<h2 class="section-title right-side">
				<?php print_option('hp_aboutme_title'); ?>
			</h2>
			<p>
				<?php print_option('hp_aboutme_texts'); ?>
				<a href="<?php print_option('hp_aboutme_btn_link'); ?>" class="cta color-9">
					<?php print_option('hp_aboutme_btn_text'); ?>
				</a>
			</p>
		</div>
	</div>

	<div class="section" id="contact" style="background-color: <?php print_option('hp_contact_bgcolor'); ?>;">
		<div class="wrapper">
			<h2 class="section-title">
				<?php print_option('hp_contact_title'); ?>
			</h2>
			<div class="box form">
				<h3>
					<?php print_option('hp_contact_form_title'); ?>
				</h3>
				<div class="input_container">
					<label for="input_name">שם פרטי:</label>
					<input type="text" />
				</div>
				<div class="input_container">
					<label for="input_phone">מספר טלפון:</label>
					<input type="text" />
				</div>
				<div class="input_container">
					<label for="input_email">כתובת דוא''ל:</label>
					<input type="text" />
				</div>
				<div class="input_container">
					<br>
					<div class="cta color-2">
						<?php print_option('hp_contact_form_btn'); ?>
					</div>
				</div>
				<div class="message">
					<img src="<?php print_option('hp_contact_message_image'); ?>" alt="הילה ויטקובסקי פרץ" />
					<p>
						<?php print_option('hp_contact_message_text'); ?>
					</p>
				</div>
			</div>

			<div class="box self">
				<div class="phone">
					<h3>
						<?php print_option('hp_contact_phone_title'); ?>
					</h3>
					<img src="img/phone.png" alt="" />
					<p>
						<?php print_option('hp_contact_phone_text'); ?>
					</p>
					<a class="cta color-4" href="">
						<?php print_option('hp_contact_phone_btn'); ?>
					</a>
				</div>

				<div class="mail">
					<h3>
						<?php print_option('hp_contact_mail_title'); ?>
					</h3>
					<img src="img/email.png" alt="" />
					<p>
						<?php print_option('hp_contact_mail_text'); ?>
					</p>
					<a class="cta color-4" href="">
						<?php print_option('hp_contact_mail_btn'); ?>
					</a>
				</div>
			</div>

			<div class="box map">
				<h3>
					<?php print_option('hp_contact_map_title'); ?>
				</h3>
				<p>
					<?php print_option('hp_contact_map_text'); ?>
				</p>
				<br>
				<div class="places">
					<?php print_contact_map_places(); ?>
				</div>
				<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1qVhsaO_9ZFItRwqYfdA83MbG5og"></iframe>
			</div>

		</div>
	</div>

	<div class="section" id="articles" style="background-color: <?php print_option('hp_blog_bgcolor'); ?>;">
		<div class="wrapper">
			<h2 class="section-title"><?php print_option('hp_blog_title'); ?></h2>
			<h3 class="article-title">כותרת מאמר כותרת מאמר</h3>
			<span class="article-date">יום שני, 17 ינואר 2017</span>
			<i> | </i>
			<a href="https://www.facebook.com" target="_blank" class="article-author">הילה ויטקובסקי פרץ</a>
			<div class="article-excerpt">
				<p>
					לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית להאמית קרהשק סכעיט דז מא, מנכם למטכין נשואי מנורךגולר מונפרר סוברט לורם שבצק יהול, לכנוץ בעריר גק ליץ, ושבעגט. סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו.
				</p>
				<p>
					צוט ומעיוט - לפתיעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט מוסן מנת.
				</p>
				<br/>
				<p>
					הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק.
				</p>
				<p>
					קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפתיעם ברשג.
				</p>
			</div>
			<a href="#0" class="cta color-4 article-read-more">למאמר המלא</a>
			<a href="#0" class="cta color-9 all-artciles">לכל המאמרים</a>
		</div>
	</div>

	<div class="section" id="faq" style="background-color: <?php print_option('hp_faq_bgcolor'); ?>;">
		<div class="wrapper">
			<h2 class="section-title">
				<?php print_option('hp_faq_title'); ?>
			</h2>
			<div class="faqContainer">
				<ul>
					<li id="faq_question_1"><?php print_option('hp_faq_question_1'); ?></li>
					<li id="faq_question_2"><?php print_option('hp_faq_question_2'); ?></li>
					<li id="faq_question_3"><?php print_option('hp_faq_question_3'); ?></li>
					<li id="faq_question_4"><?php print_option('hp_faq_question_4'); ?></li>
					<li id="faq_question_5"><?php print_option('hp_faq_question_5'); ?></li>
				</ul>
			</div>
			<div class="faqContainer">
				<ul>
					<li id="faq_question_6"><?php print_option('hp_faq_question_6'); ?></li>
					<li id="faq_question_7"><?php print_option('hp_faq_question_7'); ?></li>
					<li id="faq_question_8"><?php print_option('hp_faq_question_8'); ?></li>
					<li id="faq_question_9"><?php print_option('hp_faq_question_9'); ?></li>
					<li id="faq_question_10"><?php print_option('hp_faq_question_10'); ?></li>
				</ul>	
			</div>
			<div id="blanket" class="hidden"></div>
			<div id="faq-perspective" class="hidden">
				<div id="faq-popup" class="hidden">
					<i id="close-btn"></i>
					<h3>כותרת כותרת כותרת</h3>
					<p>
						ריק
					</p>
				</div>
			</div>

			<?php print_faq_answers(); ?>

		</div>
	</div>

	<div class="section bg-color-10" id="testimonials">
		<div class="wrapper">
			<h2 class="section-title">לקוחות מספרים עליי</h2>
			<div class="four-boxes">
				<div class="box">
					<img src="img/faces/1.jpg" alt="">
					<div class="box-content">
						<p class="quote">
							לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט<br/>
							שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף.<br/>
							זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי.
						</p>
						<span class="desc">- 24/11/2017, סימונה מראשון לציון</span>
					</div>
				</div>
				<div class="box">
					<img src="img/faces/2.jpg" alt="">
					<div class="box-content">
						<p class="quote">
							שהכים תוק, הדש שנרא התידם הכייר וק.<br/>
							ליבם סולגק בראיט ולחת צורק מונחף, בגורמי מגמש.<br/>
							תרבנך וסתעד לכנו סתשם השמה לתכי מורגם בורק לתיג ישבעס
						</p>
						<span class="desc">- 03/09/2017, אורן מראש העין</span>
					</div>
				</div>
				<div class="box">
					<img src="img/faces/3.jpg" alt="">
					<div class="box-content">
						<p class="quote">
							להאמית קרהשק סכעיט דז מא, מנכם למטכין נשואי מנורך.<br/>
							סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול צוט ומעיוט.<br/>
							לפתיעם ברשג ולתיעם גדדיש איפסום דולור.
						</p>
						<span class="desc">- 14/05/2017 דפנה מרמת החייל</span>
					</div>
				</div>
				<div class="box">
					<img src="img/faces/4.jpg" alt="">
					<div class="box-content">
						<p class="quote">
							קוויז דומור ליאמום בלינך רוגצה לפמעט מוסן מנת.<br/>
							נולום ארווס סאפיאן פוסיליס קוויס, אקווזמן קוואזי במר מודוף.<br/>
							אודיפו בלאסטיק מונופץ קליר, בנפת נפקט למסון בלרק.
						</p>
						<span class="desc">- 21/03/2017, אורי מרמת גן</span>
					</div>
				</div>
			</div>

			<br/><br/>
			<a href="#contact" class="cta color-4">בוא נדבר</a>
			<br/>
		</div>
	</div>

	<div id="footer">
		<div class="wrapper">
			<div class="box">
				<h3>קישורים באתר</h3>
				<ul>
					<li>
						<a href="#features">נושאים ותחומי עיסוק</a>
					</li>
					<li>
						<a href="#about_me">קצת עליי</a>
					</li>
					<li>
						<a href="#contact">אולי נדבר?</a>
					</li>
					<li>
						<a href="#map">איפה אפשר להפגש?</a>
					</li>
					<li>
						<a href="#articles">מאמרים</a>
					</li>
					<li>
						<a href="#faq">שאלות ותשובות</a>
					</li>
				</ul>
			</div>
			<div class="box">
				<h3>מאמרים פופולריים</h3>
				<ul>
					<li>
						<a href="#0" target="_blank">מאמר פופולרי 1</a>
					</li>
					<li>
						<a href="#0" target="_blank">מאמר פופולרי 2</a>
					</li>
					<li>
						<a href="#0" target="_blank">מאמר פופולרי 3</a>
					</li>
					<li>
						<a href="#0" target="_blank">מאמר פופולרי 4</a>
					</li>
					<li>
						<a href="#0" target="_blank">מאמר פופולרי 5</a>
					</li>
					<li>
						<a href="#0" target="_blank">מאמר פופולרי 6</a>
					</li>
				</ul>
			</div>
			<div class="box">
				<a href="https://www.facebook.com" target="_blank" class="fb-link">
					<img src="img/facebook.png" />
					<span>בקרו אותי בפייסבוק</span>
				</a>
				<a href="tel:0543846915" target="_blank" class="phone-link">054-384-6915</i>
				<a href="mailto:somemail@somewhere.com" target="_blank" class="mail-link">somemail@somewhere.com</a>
			</div>
		</div>
	</div>

	<!-- build:remove -->
		<br><br><br><br>
		<div id="color_palette">
			<div class="bg-color-1">1</div>
			<div class="bg-color-2">2</div>
			<div class="bg-color-3">3</div>
			<div class="bg-color-4">4</div>
			<div class="bg-color-5">5</div>
			<div class="bg-color-6">6</div>
			<div class="bg-color-7">7</div>
			<div class="bg-color-8">8</div>
			<div class="bg-color-9">9</div>
			<div class="bg-color-10">10</div>
		</div>
		<br><br><br><br>

		<div style="height: 2000px"></div>
	<!-- /build -->
	<div id="size_checker"></div>

</body>
</html>