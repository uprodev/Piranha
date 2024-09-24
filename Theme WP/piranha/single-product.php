<?php

get_header();

$code = get_field('code');
$img = get_field('second_image');
$description = get_field('description');
$button_1 = get_field('button_1');
$button_2 = get_field('button_2');

?>

    <section class="product-header">
        <div class="container-fluid">
            <div class="link-back-wrapper fade-in">
                <a href="<?= get_home_url();?>#products" class="link-back">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
                        <path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
                    </svg>
                    <?= __('Back to catalog', 'piranha');?>
                </a>
            </div>
            <div class="text fade-in">
                <div class="row align-items-end">
                    <div class="col-lg-5">
                        <h1 class="h3"><?php the_title();?></h1>
                    </div>
                    <div class="col-lg-7">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-details">
        <div class="container-fluid">
            <?php if($code):?>
                <h2 class="h4"><?= $code;?></h2>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-images">
                        <?php if(has_post_thumbnail()):?>
                            <figure>
                                <span><img src="<?php the_post_thumbnail_url();?>" alt="<?= esc_html(get_the_title());?>" /></span>
                            </figure>
                        <?php endif;?>
                        <?php if($img):?>
                            <figure>
                                <span>
                                    <img src="<?= $img['url'];?>" alt="<?= esc_html(get_the_title());?>" />
                                </span>
                            </figure>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if($description): $i=1;?>
                        <div class="accordion fade-in-wrapper" id="accordion">
                            <?php foreach ($description as $item):?>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i;?>" aria-expanded="false" aria-controls="collapse<?= $i;?>"><?= $item['name'];?></button>
                                    </h4>
                                    <div id="collapse<?= $i;?>" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <?= $item['description'];?>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++; endforeach;?>
                        </div>
                    <?php endif;?>
                    <div class="buttons fade-in-wrapper">
                        <?php if( $button_1 ):
                            $button_1_url = $button_1['url'];
                            $button_1_title = $button_1['title'];
                            $button_1_target = $button_1['target'] ? $button_1['target'] : '_self';
                            ?>
                            <a class="btn btn-primary btn-lg" href="<?= esc_url($button_1_url); ?>" target="<?= esc_attr($button_1_target); ?>">
                                <span data-text="<?= esc_html($button_1_title); ?>">
                                    <?= esc_html($button_1_title); ?>
                                </span>
                            </a>
                        <?php endif; ?>
                        <?php if( $button_2 ):
                            $button_2_url = $button_2['url'];
                            $button_2_title = $button_2['title'];
                            $button_2_target = $button_2['target'] ? $button_2['target'] : '_self';
                            ?>
                            <a class="btn btn-dark btn-lg" href="<?= esc_url($button_2_url); ?>" target="<?= esc_attr($button_2_target); ?>">
                                <span data-text="<?= esc_html($button_2_title); ?>">
                                    <?= esc_html($button_2_title); ?>
                                </span>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();
