<?php 
//add custom field
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5fa6f929c9fe7',
        'title' => 'Setting',
        'fields' => array(
            array(
                'key' => 'field_5fa6f93c58feb',
                'label' => 'post type',
                'name' => 'post_type',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'local' => 'Local',
                    'world' => 'World',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5fa6fa25963a3',
                'label' => 'Locations',
                'name' => 'locations',
                'type' => 'checkbox',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'main_posts' => 'Main Post',
                    'feature_posts' => 'Features',
                ),
                'allow_custom' => 0,
                'default_value' => array(
                ),
                'layout' => 'vertical',
                'toggle' => 0,
                'return_format' => 'value',
                'save_custom' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
endif;

//Note to the admin to install ACF Advanced Custom Fields
if( !function_exists( 'the_field' ) ) {
    add_action( 'admin_notices', 'my_acf_notice' );
  }
  function my_acf_notice() {
    ?>
    <div class="update-nag notice">
        <p><?php _e( 'Please install <a href="https://wordpress.org/plugins/advanced-custom-fields/">Advanced Custom Fields</a>, it is required for this theme to work properly!', 'my_plugin_textdomain' ); ?></p>
    </div>
    <?php
  }
?>