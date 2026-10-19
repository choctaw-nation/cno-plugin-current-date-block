<?php
/**
 * The current date
 *
 * @package ChoctawNation
 * @var array $attributes The block attributes.
 */

$today       = new DateTime( 'now', wp_timezone() );
$a11y_format = $attributes['format'] === 'Y' ? 'Y' : 'Y-m-d';
$block_props = get_block_wrapper_attributes( array( 'datetime' => $today->format( $a11y_format ) ) );
?>
<time <?php echo $block_props; ?>>
	<?php echo $today->format( $attributes['format'] ); ?>
</time>