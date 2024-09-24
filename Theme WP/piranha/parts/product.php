<?php

$img = get_field('second_image');

?>

<div class="col-md-4">
    <div class="item">
        <div class="item-image">
            <a href="<?php the_permalink();?>">
                <?php if(has_post_thumbnail()):?>
                    <span class="image-visible">
                        <img src="<?php the_post_thumbnail_url();?>" alt="<?= esc_html(get_the_title());?>" />
                    </span>
                <?php endif;?>
                <?php if($img):?>
                    <span class="image-overlay">
                        <img src="<?= $img['url'];?>" alt="<?= esc_html(get_the_title());?>" />
                    </span>
                <?php endif;?>
            </a>
        </div>
        <a href="<?php the_permalink();?>" class="item-text"><?php the_title();?></a>
    </div>
</div>
