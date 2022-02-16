<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daisy</title>
</head>
<body>
<?php wp_head()?>
<header class="logo_menu">
    <div class="logo">
        <?php echo get_custom_logo(); ?>
    </div>
    <div class="hero-menu">
        <?php wp_nav_menu( [ 'theme_location' => 'my-custom-menu' ] ); ?>
    </div>
    <div class="header_burger">
        <span></span>
    </div>
</header>
