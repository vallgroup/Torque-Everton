<?php

require_once( get_template_directory() . '/includes/acf/torque-acf-search-class.php' );

class Everton_ACF {

  public function __construct() {
    add_action('admin_init', array( $this, 'acf_admin_init'), 99);
    add_action('acf/init', array( $this, 'acf_init' ) );

    // hide acf in admin - client doesnt need to see this
    // add_filter('acf/settings/show_admin', '__return_false');

    // add acf fields to wp search
    if ( class_exists( 'Torque_ACF_Search' ) ) {
      add_filter( Torque_ACF_Search::$ACF_SEARCHABLE_FIELDS_FILTER_HANDLE, array( $this, 'add_fields_to_search' ) );
    }
  }

  public function acf_admin_init() {
    // hide options page
    // remove_menu_page('acf-options');
  }

  public function add_fields_to_search( $fields ) {
    // $fields[] = 'custom_field_name';
    return $fields;
  }

  public function acf_init() {
    // add content sections here
    if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array(
        'key' => 'group_5f5c23955b158',
        'title' => 'Everton Options',
        'fields' => array(
          array(
            'key' => 'field_5f5c239bd9e3e',
            'label' => 'General',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
          ),
          array(
            'key' => 'field_5f5c23a7d9e3f',
            'label' => 'Address',
            'name' => 'address',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 4,
            'new_lines' => 'br',
          ),
          array(
            'key' => 'field_5f5c23e5c73e2',
            'label' => 'Phone',
            'name' => 'phone',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5f5c23f0c73e3',
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
          array(
            'key' => 'field_5f5c2460770e9',
            'label' => 'Header',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
          ),
          array(
            'key' => 'field_5f5c2466770ea',
            'label' => 'Drawer Menu CTA',
            'name' => 'drawer_menu_cta',
            'type' => 'link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
          ),
          array(
            'key' => 'field_5f5d9a39100c0',
            'label' => 'Footer',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
          ),
          array(
            'key' => 'field_5f5d9a41100c1',
            'label' => 'Office Hours',
            'name' => 'office_hours',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'row',
            'button_label' => 'Add hours',
            'sub_fields' => array(
              array(
                'key' => 'field_5f5d9b3e100c2',
                'label' => 'Details',
                'name' => 'details',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'M-F: 7am-6pm',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'options_page',
              'operator' => '==',
              'value' => 'acf-options',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
      ));
      
      acf_add_local_field_group(array(
        'key' => 'group_5f5d81fe484a1',
        'title' => 'Header Module',
        'fields' => array(
          array(
            'key' => 'field_5f5d8208da691',
            'label' => 'Enable Hero?',
            'name' => 'enable_hero',
            'type' => 'true_false',
            'instructions' => 'If enabled, set the Featured Image in the module provided to the right.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'page',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
      ));
      
      acf_add_local_field_group(array(
        'key' => 'group_5f5da4c702868',
        'title' => 'Content Modules',
        'fields' => array(
          array(
            'key' => 'field_5f5da4cbfdcd1',
            'label' => 'Content Modules',
            'name' => 'content_modules',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'layouts' => array(
              '5f5da4f5cf2ef' => array(
                'key' => '5f5da4f5cf2ef',
                'name' => 'cta_banner',
                'label' => 'CTA Banner',
                'display' => 'block',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5f5da4fafdcd2',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '40',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5f5da503fdcd3',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '60',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                  ),
                  array(
                    'key' => 'field_5f5da50afdcd4',
                    'label' => 'Button',
                    'name' => 'button',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '100',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'array',
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
            ),
            'button_label' => 'Add Row',
            'min' => '',
            'max' => '',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'page',
            ),
          ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
      ));
      
    endif;
  }
}

?>
