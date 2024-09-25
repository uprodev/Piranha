<?php

/*

Template Name: News

*/

get_header();

$main_news = get_field('main_news');
$three_news = get_field('three_news');
$articles_title = get_field('articles_title');
$articles = get_field('articles');

$title_news = get_field('title_news');
$subtitle_news = get_field('subtitle_news');
$news_about = get_field('news_about');

?>

    <section class="news-section-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 fade-in">
                    <h2><?php the_title();?></h2>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-8 col-xl-7 pe-xl-0">
                    <div class="row">
                        <div class="col-md-8">
                            <?php if($main_news):?>

                                <div class="news-item news-item--featured">
                                    <div class="h4 fade-in"><?= get_the_title($main_news); ?></div>
                                    <div class="item-image fade-in">
                                        <a href="<?= get_permalink($main_news);?>"><img src="<?= get_the_post_thumbnail_url($main_news);?>" alt="" /></a>
                                    </div>
                                </div>

                            <?php endif;?>
                        </div>
                    </div>
                    <?php if($three_news):?>
                        <div class="news-list">
                            <div class="row">
                                <?php foreach( $three_news as $post): setup_postdata($post); ?>

                                    <div class="col-md-4">
                                        <div class="news-item">
                                            <div class="item-image fade-in">
                                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" alt="" /></a>
                                            </div>
                                            <div class="item-text fade-in">
                                                <p><?php the_title(); ?></p>
                                                <a href="<?php the_permalink(); ?>" class="link-more">
                                                    <?= __('Read more', 'piranha');?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
                                                        <path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <div class="col-lg-4 d-flex justify-content-lg-end">
                    <div class="article-list">
                        <?php if($articles_title):?>
                            <div class="fade-in">
                                <h4><?= $articles_title;?></h4>
                            </div>
                        <?php endif;?>

                        <?php if($articles):
                            foreach( $articles as $post): setup_postdata($post); ?>

                                <div class="article-item fade-in">
                                    <em><?= time_ago(get_the_ID());?></em>
                                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    <em><?= __('By', 'piranha') . ' ' . get_the_author();?></em>
                                </div>

                            <?php endforeach; wp_reset_postdata();
                        endif;?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news-section-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fade-in text-primary">
                        <?= $subtitle_news?'<h4>'. $subtitle_news.'</h4>':'';?>

                        <?= $title_news?'<h2>'. $title_news.'</h2>':'';?>
                    </div>
                </div>

                <?php if($news_about):?>

                    <div class="col-lg-8 col-xl-6">

                        <?php foreach( $news_about as $post): setup_postdata($post);

                            get_template_part('parts/news-item');

                        endforeach; wp_reset_postdata(); ?>

                    </div>

                <?php endif;?>

            </div>
        </div>
    </section>

<?php get_footer();
