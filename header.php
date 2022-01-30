<header class="header<?php if(is_front_page() && is_home() && !is_paged()) : ?> home_header home_header--anime<?php endif; ?>">
<div class="header__inner c-wrap_page">
<h1 class="h1 header__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="SFOOL"></a></h1>

<div class="header__text p-pixel_mplus_12"><span class="header__text__border"><?php bloginfo('description'); ?></span></div>

<?php if(is_front_page() && is_home() && !is_paged()) : ?><a href="#main" class="header__arrow header__arrow--anime"></a><?php endif; ?>

<!-- end .header__inner -->
</div>
<!-- end .header -->
</header>