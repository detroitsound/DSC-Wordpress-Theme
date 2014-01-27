<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title('', true, 'right'); ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- icons & favicons -->
		<!-- For iPhone 4 -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
		<!-- For iPad 1-->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
		<!-- For iPhone 3G, iPod Touch and Android -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
		<!-- For Nokia -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
		<!-- For everything else -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


		<!-- bring in theme options styles -->
		<?php
		$theme_options_styles = "";

		$link_color = of_get_option('link_color');
		if ($link_color) {
			$theme_options_styles .= '
			a{
				color: ' . $link_color . ';
			}';
		}

		$link_hover_color = of_get_option('link_hover_color');
		if ($link_hover_color) {
			$theme_options_styles .= '
			a:hover{
				color: ' . $link_hover_color . ';
			}';
		}

		$link_active_color = of_get_option('link_active_color');
		if ($link_active_color) {
			$theme_options_styles .= '
			a:active{
				color: ' . $link_active_color . ';
			}';
		}


		$suppress_comments_message = of_get_option('suppress_comments_message');
		if ($suppress_comments_message){
			$theme_options_styles .= '
			#main article {
				border-bottom: none;
			}';
		}

		if($theme_options_styles){
			echo '<style>'
			. $theme_options_styles . '
			</style>';
		}

		?>

	</head>

	<body <?php body_class(); ?>>
        <div id="bodyWrapper">
            <nav id="mobileMenu">
                <?php bones_mobile_nav(); ?>
            </nav>
            <section id="container">
                <div id="contentWrapper">
            		<header role="banner" id="top-header">

            			<a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>">
            			    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" />
            		    </a>
                        <nav class="main">
                			<?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
            			</nav>

            			<div class="show-for-small menu-action" id="showMenu">
            		  	    <a href="#sidebar" id="mobile-nav-button">
            					<i class="fa fa-bars"></i>
            				</a>
            			</div>

            		</header> <!-- end header -->