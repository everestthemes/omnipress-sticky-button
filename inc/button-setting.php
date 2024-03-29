<?php
// Add settings page
function omipressfb_menu() {
    add_menu_page('Omipress Floating Button Settings', 'Omipress Floating Button', 'manage_options', 'omipressfb-settings', 'omipressfb_settings_page');
}

add_action('admin_menu', 'omipressfb_menu');

// Initialize settings
function omipressfb_initialize_settings() {
    for ($i = 1; $i <= 3; $i++) {
        add_option('omipressfb_button_' . $i . '_label', 'Button ' . $i);
        add_option('omipressfb_button_' . $i . '_link', '#');
        add_option('omipressfb_button_' . $i . '_icon', 'dashicons-layout');
    }
}

register_activation_hook(__FILE__, 'omipressfb_initialize_settings');

// Settings page content
function omipressfb_settings_page() {
    ?>
    <div class="wrap">
        <h2>Omipress Floating Button Settings</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('omipressfb_settings');
            do_settings_sections('omipressfb_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Settings fields
function omipressfb_settings_fields() {
    for ($i = 1; $i <= 3; $i++) {
        add_settings_section('omipressfb_button_' . $i . '_section', 'Button ' . $i . ' Settings', '', 'omipressfb_settings');
        add_settings_field('omipressfb_button_' . $i . '_label', 'Label', 'omipressfb_render_field', 'omipressfb_settings', 'omipressfb_button_' . $i . '_section', array('label_for' => 'omipressfb_button_' . $i . '_label', 'field_id' => 'omipressfb_button_' . $i . '_label'));
        add_settings_field('omipressfb_button_' . $i . '_link', 'Link', 'omipressfb_render_field', 'omipressfb_settings', 'omipressfb_button_' . $i . '_section', array('label_for' => 'omipressfb_button_' . $i . '_link', 'field_id' => 'omipressfb_button_' . $i . '_link'));
        add_settings_field('omipressfb_button_' . $i . '_icon', 'Dashicon Name', 'omipressfb_render_field', 'omipressfb_settings', 'omipressfb_button_' . $i . '_section', array('label_for' => 'omipressfb_button_' . $i . '_icon', 'field_id' => 'omipressfb_button_' . $i . '_icon'));
        register_setting('omipressfb_settings', 'omipressfb_button_' . $i . '_label');
        register_setting('omipressfb_settings', 'omipressfb_button_' . $i . '_link');
        register_setting('omipressfb_settings', 'omipressfb_button_' . $i . '_icon');
    }
}


add_action('admin_init', 'omipressfb_settings_fields');

// Render settings field
function omipressfb_render_field($args) {
    $field_id = $args['field_id'];
    $value = get_option($field_id);
    ?>
    <input type="text" id="<?php echo esc_attr($args['label_for']); ?>" name="<?php echo esc_attr($field_id); ?>" value="<?php echo esc_attr($value); ?>" class="regular-text" />
    <?php
}
