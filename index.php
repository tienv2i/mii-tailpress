<!DOCTYPE html>
<html <?php language_attributes( ); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ; ?>
</head>
<body <?php body_class("bg-gray-200"); ?> >
    <?php wp_body_open(  ); ?>
    <div class="site-container">
        <?php get_header(); ?>
        <?php get_sidebar(); ?>
        <?php get_footer(); ?>
        <?php wp_footer(); ?>
    </div>

</body>
</html>