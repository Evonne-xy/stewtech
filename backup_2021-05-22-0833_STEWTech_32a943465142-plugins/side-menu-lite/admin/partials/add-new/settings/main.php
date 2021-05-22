<?php
/**
 * Main Settings param
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

include_once( 'icons.php' );
$icons_new = array();
foreach ( $icons as $key => $value ) {
  $icons_new[ $value ] = $value;
}

// Position of the menu
$menu = array(
  'id'     => 'position',
  'name'   => 'param[menu]',
  'type'   => 'select',
  'val'    => isset( $param[ 'menu' ] ) ? $param[ 'menu' ] : 'left',
  'option' => array(
    'left' => __( 'Left', $this->plugin['text'] ),
    'right' => __( 'Right', $this->plugin['text'] ),
  ),
);

// Menu position help
$menu_help = array (
  'text' => __('Specify menu position on screen.', $this->plugin['text']),
);

// Menu Vertical alignment
$align = array(
	'name'   => 'param[align]',
	'id'     => 'align',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['align'] ) ? $param['align'] : 'center',
	'option' => array(
		'center' => __( 'Center', $this->plugin['text'] ),
	),
  'disabled' => 'disabled',
);

// Menu Vertical alignment help
$align_help = array (
  'text' => __('Specify the vertical positioning of the menu.', $this->plugin['text']),
);

// Offset from start position
$margin = array(
  'name'   => 'param[margin]',
  'id'     => 'margin',
  'type'   => 'number',
  'val'    => isset( $param[ 'margin' ] ) ? $param[ 'margin' ] : '0',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '10',
    'disabled'    => 'disabled',
  ),
);

$margin_help = array (
  'text' => __('Offset from base position on screen in (px).', $this->plugin['text']),
);

// Menu item Width
$width = array(
  'name'   => 'param[width]',
  'id'     => 'width',
  'type'   => 'number',
  'val'    => isset( $param[ 'width' ] ) ? $param[ 'width' ] : '240',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '240',
  ),
);

$width_help = array (
  'text' => __('The width of the menu items when hovering on the element in (px).', $this->plugin['text']),
);

// Menu item height
$height = array(
  'name'   => 'param[height]',
  'id'     => 'height',
  'type'   => 'number',
  'val'    => isset( $param[ 'height' ] ) ? $param[ 'height' ] : '40',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '40',
  ),
);

$height_help = array (
  'text' => __('The height of the menu items in (px).', $this->plugin['text']),
);

// Space between items
$gap = array(
  'name'   => 'param[gap]',
  'id'     => 'gap',
  'type'   => 'number',
  'val'    => isset( $param[ 'gap' ] ) ? $param[ 'gap' ] : '2',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '2',
  ),
);

$gap_help = array (
  'text' => __('The height of the menu items in (px).', $this->plugin['text']),
);

// Font size 
$fontsize = array(
  'name'   => 'param[fontsize]',
  'id'     => 'fontsize',
  'type'   => 'number',
  'val'    => isset( $param[ 'fontsize' ] ) ? $param[ 'fontsize' ] : '24',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '24',
  ),
);

// Font size helper
$fontsize_help = array (
  'text' => __('Set the font size for label content in px', $this->plugin['text']),
);


// Font Style
$fontstyle = array(
  'id'   => 'fontstyle',
  'name' => 'param[fontstyle]',
  'type' => 'select',
  'val' => isset( $param['fontstyle'] ) ? $param['fontstyle'] : 'normal',
  'option' => array (
    'normal' => 'Normal',
  ),
  'disabled' => true,
);

// Font weight
$fontweight = array(
	'name'   => 'param[fontweight]',
	'id'     => 'fontweight',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['fontweight'] ) ? $param['fontweight'] : '',
	'option' => array(
		'normal' => __( 'Normal', $this->plugin['text'] ),
	),
  'disabled' => true,
);

// Icon size
$iconsize = array(
  'name'   => 'param[iconsize]',
  'id'     => 'iconsize',
  'type'   => 'number',
  'val'    => isset( $param[ 'iconsize' ] ) ? $param[ 'iconsize' ] : '24',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '24',
  ),
);

$iconsize_help = array (
  'text' => __('Set the size for icon in px', $this->plugin['text']),
);


// Custom image width
$iwidth = array(
  'name'   => 'param[iwidth]',
  'id'     => 'iwidth',
  'type'   => 'number',
  'val'    => isset( $param[ 'iwidth' ] ) ? $param[ 'iwidth' ] : '',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '0',
    'disabled'    => 'disabled',
  ),
  'func'   => '',
  'sep'    => '',
);

$iwidth_help = array (
  'text' => __('Set the size for Custom icon in px', $this->plugin['text']),
);

// Border width (px)
$bwidth = array(
  'name'   => 'param[bwidth]',
  'id'     => 'bwidth',
  'type'   => 'number',
  'val'    => isset( $param[ 'bwidth' ] ) ? $param[ 'bwidth' ] : '0',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '0',
  ),
);

$bwidth_help = array (
  'text' => __('Set the border width for menu items in px', $this->plugin['text']),
);

// Border radius top
$bradiustop = array(
  'name'   => 'param[bradiustop]',
  'id'     => 'bradiustop',
  'type'   => 'number',
  'val'    => isset( $param[ 'bradiustop' ] ) ? $param[ 'bradiustop' ] : '0',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '0',
    'disabled'    => 'disabled',
  ),
);

$bradiustop_help = array (
  'text' => __('Set the radius for the menu item top corner in px', $this->plugin['text']),
);

// Border radius bottom
$bradiusbottom = array(
  'name'   => 'param[bradiusbottom]',
  'id'     => 'bradiusbottom',
  'type'   => 'number',
  'val'    => isset( $param[ 'bradiusbottom' ] ) ? $param[ 'bradiusbottom' ] : '0',
  'option' => array(
    'min'         => '0',
    'max'         => '60',
    'step'        => '1',
    'placeholder' => '0',    
    'disabled'    => 'disabled',
  ),
  'func'   => '',
  'sep'    => '',
);

$bradiusbottom_help = array (
  'text' => __('Set the radius for the menu item bottom corner in px', $this->plugin['text']),
);

// Border color
$bcolor = array(
  'name' => 'param[bcolor]',
  'id'   => 'bcolor',
  'type' => 'color',
  'val'  => isset( $param[ 'bcolor' ] ) ? $param[ 'bcolor' ] : '#rgba(0,0,0,0.75)',
  'sep'  => '',
);

$bcolor_help = array (
  'text' => __('Set the border color', $this->plugin['text']),
);

// Shadow help
$shadow_help = array(
	'text' => esc_attr__( 'If there should be a shadow on buttons.', 'side-menu' ),
);

// Z-index
$zindex = array(
	'name'   => 'param[zindex]',
	'type'   => 'number',
	'val'    => isset( $param['zindex'] ) ? round( $param['zindex'] ) : '9',
	'option' => array(
		'min'         => '0',
		'step'        => '1',
		'placeholder' => '9',
	),
);

// Z-index helper
$zindex_help = array(
	'text' => esc_attr__( 'The z-index property specifies the stack order of an element. An element with greater stack order is always in front of an element with a lower stack order.',
		'side-menu' ),
);

// Connect helper
$connect_help = array(
	'text' => esc_attr__( 'Show all items on hover. All elements are connected in one block.', 'side-menu' ),
);