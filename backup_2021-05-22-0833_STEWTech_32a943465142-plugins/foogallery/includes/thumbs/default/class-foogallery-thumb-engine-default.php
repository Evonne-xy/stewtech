<?php

/**
 * Class for the default thumbnail engine in FooGallery
 */
if ( ! class_exists( 'FooGallery_Thumb_Engine_Default' ) ) {

	class FooGallery_Thumb_Engine_Default extends FooGallery_Thumb_Engine {

		/**
		 * The last error that was encounted
		 * @var mixed
		 */
		private $last_error;

		public function init() {
			add_filter( 'wp_image_editors', array( $this, 'override_image_editors' ), 999 );
			add_filter( 'deleted_post', array( $this, 'delete_cache_folder_for_attachment' ), 10, 2 );
			add_action( 'foogallery_admin_menu_after', array( $this, 'add_test_thumb_menu' ) );

			//add background fill functionality
			new FooGallery_Thumb_Generator_Background_Fill();
		}

		/**
		 * Registers the test thumb menu and page
		 */
		function add_test_thumb_menu() {
			//register the menu and page
			foogallery_add_submenu_page( 'Thumbnail Generation Tests', 'manage_options', 'foogallery_thumb_test', array( $this, 'render_thumb_test_page' ) );

			//hide the menu, but still keep the page registered so it can be rendered
			remove_submenu_page( foogallery_admin_menu_parent_slug(), 'foogallery_thumb_test' );
		}

		/**
		 * renders a bunch of thumb tests
		 */
		function render_thumb_test_page() {
			echo '<h2>Thumbnail Test Page</h2>';

			$this->render_thumb_test_html( FOOGALLERY_URL . 'includes/thumbs/default/tests/test3', 'PNG+No extension Resize to 30x30', 30, 30 );
			$this->render_thumb_test_html( FOOGALLERY_URL . 'includes/thumbs/default/tests/test1.png', 'PNG Resize to 50x50' );
			$this->render_thumb_test_html( FOOGALLERY_URL . 'includes/thumbs/default/tests/test2.png?test=1&another=true', 'PNG+Querystring Resize to 40x40', 40, 40 );

			$this->render_thumb_test_html( FOOGALLERY_URL . 'includes/thumbs/default/tests/test4.gif', 'GIF Resize to 50x50' );
			$this->render_thumb_test_html( FOOGALLERY_URL . 'includes/thumbs/default/tests/test5.jpg', 'JPG Resize to 50x50' );
			$this->render_thumb_test_html( FOOGALLERY_URL . 'includes/thumbs/default/tests/test6.bmp', 'BMP Resize to 50x50' );

			$this->render_thumb_test_html( 'https://s3.amazonaws.com/foocdn/test.jpg', 'Remote Resize to 50x50' );
			$this->render_thumb_test_html( FooGallery_Thumbnails::find_first_image_in_media_library(), 'Media Resize to 50x50' );

			$this->render_thumb_test_html( 'https://fooplugins.s3.amazonaws.com/test.php', 'Remote test for non image' );
		}

		/**
		 * Renders a single thumb test
		 *
		 * @param     $url
		 * @param     $title
		 * @param int $width
		 * @param int $height
		 */
		function render_thumb_test_html( $url, $title, $width = 50, $height = 50) {
			if ( $url === false ) {
				return;
			}

			$engine = foogallery_thumb_active_engine();

			//always clear the cache for the file
			$engine->clear_local_cache_for_file( $url );

			$resize_url = $engine->generate( $url, array(
				'width'  => $width,
				'height' => $height,
				'crop'   => true
			) );

			echo '<h3>' . $title . '</h3>';
			echo 'original : <code>' . $url . '</code><br />';
			echo 'result : <code>' . $resize_url . '</code><br /><br />';

			if ( isset( $engine->last_error ) ) {
				print_r( $engine->last_error );
			} else {
				echo '<img src="' . $url . '" />';
				echo '&nbsp;&nbsp;&nbsp;→→→&nbsp;&nbsp;&nbsp;';
				echo '<img src="' . $resize_url . '" />';
			}

			echo '<br />';
		}

		/**
		 * The default engine uses a local cache to store thumbnails
		 *
		 * @return bool
		 */
		public function has_local_cache() {
			return true;
		}

		/**
		 * Generates the thumbnail and returns the thumb URL
		 *
		 * @param       $url
		 * @param array $args
		 *
		 * @return string|void
		 */
		function generate( $url, $args = array() ) {
			$generator = new FooGallery_Thumb_Generator( $url, $args );
			$result = $generator->generate();
			$this->last_error = $generator->error();
			return $result;
		}

		/**
		 * Returns the last error that was encountered
		 * @return mixed
		 */
		function get_last_error() {
			return $this->last_error;
		}

		/**
		 * Delete the cache directory for a file
		 *
		 * @param $file
		 */
		public function clear_local_cache_for_file( $file ) {
			$thumb = new FooGallery_Thumb_Generator( $file );
			$directory = $thumb->get_cache_file_directory();

			if ( false === $directory ) {
				return;
			}

			//use the WP FileSystem to remove the folder recursively
			$fs = foogallery_wp_filesystem();
			if ( $fs !== false ) {
				$fs->rmdir( $directory, true );
			}
		}

		/**
		 * Overrides the editors to make sure the FooGallery thumb editors are included
		 *
		 * @param $editors
		 * @return array
		 */
		function override_image_editors( $editors ) {

			require_once( FOOGALLERY_PATH . '/includes/thumbs/default/class-foogallery-thumb-image-editor-gd.php' );
			require_once( FOOGALLERY_PATH . '/includes/thumbs/default/class-foogallery-thumb-image-editor-imagick.php' );

			$image_editors = array();

			//replace the default image editors with the FooGallery Thumb image editors
			foreach ( $editors as $editor ) {
				switch ( $editor ) {
					case 'WP_Image_Editor_Imagick':
						$image_editors[] = 'FooGallery_Thumb_Image_Editor_Imagick';
						break;
					case 'WP_Image_Editor_GD':
						$image_editors[] = 'FooGallery_Thumb_Image_Editor_GD';
						break;
					default:
						$image_editors[] = $editor;
				}
			}

			//Make sure the order is correct
			if ( foogallery_get_setting( 'force_gd_library', false ) ) {
				array_splice( $image_editors, 0, 0, array('FooGallery_Thumb_Image_Editor_GD') );
			}

			//make sure we have a unique list of editors
			return array_unique( $image_editors );
		}

		/**
		 * Hook into deleted_post and delete the associated cache file folder for an attachment
		 *
		 * @param string $post_id
		 *
		 * @return string
		 */
		function delete_cache_folder_for_attachment( $post_id, $post ) {
			$url = wp_get_attachment_url( $post_id );

			if ( $url !== false ) {
				$this->clear_local_cache_for_file( $url );
			}
		}
	}
}