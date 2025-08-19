<?php 
/**
 * 1. ثبت متاباکس
 */
add_action( 'add_meta_boxes', 'rastgo_add_verification_meta_box' );
function rastgo_add_verification_meta_box() {
    add_meta_box(
        'rastgo_verification',             // شناسه متاباکس
        'اطلاعات راستی آزمایی',            // عنوان متاباکس
        'rastgo_render_verification_meta_box', // تابع رندر فیلدها
        'post',                            // پست تایپ: نوشته
        'normal',                          // موقعیت: زیر باکس اصلی
        'high'                             // اولویت
    );
}

/**
 * 2. رندر کردن فیلدهای متاباکس
 */
function rastgo_render_verification_meta_box( $post ) {
    // امنیت: nonce
    wp_nonce_field( 'rastgo_verification_nonce', 'rastgo_verification_nonce_field' );

    // واکشی مقادیر ذخیره‌شده یا مقدار پیش‌فرض
    $editor_choice        = get_post_meta( $post->ID, 'i8_editor_choice', true ) ? 'checked' : '';
    $primary_category_id  = get_post_meta( $post->ID, 'i8_primary_category', true );
    $read_time            = get_post_meta( $post->ID, 'i8_read_time', true ) ?: 5;
    $fact_summary         = get_post_meta( $post->ID, 'i8_fact_summary', true );
    $fact_result          = get_post_meta( $post->ID, 'i8_fact_result', true );
    $fact_result_summary  = get_post_meta( $post->ID, 'i8_fact_result_summary', true );

    // لیست دسته‌ها
    $categories = get_categories( [ 'hide_empty' => false ] );
    ?>
    <p>
        <label>
            <input type="checkbox" name="i8_editor_choice" <?php echo $editor_choice; ?> />
            انتخاب سردبیران
        </label>
    </p>

    <p>
        <label for="i8_primary_category">دسته‌بندی اصلی:</label><br/>
        <select name="i8_primary_category" id="i8_primary_category" style="width: 100%;">
            <option value="">— انتخاب کنید —</option>
            <?php foreach ( $categories as $cat ) : ?>
                <option value="<?php echo esc_attr( $cat->term_id ); ?>"
                    <?php selected( $primary_category_id, $cat->term_id ); ?>>
                    <?php echo esc_html( $cat->name ); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label for="i8_read_time">زمان مطالعه (دقیقه):</label><br/>
        <input type="number" name="i8_read_time" id="i8_read_time" value="<?php echo esc_attr( $read_time ); ?>" min="1" style="width: 80px;" />
    </p>

    <p>
        <label for="i8_fact_summary">شرح ادعا:</label><br/>
        <textarea name="i8_fact_summary" id="i8_fact_summary" rows="3" style="width: 100%;"><?php echo esc_textarea( $fact_summary ); ?></textarea>
    </p>

    <p>
        <label for="i8_fact_result">نتیجه بررسی:</label><br/>
        <select name="i8_fact_result" id="i8_fact_result" style="width: 100px;">
            <option value="">— انتخاب کنید —</option>
            <option value="true"      <?php selected( $fact_result, 'true' ); ?>>درست</option>
            <option value="halftrue"  <?php selected( $fact_result, 'halftrue' ); ?>>نیمه درست</option>
            <option value="Misleading"  <?php selected( $fact_result, 'Misleading' ); ?>>گمراه کننده</option>
            <option value="Unverifiable"  <?php selected( $fact_result, 'Unverifiable' ); ?>>غیر قابل اثبات</option>
            <option value="False"  <?php selected( $fact_result, 'False' ); ?>>نادرست</option>
            <option value="Unfounded"  <?php selected( $fact_result, 'Unfounded' ); ?>>بی اساس</option>
        </select>
    </p>

    <p>
        <label for="i8_fact_result_summary">شرح نتیجه:</label><br/>
        <textarea name="i8_fact_result_summary" id="i8_fact_result_summary" rows="6" style="width: 100%;"><?php echo esc_textarea( $fact_result_summary ); ?></textarea>
    </p>
    <?php
}

/**
 * 3. ذخیره‌سازی داده‌ها هنگام ذخیره پست
 */
add_action( 'save_post', 'rastgo_save_verification_meta_box' );
function rastgo_save_verification_meta_box( $post_id ) {
    // بررسی nonce
    if (
        ! isset( $_POST['rastgo_verification_nonce_field'] ) ||
        ! wp_verify_nonce( $_POST['rastgo_verification_nonce_field'], 'rastgo_verification_nonce' )
    ) {
        return;
    }

    // پیشگیری از autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // دسترسی کاربر
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // 3.1. ذخیره چک‌باکس
    $editor_choice = isset( $_POST['i8_editor_choice'] ) ? 1 : 0;
    update_post_meta( $post_id, 'i8_editor_choice', $editor_choice );

    // 3.2. ذخیره دسته‌بندی اصلی (int)
    if ( isset( $_POST['i8_primary_category'] ) ) {
        $cat_id = absint( $_POST['i8_primary_category'] );
        update_post_meta( $post_id, 'i8_primary_category', $cat_id );
    }

    // 3.3. ذخیره زمان مطالعه (int)
    if ( isset( $_POST['i8_read_time'] ) ) {
        $read_time = absint( $_POST['i8_read_time'] );
        update_post_meta( $post_id, 'i8_read_time', $read_time );
    }

    // 3.4. ذخیره شرح ادعا
    if ( isset( $_POST['i8_fact_summary'] ) ) {
        $summary = sanitize_textarea_field( $_POST['i8_fact_summary'] );
        update_post_meta( $post_id, 'i8_fact_summary', $summary );
    }

    // 3.5. ذخیره نتیجه بررسی
    if ( isset( $_POST['i8_fact_result'] ) ) {
        $valid = array( 'true', 'False', 'halftrue', 'Misleading', 'Unverifiable', 'Unfounded' );
        $value = in_array( $_POST['i8_fact_result'], $valid, true ) ? $_POST['i8_fact_result'] : '';
        update_post_meta( $post_id, 'i8_fact_result', $value );
    }

    // 3.6. ذخیره شرح نتیجه بررسی
    if ( isset( $_POST['i8_fact_result_summary'] ) ) {
        $result_summary = sanitize_textarea_field( $_POST['i8_fact_result_summary'] );
        update_post_meta( $post_id, 'i8_fact_result_summary', $result_summary );
    }
}



// add taxonomy
function rastgo_register_social_network_taxonomy() {
    register_taxonomy( 'social_network', 'post', [
        'labels'            => [
            'name'          => 'شبکه‌های اجتماعی',
            'singular_name' => 'شبکه اجتماعی',
        ],
        'public'            => true,
        'hierarchical'      => true, // دسته‌بندی (category) باید true باشد
        'show_in_rest'      => true,
        'rewrite'           => [ 'slug' => 'social-network' ],
    ] );
}
add_action( 'init', 'rastgo_register_social_network_taxonomy' );

function rastgo_register_rumor_source_taxonomy() {
  register_taxonomy( 'rumor_source', 'post', [
    'labels'            => [
      'name'          => 'منابع شایعه',
      'singular_name' => 'منبع شایعه',
    ],
    'public'            => true,
    'hierarchical'      => false,      // مثل برچسب‌ها؛ اگر نیاز داری ساختار سلسله‌مراتبی باشه true
    'show_in_rest'      => true,
    'rewrite'           => [ 'slug' => 'rumor-source' ],
  ] );
}
add_action( 'init', 'rastgo_register_rumor_source_taxonomy' );


