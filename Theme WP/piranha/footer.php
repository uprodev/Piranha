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
                <ul>
                    <li><a href="#">Anti-Drone Rifle</a></li>
                    <li><a href="#">Directed ew Series-T</a></li>
                    <li><a href="#">Dome EW</a></li>
                    <li><a href="#">Stationary EW</a></li>
                    <li><a href="#">Complex EW</a></li>
                    <li><a href="#">News</a></li>
                </ul>
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="footer-panel bg-primary text-white">
                    <ul>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Terms of service</a></li>
                    </ul>
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
