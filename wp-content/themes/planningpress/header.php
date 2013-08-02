<?php
/**
 * @package WordPress
 * @subpackage planningpress
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="chrome=1">

<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
          echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
          echo ' | ' . sprintf( __( 'Page %s', 'planningpress' ), max( $paged, $page ) );

  ?></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <!--  Mobile Viewport Fix -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link media="screen" rel="stylesheet" href="<?php bloginfo( 'url' ); ?>/wp-content/themes/planningpress/colorbox/colorbox.css" />

  <!-- Favicon & Progressively-Enhanced Touch Icons: http://mathiasbynens.be/notes/touch-icons#sizes -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144x144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png">

  <!-- Windows Start Screen Tiles -->
  <meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/>
  <meta name="msapplication-TileColor" content="#ffffff"/>
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144x144-precomposed.png"/>

  <link rel="profile" href="http://gmpg.org/xfn/11" />

  <!-- Google Web ss -->
  <link href='http://fonts.googleapis.com/css?family=Playfair+Display:700,700italic|Hammersmith+One|Merriweather:400italic,400,700,900,900italic,700italic|Roboto+Slab:700,300' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/normalize.css" type="text/css" media="screen, projection" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
  <link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo( 'stylesheet_directory' ); ?>/print.css" />

  <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->

  <?php if ( is_page_template("page-map.php") ) { ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/leaflet/leaflet.css" />
  <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>leaflet/leaflet.ie.css" /><![endif]-->
  <?php } ?>

        <?php wp_head(); ?>

<?php global $is_winIE; if ($is_winIE): ?>
<style type="text/css">
.cboxIE #cboxTopLeft{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderTopLeft.png, sizingMethod='scale');}
.cboxIE #cboxTopCenter{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderTopCenter.png, sizingMethod='scale');}
.cboxIE #cboxTopRight{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderTopRight.png, sizingMethod='scale');}
.cboxIE #cboxBottomLeft{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderBottomLeft.png, sizingMethod='scale');}
.cboxIE #cboxBottomCenter{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderBottomCenter.png, sizingMethod='scale');}
.cboxIE #cboxBottomRight{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderBottomRight.png, sizingMethod='scale');}
.cboxIE #cboxMiddleLeft{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderMiddleLeft.png, sizingMethod='scale');}
.cboxIE #cboxMiddleRight{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<?php echo bloginfo('stylesheet_directory') ?>/colorbox/images/internet_explorer/borderMiddleRight.png, sizingMethod='scale');}
</style>
<?php endif;?>

</head>

<body <?php body_class(); ?>>
  <div id="page" class="hfeed">
    <header id="branding" role="banner" class="clearfix">
      <hgroup id="site-marquee">
        <h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/ri-logo.png"></a></span></h1>
        <h2 id="site-description" class="is-visuallyhidden"><?php bloginfo( 'description' ); ?></h2>
      </hgroup>

      <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'planningpress' ); ?>"><?php _e( 'Skip to content', 'planningpress' ); ?></a></div>
      <nav id="utility" role="article">
        <?php wp_nav_menu( array( 'theme_location' => 'utility', 'fallback_cb' => false ) ); ?>
      </nav><!-- #utility -->
      <a href="#" id="nav-bttn"><span class="icon">&equiv;</span><span class="prompt"> Menu</span></a>
      <nav id="access" role="article" class="is-hidden">
        <?php wp_nav_menu( array( 'theme_location' => 'header', 'fallback_cb'    => false ) ); ?>
      </nav><!-- #access -->

      <div id="addthis-site-share">
      <?php
      do_action('addthis_widget',site_url() , get_bloginfo('name'), 'small_toolbox');
      ?>
      </div>


      <?php
      $opt_val_use_header_search = get_option( 'pprss_use_header_search' );
      if ( $opt_val_use_header_search ) get_search_form();
      ?>
    </header><!-- #branding -->

    <div id="main" class="clearfix">

    <?php if ( has_nav_menu( 'sidebar' ) ) { ?>
    <nav id="sidebar-nav" class="clearfix" role="article">
        <?php wp_nav_menu( array(  
            'theme_location' => 'sidebar', 
            'fallback_cb'    => false 
          ) ); ?>
    </nav><!-- #sidebar-nav -->
    <?php } ?>

    <?php if ( is_front_page() && is_active_sidebar('frontpage-widgets') ) : ?>
    <nav id="frontpage-widgets" class="widget-area clearfix">
      <?php if ( ! dynamic_sidebar( 'frontpage-widgets' ) ) : ?>
      <?php endif; ?>
    </nav><!-- #frontpage-widgets .widget-area -->
    <?php endif; ?>