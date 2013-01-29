<ul class="commentlist">
  <?php wp_list_comments( array( 'callback' => 'carolive_comment' ) ); ?>
</ul>


<?php
$comment_args = array(
	'title_reply' => __( 'Ajouter un commentaire' ),
	'label_submit' => __( 'Envoyer' ),
	'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="68" rows="15" aria-required="true"></textarea></p>',
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logué en tant que <a href="%1$s">%2$s</a>. <a href="%3$s" title="Cliquer ici pour se déconnecter">Deconnexion</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><label for="author">' . __( 'Nom', 'domainreference' ) . ( $req ? ' (champ obligatoire)' : '' ) . '</label></p>',
		'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><label for="email">' . __( 'Mail', 'domainreference' ) . ' (votre adresse email ne sera pas publiée)' . ( $req ? ' (champ obligatoire)' : '' ) . '</label></p>',
		'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><label for="url">' . __( 'Site web', 'domainreference' ) . '</label></p>' ) ) );
?>
<?php comment_form($comment_args); ?>