<?php $options = get_desing_plus_option(); ?>

 </div><!-- END #main_content -->

 <a id="return_top" href="#header"><?php _e('Return Top', 'tcd-w'); ?></a>

<?php if($options['show_bookmark']) { ?>
<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php }; ?>

<?php wp_footer(); ?>
</body>
</html>