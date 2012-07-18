<?

// echo get_option( 'mytheme_settings_my-textarea-option' );


$settings_prefix = "custom_settings_";
$settings_fields = array();

$settings_fields = array(
    array(
        'type' => 'start'
    ),
    array(
        'type' => 'icon'
    ),
    array(
        'type' => 'title',
        'value' => 'Spanglish Baby Custom Settings'
    ),
    array(
        'type' => 'form-start'
    ),
    array(
        'type' => 'section-start',
        'heading' => 'Homepage Settings'
    ),
    array(
        'type' => 'textarea',
        'name' => $settings_prefix .'social-intro',
        'label' => 'Intro text for the social icons'/*,
        'description' => 'This textarea will control some other configurable option',
        'std' => 'Multiple lines of text go here'*/
    ),
    array(
        'type' => 'section-end'
    ),
    array(
        'type' => 'section-start',
        'heading' => 'Sidebar Settings'
    ),
    array(
        'type' => 'textarea',
        'name' => $settings_prefix .'main-sidebar-intro',
        'label' => 'Intro text for the main sidebar'/*,
        'description' => 'This textarea will control some other configurable option',
        'std' => 'Multiple lines of text go here'*/
    ),
    array(
        'type' => 'textarea',
        'name' => $settings_prefix .'find-sidebar-megusta',
        'label' => 'Text for the Me Gusta seal'/*,
        'description' => 'This textarea will control some other configurable option',
        'std' => 'Multiple lines of text go here'*/
    ),
    array(
        'type' => 'textarea',
        'name' => $settings_prefix .'food-sidebar-header',
        'label' => 'Text for the Food Sidebar header'/*,
        'description' => 'This textarea will control some other configurable option',
        'std' => 'Multiple lines of text go here'*/
    ),
    array(
        'type' => 'section-end'
    ),
    array(
        'type' => 'form-end'
    ),
    array(
        'type' => 'end'
    )
);

add_action('admin_menu',$settings_prefix . 'menu');
function custom_settings_menu() {
    global $settings_prefix;
    add_menu_page('Custom Settings','Custom Settings','manage_options','custom-settings',$settings_prefix . 'render_fields','',36);
    add_action('admin_init',$settings_prefix . 'register');
}

function custom_settings_register() {
    global $settings_fields,$settings_prefix;
    foreach ( $settings_fields as $field ) {
        if ( isset($field['name']) ) {
            register_setting($settings_prefix . 'group',$field['name']);
        }
    }
}

function custom_settings_render_fields() {
    global $settings_fields,$settings_prefix;
    foreach ( $settings_fields as $field ) {
        switch( $field['type'] ) {
            case 'start':?>
                <div class="wrap"><?php
                break;
            case 'end':?>
                </div><!-- .wrap --><?php
                break;
            case 'icon':?>
                <div id="icon-options-general" class="icon32">
                    <br />
                </div><?php
                break;
            case 'title':?>
                <h2><?php echo $field['value']; ?></h2><?php
                break;
            case 'form-start':?>
                <form method="post" action="options.php">
                <?php
                settings_fields($settings_prefix . 'group');
                do_settings_sections($settings_prefix . 'group');
                break;
            case 'form-end':?>
                    <p class="submit">
                        <input type="submit" class="button-primary" value="Save Changes" />
                    </p>
                </form><?php
                break;
            case 'section-start':?>
                <h3><?php echo $field['heading']; ?></h3>
                <table class="form-table"><tbody><?php
                break;
            case 'section-end':?>
                </tbody></table><?php
                break;
            case 'text':?>
                 <tr valign="top">
                    <th scope="row">
                        <?php $for = $field['name']; ?>
                        <label for="<?php echo $for; ?>"><?php echo esc_html($field['label']); ?></label>
                    </th>
                    <td>
                        <input type="text" class="regular-text" value="<?php if ( $opt = get_option($field['name']) ) { echo $opt; } else { echo $field['std']; } ?>" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" />
                        <?php if ( isset($field['description']) ): ?>
                        <span class="description"><?php echo esc_html($field['description']); ?></span>
                        <?php endif; ?>
                    </td>
                 </tr><?php
                break;
            case 'textarea':?>
                <tr valign="top">
                    <th scope="row">
                        <?php $for = $field['name']; ?>
                        <label for="<?php echo $for; ?>"><?php echo $field['label']; ?></label>
                    </th>
                    <td>
                        <textarea class="large-text" rows="" cols="" name="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>"><?php if ( $opt = get_option($field['name']) ) { echo stripslashes($opt); } else { echo $field['std']; }  ?></textarea>
                        <?php if ( isset($field['description']) ): ?>
                        <span class="description"><?php echo esc_html($field['description']); ?></span>
                        <?php endif; ?>
                    </td>
                </tr><?php
                break;
        }
    }
}
?>