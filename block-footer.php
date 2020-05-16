<?php
echo "";?>
	<footer>	
		<div id="footer-wrapper">
			<div id="header-logo">
				<!--  CONTENT ELEMENT, uid:140/html [begin] -->
				<div id="c140" class="csc-default">
					<!--  Raw HTML content: [begin] -->
					<a href="homepage.php">MEDICAL & PHARMA PROMOTION, s.r.o.<span></span></a>
					<!--  Raw HTML content: [end] -->
				</div>
				<!--  CONTENT ELEMENT, uid:140/html [end] -->
			</div>
			<div id="footer-right">Copyright &copy; 2016 - <?php echo date("Y"); ?> <a href="mailto:maleklukas@mampocitace.cz">Lukáš Málek</a> for MEDICAL &amp; PHARMA PROMOTION, s.r.o.</div>
		</div>	
	</footer>
<?php
echo "
	<!-- JavaScript -->
	<script src=\"http://code.jquery.com/jquery-1.12.0.min.js\"></script>
	<script src=\"$crm_link/js/menu.js\"></script>
	<script src=\"$crm_link/js/jquery.flexslider-min.js\"></script>
	<script src=\"$crm_link/js/lightbox.js\"></script>
	<script src=\"$crm_link/js/flexslider.js\"></script>
	<script src=\"$crm_link/js/zebra_datepicker.js\"></script>
    <script src=\"$crm_link/js/datepicker.js\"></script>
	";
	ob_end_flush();
?>