			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="wrapper">
				<?php
					if(get_the_ID() != 10 && !is_page_template('page-secondary.php')){

				?>
				<section id="get_started">
					<h3 class="mainheader">Ready to Get Started?</h3>
					<a href="/?p=10" class="button">GET IN TOUCH</a>
				</section>
				<?php
					}
				?>

				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. 
					<div class="creds">Designed by <a href="http://interfused-inc.com">Interfused</a></div>
				</p>
				<!-- /copyright -->
			</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
