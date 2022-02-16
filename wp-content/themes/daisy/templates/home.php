<?php
/*
Template Name:home page
*/
?>
<?php get_header();
$fieldBlock = get_fields();
$image = get_field('background');
$image1 = get_field('expand_image');
$image2 = get_field('process_image');
$image3 = get_field("land_pages_image");
$image4 = get_field("advertising_image");
$image5 = get_field("marketing_image");
?>
<main class="content">

    <section class="content-wrapper" style="background-image: url(<?php echo $image['url']; ?> );">
        <h1 class="clients main-text-big"><?php echo fields($fieldBlock, 'title') ?></h1>
        <h2 class="text-hero"><?php echo fields($fieldBlock, 'subtitle') ?></h2>
        <span class="bg"></span>
        <a class="hero-button m-button button" href="#<?php echo fields($fieldBlock, 'button_link')['url'] ?>"><?php echo fields($fieldBlock, 'button_name') ?></a>
        <a class="hero-scroll  scroll" href="#services"></a>

    </section>
    <section class="service-section container" id="services">
        <div class="service-content">
            <h2 class="service-title main-text-med"><?php echo fields($fieldBlock, 'service_block_title'); ?></h2>
            <p class="service-subtitle"><?php echo fields($fieldBlock, 'service_subtitle'); ?></p>
        </div>
        <div class="service-block">
            <?php
            $rows = get_field('services');
            if ($rows) {
                foreach ($rows as $row) {
                    $image = $row['image'] ?? '';
                    $hoverImage = $row['hover_image'] ?? ''; ?>
                    <div class="service-item">
                        <div class="service-image">
                            <?php echo wp_get_attachment_image($hoverImage['ID'] ?? '', 'full', '', ["class" => "white_image"]) ?>
                            <?php echo wp_get_attachment_image($image['ID'] ?? '', 'full', '', ["class" => "red_image"]) ?>
                        </div>
                        <h3 class="service-name"><?php echo $row['service_title_blocks'] ?? ''; ?> </h3>
                        <p class="service-text"><?php echo $row['service_subtitle_blocks'] ?? ''; ?></p>
                    </div>
                <?php }
            } ?>
        </div>
        <a class="scroll-services  scroll" href="#expand"></a>
    </section>
    <section class="expand " id="expand" style="background-image: url(<?php echo $image1['url']; ?> );">
        <div class="border">
        </div>
        <h2 class="expand-content main-text-big">
            <?php echo fields($fieldBlock, 'expand_title') ?>  </h2>
        <span class="expand-bg"></span>
        <a class="expand-button m-button button" href="#<?php echo fields($fieldBlock, 'expand_button_link')['url'] ?>"><?php echo fields($fieldBlock, 'expand_button') ?></a>
        <a class="expand-scroll  scroll" href="#our-work"></a>
    </section>
    <section class="process" id="our-work">

        <div class="process-content container">

            <h2 class="process-title main-text-med"><?php echo fields($fieldBlock, 'process_title') ?></h2>
            <p class="process-subtitle">
                <?php echo fields($fieldBlock, 'process_subtitle') ?>
            </p>
            <img class="process-photo" src="<?php echo $image2['url'] ?? ''; ?>" alt="">
        </div>
        <a class="process-scroll  scroll" href="#landing-pages"></a>
    </section>
    <section class="landing-pages" id="landing-pages">
        <h2 class="land_pages_title"><?php echo fields($fieldBlock, 'land_pages_title') ?></h2>
        <div class="landing-content">
            <div class="landing-text">
                <h3 class="land_pages_subtitle"><?php echo fields($fieldBlock, 'land_pages_subtitle') ?></h3>
                <p class="land_pages_text">
                    <?php echo fields($fieldBlock, 'land_pages_text') ?>
                </p>
                <a class="land-button button" href="#<?php echo fields($fieldBlock, 'land_button_link')['url'] ?>"><?php echo fields($fieldBlock, 'land_button_name') ?></a>
            </div>
            <div class="devices">
                <img class="land-image" src="<?php echo $image3['url'] ?? ''; ?>" alt="">
            </div>
            <a class="landing-scroll  scroll" href="#adverst"></a>
        </div>
    </section>
    <section class="tising" id="adverst">
        <div class="tising-content">
            <div class="tising-image">
                <img class="tising-img" src="<?php echo $image4['url'] ?? ''; ?>" alt="">
            </div>
            <div class="tising-text">
                <h3 class="tising-title"><?php echo fields($fieldBlock, 'advertising_title'); ?></h3>
                <p class="tising-subtitle">
                    <?php echo fields($fieldBlock, 'advertising_subtitle'); ?>
                </p>
                <a class="tising-button button" href="#<?php echo fields($fieldBlock, 'advertising_link')['url'] ?>"><?php echo fields($fieldBlock, 'advertising_button') ?></a>
            </div>
            <a class="tising-scroll scroll" href="#marketing"></a>
        </div>
    </section>
    <section class="marketing-kit" id="marketing">
        <div class="marketing-content">
            <div class="marketing-text">
                <h3 class="marketing-title"><?php echo fields($fieldBlock, 'marketing_title'); ?></h3>
                <p class="marketing-subtitle">
                    <?php echo fields($fieldBlock, 'marketing_subtitle'); ?>
                </p>
                <a class="marketing-button button" href="#<?php echo fields($fieldBlock, 'marketing_link')['url'] ?>"><?php echo fields($fieldBlock, 'marketing_button') ?></a>
            </div>
            <div class="book">
                <img src="<?php echo $image5['url'] ?? ''; ?>" alt="">
            </div>
        </div>
        <a class="marketing-scroll  scroll" href="#portfolio"></a>
    </section>
    <section class="portfolio" id="portfolio">
        <h2 class="main-portfolio"><?php echo fields($fieldBlock, 'portfolio_title'); ?></h2>
        <ul class="main-menu">
            <li class="menu-port portfolio-menu" data-id="all"><?php _e('All', 'daisy') ?><span class="slash">/</span></li>
            <?php
            $args = [
                'taxonomy' => 'category',
                'orderby'  => 'name',
                'order'    => 'ASC',
            ];

            $cats = get_categories($args);

            foreach ($cats as $cat) {
                ?>
                <li class="menu-port portfolio-menu " data-id="<?php echo $cat->term_id ?? '' ?>">
                    <?php echo $cat->name ?? ''; ?> <span class="slash">/</span>
                </li>
                <?php
            } ?>
        </ul>
        <div class="images-port">
            <?php
            $query = new WP_Query(['post_type' => 'mypost']);
            if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php $imageName = get_fields($query->post->ID); ?>
                    <div class="port-items <?php echo strtolower($imageName["image_name"] ?? '') ?>">
                        <img class="port-img" src="<?php echo get_the_post_thumbnail_url() ?? '' ?>" alt="">
                        <span class="image-name"><?php echo $imageName["image_name"] ?? ''; ?></span>
                        <span class="plus"><?php echo '+'; ?></span>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>

            <?php endif; ?>


        </div>
        <a class="scroll-portfolio  scroll" href="#team"></a>
        <a class="portfolio-button button" href="#<?php echo fields($fieldBlock, 'portfolio_link')['url'] ?>"><?php echo fields($fieldBlock, 'portfolio_button') ?></a>
    </section>
    <section class="team-block" id="team">

        <h2 class="team-title"><?php echo fields($fieldBlock, 'team_title'); ?></span></h2>

        <div class="teammates slider-our-team">
            <?php
            $rows = get_field('teammate');
            if ($rows) {
                foreach ($rows as $row) {
                    $image = $row['teammate_photo'];
                    $twitter = $row['twitter'];
                    $facebook = $row['facebook'];
                    $linked = $row['linked'];
                    ?>
                    <div class="team-workers">
                        <div class="worker">
                            <?php echo wp_get_attachment_image($image['ID'] ?? '', 'full') ?>
                            <h3 class="worker-title"><?php echo $row['teammate_title'] ?? ''; ?></h3>
                            <p class="worker-subtitle"><?php echo $row['teammate_subtitle'] ?? ''; ?></p>
                            <div class="links">
                                <span class="twitter"><?php echo wp_get_attachment_image($twitter['ID'] ?? '', 'full') ?></span>
                                <span class="facebook">  <?php echo wp_get_attachment_image($facebook['ID'] ?? '', 'full') ?></span>
                                <span class="linked">  <?php echo wp_get_attachment_image($linked['ID'] ?? '', 'full') ?></span>
                            </div>

                        </div>

                    </div>
                <?php }
            } ?>
        </div>
        <a class="scroll-team  scroll" href="#alan"></a>
    </section>
    <section class="employees" id="alan">
        <img class="employees-head-image" src="<?php echo $fieldBlock['employees_head_image']['url'] ?? '' ?>" alt="">
        <div class="employees-images owl-carousel owl-theme owl-loaded">
            <?php
            $rows = get_field('employees_slider');
            if ($rows) {
                foreach ($rows as $row) { ?>
                    <div class="employees-item">
                        <div class="block-width">
                            <p class="employees-text">
                                <?php echo $row["employees_text"] ?? ''; ?>
                            </p>
                        </div>
                        <div class="block-width">
                            <img class="photo-item" src="<?php echo $row['employees_photo']['url'] ?? '' ?>" alt="">
                        </div>
                        <div class="alanrich block-width">
                            <h2 class="employees-name"><?php echo $row["employees_name"] ?? '' ?></h2>
                            <span class="employees-description"><?php echo $row["employees_description"] ?? '' ?></span>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
        <div class="arrows"></div>
    </section>
    <section class="contacts" id="contacts">
        <div id="map" class="gmap-img"></div>

        <div class="text-logo-map">
            <img class="second-fon" src="<?php echo $fieldBlock['second_fon']['url'] ?>" alt="">
            <img class="main-fon" src="<?php echo $fieldBlock['main_fon']['url'] ?>" alt="">
            <h2 class="logo-name"><?php echo $fieldBlock['contacts_title'] ?></h2>
            <p class="address"><?php echo $fieldBlock['contacts_subtitle'] ?></p>
        </div>
    </section>
</main>


<?php get_footer(); ?>
