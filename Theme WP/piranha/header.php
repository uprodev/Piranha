<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo wp_get_document_title(); ?></title>
		<?php wp_head();?>
</head>

<body <?php body_class() ?>>
<header class="header<?= is_front_page()?' header-light':'';?>">
    <div class="header-main">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div class="header-logo">
                    <a href="<?= get_home_url();?>">
                        <?php $svgUrl = get_field('logo', 'options');

                        $response = wp_remote_get($svgUrl);

                        if (is_wp_error($response)) return;

                        $svgContent = wp_remote_retrieve_body($response);

                        if (!empty($svgContent)) {
                            echo $svgContent;
                        }?>
                    </a>
                </div>
                <button class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            </div>
            <div class="d-flex align-items-center">
                <?php $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );

                if ( !empty( $languages ) ) {
                    echo '<div class="lang-switcher">';
                        foreach ( $languages as $lang ) {
                            if ( $lang['active'] ) {
                                echo '<button type="button">'.$lang['tag'].'</button>';
                            }
                        }
                        echo '<ul>';
                            foreach ( $languages as $lang ) {
                                echo '<li><a href="' . $lang['url'] . '">' . $lang['tag'] . '</a></li>';
                            }
                        echo '</ul>';
                    echo '</div>';
                }
                ?>

                <?php $link = get_field('button', 'options');

                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="header-btn">
                        <a class="btn" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                            <span data-text="<?= esc_html($link_title); ?>"><?= esc_html($link_title); ?></span>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <nav class="header-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div class="navigation-main">
                <?php wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => '',
                ]);?>
            </div>
            <div class="header-navbar-bottom">
                <?php $linkd = get_field('download_link', 'options');

                if( $linkd ):
                    $linkd_url = $linkd['url'];
                    $linkd_title = $linkd['title'];
                    $linkd_target = $linkd['target'] ? $linkd['target'] : '_self';
                    ?>
                    <a class="ico-link" href="<?= esc_url($linkd_url); ?>" target="<?= esc_attr($linkd_target); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <g>
                                <path d="M7,10.5c-0.23,0-0.46-0.09-0.62-0.26l-3.5-3.5C2.58,6.4,2.6,5.88,2.93,5.56c0.32-0.32,0.84-0.35,1.18-0.05L7,8.39 l2.88-2.87c0.35-0.3,0.86-0.28,1.18,0.05c0.32,0.32,0.35,0.84,0.05,1.18l-3.5,3.5C7.45,10.41,7.23,10.5,7,10.5" fill="#3da9ff" />
                                <path d="M7,10.5c-0.48,0-0.88-0.39-0.88-0.88V0.88C6.12,0.39,6.52,0,7,0c0.48,0,0.88,0.39,0.88,0.88v8.75 C7.88,10.11,7.48,10.5,7,10.5 M13.12,14H0.88C0.39,14,0,13.61,0,13.13c0-0.48,0.39-0.88,0.88-0.88h12.25 c0.48,0,0.88,0.39,0.88,0.88C14,13.61,13.61,14,13.12,14" fill="#3da9ff" />
                            </g>
                        </svg>
                        <?= esc_html($linkd_title); ?>
                    </a>
                <?php endif; ?>

                <?php if(get_field('social_networks', 'options')):?>
                    <div class="list-underlined">
                        <ul>
                            <?php foreach(get_field('social_networks', 'options') as $sn):
                                $linksn = $sn['link'];

                                if( $linksn ):
                                    $linksn_url = $linksn['url'];
                                    $linksn_title = $linksn['title'];
                                    $linksn_target = $linksn['target'] ? $linksn['target'] : '_self';
                                    ?>
                                    <li>
                                        <a class="" href="<?= esc_url($linksn_url); ?>" target="<?= esc_attr($linksn_target); ?>"><?= esc_html($linksn_title); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </ul>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </nav>
</header>

<div class="global-wrapper">

    <?php if(is_front_page()){
        get_template_part('parts/home-banner');
    }?>

    <main class="page-content">