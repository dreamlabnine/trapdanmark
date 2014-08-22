<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package TrapDanmark
 */

$titan = TitanFramework::getInstance( 'trapdanmark' );
?>

	</div><!-- #content -->

	<div class="site-sub-footer col-xs-12">
		<?php echo $titan->getOption('sub_footer_text'); ?>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-xs-6">
			<p><?php echo $titan->getOption('footer_copyright'); ?></p>
		</div>
		<div class="col-xs-6 pull-right">
			<p style="text-align: right; font-size: <?php echo $titan->getOption('footer_made_by_size'); ?>px;"><?php echo $titan->getOption('footer_made_by'); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
