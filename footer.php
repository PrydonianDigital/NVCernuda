
<footer role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<div class="wrapper">
		<div class="footer">
			<ul class="sidebar menu vertical text-left">
				<?php if ( ! dynamic_sidebar('footer1') ) : ?>
					<li>{static sidebar item 1}</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="footer">
			<ul class="sidebar menu vertical text-left">
				<?php if ( ! dynamic_sidebar('footer2') ) : ?>
					<li>{static sidebar item 1}</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="footer">
			<ul class="sidebar menu vertical text-left">
				<?php if ( ! dynamic_sidebar('footer3') ) : ?>
					<li>{static sidebar item 1}</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<div class="wrapper">
		<div class="copyright">
			&copy; <?php echo date('Y'); ?> <?php bloginfo('title'); ?>
		</div>
	</div>
</footer>
<script>
var $buoop = {vs:{i:12,f:-4,o:-4,s:8,c:-4},api:4};
function $buo_f(){
	var e = document.createElement("script");
	e.src = "//browser-update.org/update.min.js";
	document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
</script>
<?php wp_footer(); ?>

</body>
</html>