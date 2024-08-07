<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container">
            <?php if(!(wp_is_mobile())){ ?>
            <div class="site-header-desktop">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<p>' . get_bloginfo('name') . '</p>';
                    }
                    ?>
                </div>
                <nav>
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                </nav>
                <div>
                    <?php
                    $button_text = get_theme_mod('book_a_tour_text', 'Book a Tour');
                    $button_url = get_theme_mod('book_a_tour_url', '');
                    if ($button_url) {
                    echo '<a href="' . esc_url($button_url) . '" class="book-a-tour-button">';
                        echo esc_html($button_text);
                        echo '</a>';
                    }
                    ?>
                </div>
            </div>
            <?php } else{ ?>
                <div class="site-header-mobile">
                    <div class="site-branding">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<p>' . get_bloginfo('name') . '</p>';
                        }
                        ?>
                    </div>
                    <div class="menu-toggle">
                        <button class="toggle-btn-open">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none">
                                <path d="M3 7H21" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M3 12H21" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M3 17H21" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mobile-menu-container">
                        <div class="menu-close-btn">
                            <button class="toggle-btn-open">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><g><path d="M505.922,476.567L285.355,256L505.92,35.435c8.106-8.105,8.106-21.248,0-29.354c-8.105-8.106-21.248-8.106-29.354,0    L256.001,226.646L35.434,6.081c-8.105-8.106-21.248-8.106-29.354,0c-8.106,8.105-8.106,21.248,0,29.354L226.646,256L6.08,476.567    c-8.106,8.106-8.106,21.248,0,29.354c8.105,8.105,21.248,8.106,29.354,0l220.567-220.567l220.567,220.567    c8.105,8.105,21.248,8.106,29.354,0S514.028,484.673,505.922,476.567z"/></g></g></svg>
                            </button>
                        </div>
                        <nav>
                            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                        </nav>
                    </div>
                </div>
            <?php } ?>
        </div>
    </header>