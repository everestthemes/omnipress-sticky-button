<?php
// Add the sticky buttons to the page
function omipressfb_add_sticky_buttons() {
    ?>
    <div id="omipressfb-buttons-container" class="omnipress-fb-wrapper">
        <ul>
        <?php
        for ($i = 1; $i <= 3; $i++) {
            $label = get_option('omipressfb_button_' . $i . '_label');
            $link = get_option('omipressfb_button_' . $i . '_link');
            $icon = get_option('omipressfb_button_' . $i . '_icon');
            ?>
            <li>
                <a href="<?php echo esc_url($link); ?>" class="omipressfb-button" target="_blank">
                    <i class="fb-icon dashicons <?php echo esc_attr($icon); ?>"></i>

                    <span class="fb-icon-label"><?php echo esc_html($label); ?></span>
                </a>
            </li>
            <?php
        }
        ?>

    </div>
    <?php
}

add_action('wp_footer', 'omipressfb_add_sticky_buttons');
