</main>

<footer class="footer">
    <div class="container-fluid">
        <div class="footer-main">
            <div class="footer-logo">
                <a href="<?= get_home_url();?>">
                    <?php $logo = get_field('footer_logo', 'options');
                    if($logo):?>
                        <img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>" />
                    <?php endif;?>
                </a>
            </div>
            <nav class="footer-menu">
                <?php wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => '',
                ]);?>
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="footer-panel bg-primary text-white">
                    <?php wp_nav_menu([
                        'theme_location' => 'footer-bottom',
                        'container' => false,
                        'menu_class' => '',
                    ]);?>
                    <div class="copyright"><?php the_field('copyright', 'options');?> <?= date('Y'); ?></div>
                    <?php if(get_field('social_networks', 'options')):?>
                        <div class="socials">
                            <ul>
                                <?php foreach(get_field('social_networks', 'options') as $sn):
                                    $linksn = $sn['link'];

                                    if( $linksn ):
                                        $linksn_url = $linksn['url'];
                                        $linksn_title = $linksn['title'];
                                        $linksn_target = $linksn['target'] ? $linksn['target'] : '_self';
                                        ?>
                                        <li>
                                            <a href="<?= esc_url($linksn_url); ?>" target="<?= esc_attr($linksn_target); ?>">
                                                <img src="<?= $sn['icon']['url'];?>" alt="<?= $sn['icon']['alt'];?>" />
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

  <?php wp_footer(); ?>
	</body>
</html>
