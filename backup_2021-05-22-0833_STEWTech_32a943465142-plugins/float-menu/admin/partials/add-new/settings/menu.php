<?php
/**
 * Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


$count_i = (!empty( $param[ 'menu_1' ][ 'item_icon' ] )) ? count( $param[ 'menu_1' ][ 'item_icon' ] ) : '0';
if ( $count_i > 0 ) {
  for ( $i = 0; $i < $count_i; $i++ ) {

    // Order of the menu
//    $item_order_[ $i ] = array (
//    	'name' => 'param[item_order][]',
//    	'id'   => 'item_order',
//    	'type' => 'hidden',
//    	'val'  => isset( $param['item_order'][ $i ] ) ? $param['item_order'][ $i ] : '',
//    );

    // Icon
    $item_icon_[ $i ] = array(
      'name'   => 'param[menu_1][item_icon][]',
      'class'  => 'icons',
      'type'   => 'select',
      'val'    => isset( $param[ 'menu_1' ][ 'item_icon' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_icon' ][ $i ] : 'fas fa-hand-point-up',
      'option' => $icons_new,
    );

    // Select custom icon
    $item_custom_[ $i ] = array(
      'name'  => 'param[menu_1][item_custom][]',
      'type'  => 'checkbox',
      'class' => 'custom-icon',
      'val'   => isset( $param[ 'menu_1' ][ 'item_custom' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_custom' ][ $i ] : 0,
      'func'  => 'customicon(this);',
      'disabled' => 'disabled',
    );

    // Custom icon URL
    $item_custom_link_[ $i ] = array(
      'name'   => 'param[menu_1][item_custom_link][]',
      'type'   => 'text',
      'class'  => 'custom-icon-url',
      'val'    => isset( $param[ 'menu_1' ][ 'item_custom_link' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_custom_link' ][ $i ] : '',
      'option' => array(
        'placeholder' => __( 'Enter Icon URL', $this->plugin['text'] ),
      ),
    );

    // Label for item
    $item_tooltip_[ $i ] = array(
      'name'  => 'param[menu_1][item_tooltip][]',
      'class' => 'item-tooltip',
      'type'  => 'text',
      'val'   => isset( $param[ 'menu_1' ][ 'item_tooltip' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_tooltip' ][ $i ] : '',
    );

    // Sub item
    $item_sub_[ $i ] = array(
      'name'  => 'param[menu_1][item_sub][]',
      'type'  => 'checkbox',
      'val'   => isset( $param[ 'menu_1' ][ 'item_sub' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_sub' ][ $i ] : '',
      'disabled' => 'disabled',
    );

//    $smooth = isset( $param[ 'menu_1' ][ 'scroll' ][ $i ] ) ? $param[ 'menu_1' ][ 'scroll' ][ $i ] : '';

    // Type of the item
    $item_type_[ $i ] = array(
      'name'   => 'param[menu_1][item_type][]',
      'type'   => 'select',
      'class'  => 'item-type',
      'val'    => isset( $param[ 'menu_1' ][ 'item_type' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_type' ][ $i ] : 'link',
      'option' => array(
        'link'         => __( 'Link', $this->plugin['text'] ),
      ),
      'func'   => 'itemtype(this);',
    );


    // Link URL
    $item_link_[ $i ] = array(
      'name' => 'param[menu_1][item_link][]',
      'type' => 'text',
      'val'  => isset( $param[ 'menu_1' ][ 'item_link' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_link' ][ $i ] : '',
    );


    // Open link in a new window
    $new_tab_[ $i ] = array(
      'name'  => 'param[menu_1][new_tab][]',
      'class' => '',
      'type'  => 'checkbox',
      'val'   => isset( $param[ 'menu_1' ][ 'new_tab' ][ $i ] ) ? $param[ 'menu_1' ][ 'new_tab' ][ $i ] : 0,
      'func'  => '',
      'sep'   => '',
    );

    // Smooth scroll
//    $scroll_[ $i ] = array(
//      'name'  => 'param[menu_1][scroll][]',
//      'class' => '',
//      'type'  => 'checkbox',
//      'val'   => isset( $param[ 'menu_1' ][ 'scroll' ][ $i ] ) ? $param[ 'menu_1' ][ 'scroll' ][ $i ] : 0,
//      'func'  => '',
//      'sep'   => '',
//    );

    // Social Networks
    $item_share_[ $i ] = array(
      'name'   => 'param[menu_1][item_share][]',
      'type'   => 'select',
      'val'    => isset( $param[ 'menu_1' ][ 'item_share' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_share' ][ $i ] : '',
      'option' => array(
        'Facebook'      => __( 'Facebook', $this->plugin['text'] ),
        'VK'            => __( 'VK', $this->plugin['text'] ),
        'Twitter'       => __( 'Twitter', $this->plugin['text'] ),
        'Linkedin'      => __( 'Linkedin', $this->plugin['text'] ),
        'Odnoklassniki' => __( 'Odnoklassniki', $this->plugin['text'] ),
        'Google'        => __( 'Google', $this->plugin['text'] ),
        'Pinterest'     => __( 'Pinterest', $this->plugin['text'] ),
        'xing'          => __( 'XING', $this->plugin['text'] ),
        'myspace'       => __( 'Myspace', $this->plugin['text'] ),
        'weibo'         => __( 'Weibo', $this->plugin['text'] ),
        'buffer'        => __( 'Buffer', $this->plugin['text'] ),
        'stumbleupon'   => __( 'StumbleUpon', $this->plugin['text'] ),
        'reddit'        => __( 'Reddit', $this->plugin['text'] ),
        'tumblr'        => __( 'Tumblr', $this->plugin['text'] ),
        'blogger'       => __( 'Blogger', $this->plugin['text'] ),
        'livejournal'   => __( 'LiveJournal', $this->plugin['text'] ),
        'pocket'        => __( 'Pocket', $this->plugin['text'] ),
        'telegram'      => __( 'Telegram', $this->plugin['text'] ),
        'skype'         => __( 'Skype', $this->plugin['text'] ),
        'email'         => __( 'Email', $this->plugin['text'] ),
      ),
      'func'   => '',
    );

    // Modal
    $item_modal_[ $i ] = array(
      'name' => 'param[menu_1][item_modal][]',
      'type' => 'text',
      'val'  => isset( $param[ 'menu_1' ][ 'item_modal' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_modal' ][ $i ] : '',
    );

    // Font color
    $color_[ $i ] = array(
      'name' => 'param[menu_1][color][]',
      'type' => 'color',
      'val'  => isset( $param[ 'menu_1' ][ 'color' ][ $i ] ) ? $param[ 'menu_1' ][ 'color' ][ $i ] : '#ffffff',
    );

    // Icon Сolor
//    $iconcolor_[ $i ] = array(
//      'name' => 'param[menu_1][iconcolor][]',
//      'type' => 'color',
//      'val'  => isset( $param[ 'menu_1' ][ 'iconcolor' ][ $i ] ) ? $param[ 'menu_1' ][ 'iconcolor' ][ $i ] : '#ffffff',
//    );

    // Background
    $bcolor_[ $i ] = array(
      'name' => 'param[menu_1][bcolor][]',
      'type' => 'color',
      'val'  => isset( $param[ 'menu_1' ][ 'bcolor' ][ $i ] ) ? $param[ 'menu_1' ][ 'bcolor' ][ $i ] : '#128be0',
    );

    // Background Hover
//    $hbcolor_[ $i ] = array(
//      'name' => 'param[menu_1][hbcolor][]',
//      'type' => 'color',
//      'val'  => isset( $param[ 'menu_1' ][ 'hbcolor' ][ $i ] ) ? $param[ 'menu_1' ][ 'hbcolor' ][ $i ] : '#128be0',
//    );
//
    $button_id_[ $i ] = array(
      'name' => 'param[menu_1][button_id][]',
      'type' => 'text',
      'val'  => isset( $param[ 'menu_1' ][ 'button_id' ][ $i ] ) ? $param[ 'menu_1' ][ 'button_id' ][ $i ] : '',
    );

    $button_class_[ $i ] = array(
      'name' => 'param[menu_1][button_class][]',
      'type' => 'text',
      'val'  => isset( $param[ 'menu_1' ][ 'button_class' ][ $i ] ) ? $param[ 'menu_1' ][ 'button_class' ][ $i ] : '',
    );

    // Hold open item when menu load
    $hold_open_[ $i ] = array(
      'name'  => 'param[menu_1][hold_open][]',
      'class' => '',
      'type'  => 'checkbox',
      'val'   => isset( $param[ 'menu_1' ][ 'hold_open' ][ $i ] ) ? $param[ 'menu_1' ][ 'hold_open' ][ $i ] : 0,
      'func'  => '',
      'sep'   => '',
      'disabled' => 'disabled',
    );

  }

}


$item_icon_help = array (
  'title' => __('Set the icon for menu item. If you want use the custom item:', $this->plugin['text']),
  'ul' => array (
    __('1. Check the box on "custom"', $this->plugin['text']),
    __('2. Upload the icon in Media Library', $this->plugin['text']),
    __('3. Copy the URL to icon', $this->plugin['text']),
    __('4. Paste the icon URL to field', $this->plugin['text']),
  ),
);

$item_tooltip_help = array(
  'text' => __( 'Set the text for menu item.', $this->plugin['text'] ),
);

$item_type_help = array(
	'title' => __( 'Types of the button which can be select', $this->plugin['text'] ),
	'ul'    => array(
		__( 'Link - insert any link', $this->plugin['text'] ),
		__( 'Share - share the page in selected social network', $this->plugin['text'] ),
		__( 'Print - print the page', $this->plugin['text'] ),
		__( 'Scroll to Top - go to header of the site', $this->plugin['text'] ),
		__( 'Go Back - the previous URL in the history list', $this->plugin['text'] ),
		__( 'Go Forward - the next URL in the history list', $this->plugin['text'] ),
		__( 'Smooth Scroll - scroll the page to the element with ID', $this->plugin['text'] ),
	),
);

$hold_open_help = array(
  'text' => __('When the page loads, the menu item will open.', $this->plugin['text']),
);

$button_id_help = array(
  'text' => __('Set the attribute ID for the menu item or left empty.', $this->plugin['text']),
);

$button_class_help = array(
  'text' => __('Set the attribute CLASS for the menu item or left empty.', $this->plugin['text']),
);

$item_sub_help = array(
  'text' => __('Set item as sub item for first item of the menu.', $this->plugin['text']),
);