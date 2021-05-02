<?php function ajax_assets() {
    wp_enqueue_script('ajax category js', get_stylesheet_directory_uri() . '/js/ajax-category.js', ['jquery'], null, true);
    wp_localize_script( 'ajax category js', 'psc', array(
        'nonce'    => wp_create_nonce( 'psc' ),
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action('wp_enqueue_scripts', 'ajax_assets', 100);

//AJAX filter posts and display the content
function psc_posts() {
if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'psc' ) )
    die('Permission denied');

    $value = ($_POST['params']['value']);
    $term = sanitize_text_field($_POST['params']['term']);
    $page = intval($_POST['params']['page']);
    $qty  = intval($_POST['params']['qty']);
    
    $tax_qry[] = [
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $value,
    ];

//Setup the query args for wp query
$args = [
    'paged'          => $page,
    'post_status'    => 'publish',
    'posts_per_page' => $qty,
    'tax_query'      => $tax_qry
];
$qry = new WP_Query($args);
ob_start();
    if ($qry->have_posts()) : ?>
        <?php while ($qry->have_posts()) : $qry->the_post(); ?>
            <div class="col-md-6 the-post">
                <?php $img = get_field('featured_image'); ?>
                <div class="post-wrapper" data-bg = "<?php echo $img['url']; ?>">
                    <img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt'];
                     ?>">
                     <div class="content-wrapper">
                         <div class = "h6 subheader"><?php $cats = '';
                            foreach((get_the_category()) as $category) {
                                $cats .= $category->cat_name . ', ';
                            }
                            echo rtrim($cats, ', '); ?></div>
                         <h1 class="h2 section-title"><?php the_title(); ?></h1>
                         <div class="excerpt">
                            <?php $trimmed_text = wp_trim_excerpt_modified( get_field('the_content'), 40 );
                                $last_space = strrpos( $trimmed_text, ' ' );
                                $modified_trimmed_text = substr( $trimmed_text, 0, $last_space ); echo '<p class="excerpt mb-0">' . $modified_trimmed_text; ?></a></p>
                         </div><!-- .the-excerpt -->
                         <a href = "<?php the_permalink(); ?>"><button role = "button" class = "btn maroon-button">Read More</button></a>   
                     </div><!-- .content-wrapper -->
                </div><!-- .post-wrapper -->    
            </div><!-- .col-md-6 -->
        <?php endwhile; ?>

        <nav class = "container mt-5 text-center">
            <div class="row">
                <div class="col-sm-12">
                    <?php psc_ajax_pager($qry,$page); ?>
                </div><!-- .col-sm-12 -->
            </div><!-- .row -->
        </nav>

<?php $response = [
    'status'=> 200,
    'found' => $qry->found_posts
    ];
else :
    $response = [
        'status'  => 201,
        'message' => 'No posts found'
    ];
endif;
$response['content'] = ob_get_clean();
die(json_encode($response));
}

add_action('wp_ajax_filter_posts', 'psc_posts');
add_action('wp_ajax_nopriv_filter_posts', 'psc_posts');

//Pagination function
function psc_ajax_pager( $query = null, $paged = 1 ) {
    if (!$query)
        return;
    $paginate = paginate_links([
        'base'      => '%_%',
        'type'      => 'array',
        'total'     => $query->max_num_pages,
        'format'    => '#page=%#%',
        'current'   => max( 1, $paged ),
        'prev_next' => false,
    ]);
    if ($query->max_num_pages > 1) : ?>
        <div id = "postsPagination">
        <ul class="ajax-pagination">
            <?php foreach ( $paginate as $page ) :?>
                <li class = "page-item">
                    <span class = "page-link"><?php echo $page; ?></span></li>
            <?php endforeach; ?>
        </ul>    
        </div>
    <?php endif;
}

?>