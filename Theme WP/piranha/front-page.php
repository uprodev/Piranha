<?php

get_header();

$video = get_field('video2');
$description = get_field('description');
$button_sound = get_field('video_sound2');
$news_description = get_field('news_description');
$default_news = get_field('default_news');
$news = get_field('news');
$i = 1;

$title_products = get_field('title_products');

?>

    <section class="home-section-1">
        <div class="container-fluid">
            <?php if($description):?>
                <div class="text animated-color"><?= $description;?></div>
            <?php endif;?>
            <div class="video">
                <?php if($button_sound):?>
                    <a href="#" class="ico-link btn-sound">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 23.79">
                            <path d="M1.45,16.74h3.87 c0.27,0,0.64,0.15,0.83,0.34l4.44,4.44c0.57,0.57,1.03,0.37,1.03-0.43V2.7c0-0.8-0.46-0.99-1.03-0.42L6.15,6.71 C5.97,6.9,5.59,7.05,5.33,7.05H1.45C0.65,7.05,0,7.71,0,8.51v6.78C0,16.09,0.65,16.74,1.45,16.74" />
                            <path d="M21.06,11.9c0-2.19-0.69-4.32-1.98-6.1c-1.26-1.74-3.03-3.06-5.06-3.79l-0.46-0.16c-0.25-0.09-0.38-0.37-0.29-0.62l0.33-0.91 c0.09-0.25,0.37-0.38,0.62-0.29l0.45,0.16c2.4,0.85,4.49,2.41,5.98,4.47C22.18,6.77,23,9.3,23,11.9c0,2.6-0.82,5.13-2.35,7.23 c-1.5,2.06-3.58,3.62-5.98,4.48l-0.45,0.16c-0.25,0.09-0.53-0.04-0.62-0.29l-0.33-0.91c-0.09-0.25,0.04-0.53,0.29-0.62l0.46-0.16 c2.03-0.72,3.8-2.04,5.06-3.79C20.37,16.22,21.06,14.09,21.06,11.9 M23,11.9" />
                            <path d="M13.91,6.93l-0.43-0.22c-0.11-0.06-0.2-0.16-0.24-0.28c-0.04-0.12-0.03-0.25,0.03-0.37L13.7,5.2 c0.12-0.24,0.41-0.33,0.65-0.21l0.43,0.22c1.26,0.63,2.34,1.58,3.13,2.75c0.79,1.17,1.21,2.54,1.22,3.95 c-0.01,1.41-0.43,2.78-1.22,3.95c-0.79,1.17-1.87,2.11-3.13,2.74l-0.43,0.22c-0.24,0.12-0.53,0.02-0.65-0.21l-0.44-0.86 c-0.12-0.24-0.02-0.53,0.21-0.65l0.43-0.22c0.97-0.49,1.79-1.21,2.4-2.1c0.57-0.85,0.88-1.84,0.88-2.86c0-1.02-0.31-2.02-0.88-2.86 C15.7,8.14,14.88,7.42,13.91,6.93" />
                        </svg>
                        <span class="txt-on"><?= __('Sound on', 'piranha');?></span>
                        <span class="txt-off"><?= __('Sound off', 'piranha');?></span>
                    </a>
                <?php endif;?>
                <?php if($video):?>
                    <video src="<?= $video;?>" autoplay muted loop playsinline></video>
                <?php endif;?>
            </div>
        </div>
    </section>

    <section class="home-section-2">
        <div class="container-fluid">
            <?php if($news_description):?>
                <div class="text animated-text-lines">
                    <p><?= $news_description;?></p>
                </div>
            <?php endif;?>
            <div class="news-list">
                <div class="row">
                    <?php if($default_news):
                        $news_def = new WP_Query([
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'desc',
                        ]);

                        $n = '';

                        while($news_def->have_posts()): $news_def->the_post();
                            if($i==1){
                                $n=4;
                            }elseif($i==2){
                                $n=3;
                            }else{
                                $n=5;
                            }?>
                                <div class="col-md-4 col-lg-<?= $n;?>">
                                        <?php if($i==3):?>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="news-item">
                                                        <div class="item-image fade-in">
                                                            <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url();?>" alt="" /></a>
                                                        </div>
                                                        <div class="item-text fade-in">
                                                            <?php the_excerpt();?>
                                                            <a href="<?php the_permalink();?>" class="link-more">
                                                                <?= __('Read more', 'piranha');?>
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
                                                                    <path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else:?>
                                            <div class="news-item">
                                                <div class="item-image fade-in">
                                                    <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url();?>" alt="" /></a>
                                                </div>
                                                <div class="item-text fade-in">
                                                    <?php the_excerpt();?>
                                                    <a href="<?php the_permalink();?>" class="link-more">
                                                        <?= __('Read more', 'piranha');?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
                                                            <path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                    </div>
                            <?php $i++; endwhile; wp_reset_postdata(); $i = 1;

                    else:
                        if($news):
                            $n = '';
                            foreach( $news as $post):setup_postdata($post);
                                if($i==1){
                                    $n=4;
                                }elseif($i==2){
                                    $n=3;
                                }else{
                                    $n=5;
                                }?>

                                <div class="col-md-4 col-lg-<?= $n;?>">
                                    <?php if($i==3):?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="news-item">
                                                    <div class="item-image fade-in">
                                                        <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url();?>" alt="" /></a>
                                                    </div>
                                                    <div class="item-text fade-in">
                                                        <?php the_excerpt();?>
                                                        <a href="<?php the_permalink();?>" class="link-more">
                                                            <?= __('Read more', 'piranha');?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
                                                                <path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else:?>
                                        <div class="news-item">
                                            <div class="item-image fade-in">
                                                <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url();?>" alt="" /></a>
                                            </div>
                                            <div class="item-text fade-in">
                                                <?php the_excerpt();?>
                                                <a href="<?php the_permalink();?>" class="link-more">
                                                    <?= __('Read more', 'piranha');?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
                                                        <path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                </div>

                            <?php $i++;endforeach; wp_reset_postdata(); $i = 1;
                        endif;
                    endif;?>
                </div>
            </div>
        </div>
    </section>

    <section id="products" class="home-section-3">
        <div class="container-fluid fade-in">
            <?php if($title_products):?>
                <div class="text-center">
                    <h2><?= $title_products;?></h2>
                </div>
            <?php endif;?>

            <?php $prods = new WP_Query([
                'post_type' => 'product',
                'posts_per_page' => -1,
                'suppress_filters' => false,
            ]);

            if($prods->have_posts()):?>
                <div class="product-list">
                    <div class="row">
                        <?php while($prods->have_posts()): $prods->the_post();

                            get_template_part('parts/product');

                        endwhile; wp_reset_postdata();?>

                    </div>
                </div>
            <?php endif;?>
        </div>
    </section>

<?php get_footer();
