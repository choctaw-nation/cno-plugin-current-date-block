<?php
/**
 * The current date
 *
 * @package ChoctawNation
 * @var array $attributes The block attributes.
 */

$today       = new DateTime( 'now', wp_timezone() );
$block_props = get_block_wrapper_attributes( array( 'datetime' => $today->format( 'U' ) ) );
?>
<time <?php echo $block_props; ?>>
	<?php echo $today->format( $attributes['format'] ); ?>
</time>
