<?php
/**
 * Template for displaying comments
 */

if ( post_password_required() ) {
    return;
}

// Load threaded comments JavaScript if needed
if ( get_option('thread_comments') ) {
    wp_enqueue_script('comment-reply');
}
?>

<div id="comments" class="comments-area mt-5">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title h5 mb-4 text-end">
            <?php
            printf(
                _nx('%1$s دیدگاه', '%1$s دیدگاه', get_comments_number(), 'comments title', 'yourtheme'),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>

        <ol class="comment-list ps-0">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 48,
                'callback'   => 'yourtheme_comment',
                'reverse_top_level' => false,
                'reverse_children'  => false
            ]);
            ?>
        </ol>
    <?php endif; ?>

    <?php
    $current_user = wp_get_current_user();
    $user_display_name = is_user_logged_in() ? esc_attr($current_user->display_name) : '';
    $user_email = is_user_logged_in() ? esc_attr($current_user->user_email) : '';
    comment_form([
        'title_reply'        => '<h3 class="main-title text-center mb-4">دیدگاه خود را بنویسید</h3>',
        'title_reply_before' => '',
        'title_reply_after'  => '',
        'class_form'         => 'comment-form mt-4',
        'class_submit'       => 'btn btn-primary btn-sm',
        'label_submit'       => 'ارسال دیدگاه',
        'submit_field'       => '<div class="col-md-12 mt-2 text-end">%1$s %2$s</div>',
        'comment_notes_before' => '<p class="text-center display-6" style="font-size:12px;">نشانی ایمیل شما منتشر نخواهد شد. بخش‌های موردنیاز علامت‌گذاری شده‌اند <span class="text-danger">*</span></p>',
        'comment_field'      => '<div class="row align-items-start"><div class="col-md-6"><div class="mb-2"><input id="author" name="author" type="text" class="form-control form-control-sm mb-2" placeholder="نام*" value="' . $user_display_name . '" required></div><div class="mb-2"><input id="email" name="email" type="email" class="form-control form-control-sm" placeholder="ایمیل*" value="' . $user_email . '" required></div></div><div class="col-md-6"><textarea id="comment" name="comment" rows="4" class="form-control form-control-sm" placeholder="دیدگاه شما..." required></textarea></div></div>',
        'fields'             => []
    ]);
    ?>
</div>

<?php
function yourtheme_comment($comment, $args, $depth) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    $is_child = $comment->comment_parent != 0;
    ?>
    <<?php echo $tag; ?> <?php comment_class('mb-4 ' . ($is_child ? 'ms-5 ps-3 bg-light' : 'ms-0 bg-light-subtle') . ' p-3 border rounded d-flex flex-row'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-avatar me-3">
            <?php echo get_avatar( $comment, 48, '', '', ['class' => 'rounded-circle'] ); ?>
        </div>
        <div class="comment-body flex-fill">
            <div class="d-flex justify-content-between mb-2 flex-row">
                <span class="comment-author fw-bold">
                    <?php printf( '<a href="%s" class="url" rel="ugc">%s</a>', esc_url( get_comment_author_link() ), get_comment_author() ); ?>
                </span>
                <span class="comment-meta small text-muted">
                    <?php printf( '%1$s در %2$s', get_comment_date('Y/m/d'), get_comment_time() ); ?>
                </span>
            </div>
            <div class="comment-text mb-2">
                <?php comment_text(); ?>
            </div>
            <div class="comment-reply">
                <?php
                comment_reply_link(
                    array_merge( $args, [
                        'reply_text' => 'پاسخ',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                        'before'     => '',
                        'after'      => '',
                    ] )
                );
                ?>
            </div>
        </div>
    </<?php echo $tag; ?>>
    <?php
}
?>
