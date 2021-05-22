<?php
/**
 * Main Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'settings/main.php' );

?>

<div class="container">
  <div class="element">
		<?php _e( 'Position', $this->plugin['text'] ); ?><?php echo self::tooltip( $menu_help ); ?><br/>
		<?php echo self::option( $menu ); ?>

  </div>
  <div class="element">
		<?php _e( 'Vertical alignment', $this->plugin['text'] ); ?>
    <?php echo self::tooltip( $align_help ); ?>
    <?php echo self::pro(); ?>
    <br/>
		<?php echo self::option( $align ); ?>
  </div>
  <div class="element">
		<?php _e( 'Offset', $this->plugin['text'] ); ?>
    <?php echo self::tooltip( $margin_help ); ?>
    <?php echo self::pro(); ?>
    <br/>
		<?php echo self::option( $margin ); ?>
  </div>
</div>

<div class="container">
  <div class="element">
		<?php _e( 'Item Height', $this->plugin['text'] ); ?><?php echo self::tooltip( $height_help ); ?><br/>
		<?php echo self::option( $height ); ?>
  </div>
  <div class="element">
		<?php _e( 'Space between items', $this->plugin['text'] ); ?><?php echo self::tooltip( $gap_help ); ?><br/>
		<?php echo self::option( $gap ); ?>
  </div>
    <div class="element">
	    <?php _e( 'Shadow', $this->plugin['text'] ); ?><?php echo self::tooltip( $shadow_help ); ?> <?php echo self::pro(); ?>
        <select disabled>
            <option>No</option>
        </select>

    </div>
</div>

<div class="container">
  <div class="element">
		<?php _e( 'Font size', $this->plugin['text'] ); ?><?php echo self::tooltip( $fontsize_help ); ?><br/>
		<?php echo self::option( $fontsize ); ?>
  </div>
  <div class="element">
		<?php _e( 'Font style', $this->plugin['text'] ); ?>
    <?php echo self::pro(); ?>
    <br/>
		<?php echo self::option( $fontstyle ); ?>
  </div>
  <div class="element">
    <?php _e( 'Font weight', $this->plugin['text'] ); ?>
    <?php echo self::pro(); ?>
    <br/>
    <?php echo self::option( $fontweight ); ?>
  </div>
</div>

<div class="container">
  <div class="element">
		<?php _e( 'Icon size', $this->plugin['text'] ); ?><?php echo self::tooltip( $iconsize_help ); ?><br/>
		<?php echo self::option( $iconsize ); ?>
  </div>
    <div class="element">
		<?php esc_attr_e( 'Z-index', 'side-menu' ); ?><?php echo self::tooltip( $zindex_help ); ?>
		<?php echo self::option( $zindex ); ?>
    </div>
  <div class="element">
    <?php _e( 'Border width', $this->plugin['text'] ); ?><?php echo self::tooltip( $bwidth_help ); ?><br/>
    <?php echo self::option( $bwidth ); ?>
  </div>
</div>

<div class="container">
  <div class="element">
		<?php _e( 'Top border radius', $this->plugin['text'] ); ?>
    <?php echo self::tooltip( $bradiustop_help ); ?>
    <?php echo self::pro(); ?>
    <br/>
		<?php echo self::option( $bradiustop ); ?>
  </div>
  <div class="element">
		<?php _e( 'Bottom border radius', $this->plugin['text'] ); ?>
    <?php echo self::tooltip( $bradiusbottom_help ); ?>
    <?php echo self::pro(); ?>
    <br/>
		<?php echo self::option( $bradiusbottom ); ?>
  </div>
  <div class="element">
    <?php _e( 'Border color', $this->plugin['text'] ); ?><?php echo self::tooltip( $bcolor_help ); ?><br/>
    <?php echo self::option( $bcolor ); ?>
  </div>
</div>

<div class="container">
    <div class="element">
		<?php esc_attr_e( 'Connect all Items', 'side-menu' ); ?><?php echo self::tooltip( $connect_help ); ?>
	    <?php echo self::pro(); ?>
        <select disabled>
            <option>No</option>
        </select>
    </div>
    <div class="element hold-open">

    </div>
    <div class="element">

    </div>
</div>


