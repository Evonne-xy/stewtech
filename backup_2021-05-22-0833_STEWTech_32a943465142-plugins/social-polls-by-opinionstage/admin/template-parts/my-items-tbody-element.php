<?php
/**
 * Table Element on My Items page
 *
 * @package OpinionStageWordPressPlugin
 */

?>
<tbody>
<tr class="settingBorderOs">
	<td class="image">
		<a href="<?php echo esc_url( $item['attributes']['landing-page-url'] ); ?>" target="_blank">
			<div class="content-item-image quiz">
				<img height="90" src="<?php echo esc_url( $item['attributes']['image-url'] ); ?>" width="120">
				<div class="content-item-label"><?php echo esc_html( $item['attributes']['type'] ); ?></div>
			</div>
		</a>
	</td>
	<td class="long">
		<div><a
				href="<?php echo esc_url( $item['attributes']['edit-url'] ); ?>"
				class="opinionstage-item-title"
				target="_blank"><?php echo esc_html( $item['attributes']['title'] ); ?></a>
			<table>
				<tbody>
				<tr>
					<td><span class="os-icon-plugin icon-os-common-date"></span>
						<div class="label"><?php echo esc_html( gmdate( 'j F Y', strtotime( $item['attributes']['updated-at'] ) ) ); ?></div>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</td>
	<td class="action">
		<div class="opinionstage-item-action-container">
			<a href="#"
				class="opinionstage-blue-bordered-btn opinionstage-edit-content opinionstage-open-modal"
				data-shortcode='<?php echo esc_attr( htmlspecialchars( $item['attributes']['shortcode'], ENT_QUOTES ) ); ?>'> <?php esc_html_e( 'Add To Site', 'social-polls-by-opinionstage' ); ?> </a>
			<a href="<?php echo esc_url( $item['attributes']['edit-url'] ); ?>"
				class="opinionstage-blue-bordered-btn opinionstage-edit-content "
				target="_blank"> <?php esc_html_e( 'Edit', 'social-polls-by-opinionstage' ); ?> </a>
			<a href="<?php echo esc_url( $item['attributes']['stats-url'] ); ?>"
				class="opinionstage-blue-bordered-btn opinionstage-edit-content "
				target="_blank"> <?php esc_html_e( 'Results', 'social-polls-by-opinionstage' ); ?> </a>
		</div>
	</td>
</tr>
</tbody>
