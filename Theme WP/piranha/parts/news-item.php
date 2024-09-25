<div class="news-item">
    <div class="h4 fade-in"><?php the_title(); ?></div>
    <div class="d-md-flex">
        <div class="item-image fade-in">
            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" alt="" /></a>
        </div>
        <div class="item-text fade-in">
            <?php the_excerpt();?>
            <a href="<?php the_permalink(); ?>" class="link-more">
                <?= __('Read more', 'piranha');?>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
                    <path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
                </svg>
            </a>
        </div>
    </div>
</div>
