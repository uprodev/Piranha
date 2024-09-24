<?php

/*

Template Name: Contacts

*/

get_header();

$mail = get_field('mail');

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
                        <div id="map" data-lat="49.80528372958007" data-lng="23.987265797303625" data-icon="images/pin.png"></div>
                    </div>
                    <div class="contact-info fade-in-wrapper">
                        <h3>Location</h3>
                        <ul>
                            <li>
                                <h4>Country</h4>
                                Ukraine
                            </li>
                            <li>
                                <h4>City</h4>
                                Lviv
                            </li>
                            <li>
                                <h4>Street</h4>
                                Naukova, 99
                            </li>
                            <li>
                                <h4>Phone number</h4>
                                <a href="tel:+380963228273">+38 096 322 8 273</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 offset-lg-2">
                    <div class="tabs">
                        <ul class="nav nav-tabs d-xl-flex align-items-end" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1Nav" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Contact form</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2Nav" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><span>Service@piranha-tech.net</span> Service maintenance</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                <div class="contact-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-field">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-field">
                                                    <label for="email" class="form-label">E-mail address</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Your E-mail address" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-field">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" id="message" placeholder="Your message..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><span data-text="Submit >">Submit ></span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <div class="contact-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-field">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-field">
                                                    <label for="email" class="form-label">E-mail address</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Your E-mail address" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-field">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" id="message" placeholder="Your message..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><span data-text="Submit >">Submit ></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();