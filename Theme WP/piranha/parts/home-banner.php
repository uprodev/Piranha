<?php

$video = get_field('video');
$title = get_field('title');
$subtitle = get_field('subtitle');
$button_sound = get_field('button_sound');

?>

<section class="home-banner">
    <div class="video">
        <?php if($button_sound):?>
            <a href="#" class="ico-link btn-sound">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 23.79">
                    <path d="M1.45,16.74h3.87 c0.27,0,0.64,0.15,0.83,0.34l4.44,4.44c0.57,0.57,1.03,0.37,1.03-0.43V2.7c0-0.8-0.46-0.99-1.03-0.42L6.15,6.71 C5.97,6.9,5.59,7.05,5.33,7.05H1.45C0.65,7.05,0,7.71,0,8.51v6.78C0,16.09,0.65,16.74,1.45,16.74" />
                    <path d="M21.06,11.9c0-2.19-0.69-4.32-1.98-6.1c-1.26-1.74-3.03-3.06-5.06-3.79l-0.46-0.16c-0.25-0.09-0.38-0.37-0.29-0.62l0.33-0.91 c0.09-0.25,0.37-0.38,0.62-0.29l0.45,0.16c2.4,0.85,4.49,2.41,5.98,4.47C22.18,6.77,23,9.3,23,11.9c0,2.6-0.82,5.13-2.35,7.23 c-1.5,2.06-3.58,3.62-5.98,4.48l-0.45,0.16c-0.25,0.09-0.53-0.04-0.62-0.29l-0.33-0.91c-0.09-0.25,0.04-0.53,0.29-0.62l0.46-0.16 c2.03-0.72,3.8-2.04,5.06-3.79C20.37,16.22,21.06,14.09,21.06,11.9 M23,11.9" />
                    <path d="M13.91,6.93l-0.43-0.22c-0.11-0.06-0.2-0.16-0.24-0.28c-0.04-0.12-0.03-0.25,0.03-0.37L13.7,5.2 c0.12-0.24,0.41-0.33,0.65-0.21l0.43,0.22c1.26,0.63,2.34,1.58,3.13,2.75c0.79,1.17,1.21,2.54,1.22,3.95 c-0.01,1.41-0.43,2.78-1.22,3.95c-0.79,1.17-1.87,2.11-3.13,2.74l-0.43,0.22c-0.24,0.12-0.53,0.02-0.65-0.21l-0.44-0.86 c-0.12-0.24-0.02-0.53,0.21-0.65l0.43-0.22c0.97-0.49,1.79-1.21,2.4-2.1c0.57-0.85,0.88-1.84,0.88-2.86c0-1.02-0.31-2.02-0.88-2.86 C15.7,8.14,14.88,7.42,13.91,6.93" />
                </svg>
                <span><?= __('Sound on', 'piranha');?></span>
            </a>
        <?php endif;?>
        <?php if($video):?>
            <video src="<?= $video;?>" autoplay muted loop playsinline></video>
        <?php endif;?>
    </div>
    <div class="text">
        <?php if($subtitle):?>
            <p>
                <?= $subtitle;?>
            </p>
        <?php endif;?>
        <?php if($title):?>
            <div class="title-animated">
                <h1>
                    <?php foreach($title as $word):
                        if($word['word']){
                            echo '<span>'.$word['word'].'</span>';
                        }
                    endforeach;?>
                </h1>
            </div>
        <?php endif;?>
    </div>
    <div class="section-panel">
        <?php $linkd = get_field('download_link', 'options');

        if( $linkd ):
            $linkd_url = $linkd['url'];
            $linkd_title = $linkd['title'];
            $linkd_target = $linkd['target'] ? $linkd['target'] : '_self';
            ?>
            <div class="link-wrapper"><a class="ico-link" href="<?= esc_url($linkd_url); ?>" target="<?= esc_attr($linkd_target); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                        <g>
                            <path d="M7,10.5c-0.23,0-0.46-0.09-0.62-0.26l-3.5-3.5C2.58,6.4,2.6,5.88,2.93,5.56c0.32-0.32,0.84-0.35,1.18-0.05L7,8.39 l2.88-2.87c0.35-0.3,0.86-0.28,1.18,0.05c0.32,0.32,0.35,0.84,0.05,1.18l-3.5,3.5C7.45,10.41,7.23,10.5,7,10.5" fill="#3da9ff" />
                            <path d="M7,10.5c-0.48,0-0.88-0.39-0.88-0.88V0.88C6.12,0.39,6.52,0,7,0c0.48,0,0.88,0.39,0.88,0.88v8.75 C7.88,10.11,7.48,10.5,7,10.5 M13.12,14H0.88C0.39,14,0,13.61,0,13.13c0-0.48,0.39-0.88,0.88-0.88h12.25 c0.48,0,0.88,0.39,0.88,0.88C14,13.61,13.61,14,13.12,14" fill="#3da9ff" />
                        </g>
                    </svg>
                    <?= esc_html($linkd_title); ?>
                </a>
            </div>
        <?php endif; ?>

        <a href="#" class="scroll-link"><?= __('Scroll down', 'piranha');?></a>

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
</section>