<?php

/*

Template Name: Contacts

*/

get_header();

$mail = get_field('mail');
$map = get_field('map');
$lat = $map['lat'];
$lng = $map['lng'];

$location_title = get_field('location_title');
$location_info = get_field('location_info');

$form_title_1 = get_field('form_title_1');
$form_1 = get_field('form_1');
$form_title_2 = get_field('form_title_2');
$form_2 = get_field('form_2');
$service_mail = get_field('service_mail');

?>

    <section class="block-contact">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="fade-in-wrapper">
                        <h1 class="h2"><?php the_title();?></h1>
                        <?php if($mail):?>
                            <h4><a href="mailto:<?= $mail;?>"><?= $mail;?></a></h4>
                        <?php endif;?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 offset-lg-1">
                    <div class="contact-map fade-in">
                        <div id="map" data-lat="<?= $lat?$lat:'49.80528372958007';?>" data-lng="<?= $lat?$lat:'23.987265797303625';?>" data-icon="<?= get_template_directory_uri();?>/images/pin.png"></div>
                    </div>
                    <div class="contact-info fade-in-wrapper">
                        <?php if($location_title):?>
                            <h3><?= $location_title;?></h3>
                        <?php endif;?>
                        <?php if($location_info):?>
                            <ul>
                                <?php foreach($location_info as $li):?>
                                    <li>
                                        <h4><?= $li['title'];?></h4>
                                        <?= $li['value'];?>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 offset-lg-2">
                    <div class="tabs">
                        <ul class="nav nav-tabs d-xl-flex align-items-end" role="tablist">
                            <?php if($form_1):?>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1Nav" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><?= $form_title_1;?></a>
                                </li>
                            <?php endif;?>
                            <?php if($form_2):?>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2Nav" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><?= $service_mail?'<span>'.$service_mail.'</span>':'';?> <?= $form_title_2;?></a>
                                </li>
                            <?php endif;?>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <?php if($form_1):?>
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <div class="contact-form">
                                        <?= do_shortcode('[contact-form-7 id="'.$form_1.'"]');?>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php if($form_2):?>
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="contact-form">
                                        <?= do_shortcode('[contact-form-7 id="'.$form_2.'"]');?>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();