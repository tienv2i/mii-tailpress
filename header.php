<header class="bg-white shadow"></header>
    <div class="mx-auto relative h-24 md:h-64">
        <?php if (has_header_image( )): ?>
        <div class="header-image-container overflow-hidden w-full h-full absolute">
            <img 
                src="<?php header_image(); ?>"
                alt="Header image"
            />
        </div>
        <?php endif; ?>
        <div class="site-branding flex items-center absolute pt-2 md:pt-8 w-full h-full">
            <div class="w-full text-center">
                <h1 class="font-semibold text-xl sm:text-4xl"><?php bloginfo( 'name' ); ?></h1>
                <?php bloginfo('description'); ?>
            </div>
        </div>
    </div>
    <nav class="navbar bg-black text-white font-semibold" x-data="{ open: false}">
        <div class="navbar-container flex flex-col md:flex-row items-center max-w-screen-lg mx-auto ">
            <div class="flex w-full md:w-auto">
                <?php if (has_custom_logo()):
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                <div class="flex items-center p-2 logo-container">
                    <img src="<?= esc_url($logo[0]) ?>" class="h-12"/>
                </div>
                <?php endif; ?>
                <div class="flex items-center md:hidden ml-auto mr-4">
                    <a href='#' class="flex" @click="open = !open">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php 
        if (has_nav_menu( 'primary' )):
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => '',
                'items_wrap' => "<ul id=\"%1\$s\" class=\"%2\$s\" :class=\"open ? '' : 'hidden'\">%3\$s</ul>",
                'menu_class' => 'md:flex flex-col md:flex-row space-y-2 md:space-y-0 space-x-0 md:space-x-2 h-full w-full md:w-auto',
                'walker' => new Tailwind_Navwalker()
            ));
        endif; 
        ?>
        </div>
    </nav>
</header>
