<?php
/**
 * Clone Elements Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Elements for clone Menu 1
$menu_1_item_icon = array(
	'name'  => 'param[menu_1][item_icon][]',
	'class' => 'icons',
	'type'  => 'select',
	'val'   => 'fas fa-hand-point-up',
	'option' => $icons_new,
);

$menu_1_item_tooltip = array(
	'name'  => 'param[menu_1][item_tooltip][]',
	'class' => 'item-tooltip',
	'type'  => 'text',
	'val'   => '',
);

$menu_1_item_type = array(
  'name'   => 'param[menu_1][item_type][]',
  'type'   => 'select',
  'val'    => 'link',
  'class'  => 'item-type',
  'option' => array(
    'link'         => __( 'Link', $this->plugin['text'] ),
  ),
  'func'   => 'itemtype(this);',
);

$menu_1_item_link = array(
  'name' => 'param[menu_1][item_link][]',
  'type' => 'text',
  'val'  => '',
);

$menu_1_new_tab = array(
  'name'  => 'param[menu_1][new_tab][]',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => '',
);


$menu_1_button_id = array (
	'name' => 'param[menu_1][button_id][]',
	'type' => 'text',
	'val'  => '',
);

$menu_1_button_id_help = array (
	'text' => __( 'Set ID for element.', $this->plugin['text'] ),
);

$menu_1_button_class = array (
	'name' => 'param[menu_1][button_class][]',
	'type' => 'text',
	'val'  => '',
);

$menu_1_button_class_help = array (
	'title' => __( 'Set Class for element.', $this->plugin['text'] ),
	'ul' => array(
		__( 'You may enter several classes separated by a space.', $this->plugin['text'] ),
	)
);

$menu_1_hold_open = array(
  'name'  => 'param[menu_1][hold_open][]',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => '',
  'disabled'    => 'disabled',
);