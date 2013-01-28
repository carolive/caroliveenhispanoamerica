<ul class="commentlist">
  <?php wp_list_comments( array( 'callback' => 'carolive_comment' ) ); ?>
</ul>
<?php comment_form(); ?>