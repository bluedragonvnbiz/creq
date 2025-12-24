<input type="hidden" id="verify-token" value="<?php echo wp_create_nonce("vrf".CURRENT_USER_ID) ?>">
<?php wp_footer(); ?>
</body>
</html>