<?php
$logo = get_fields('option');

?>
<footer class="footer">
        <span class="footer-bg"></span>
        <img class="footer-logo" src="<?php echo $logo['footer']['url'] ?>" />
</footer>
<?php wp_footer(); ?>
</body>
</html>
