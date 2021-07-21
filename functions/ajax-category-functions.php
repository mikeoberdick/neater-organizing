<?php function ajax_assets() {
    if (is_home()) {
        wp_enqueue_script('ajax-categories', get_stylesheet_directory_uri() . '/js/ajax-category.js', ['jquery'], null, true);
        wp_localize_script( 'ajax-categories', 'psc', array (
            'nonce'    => wp_create_nonce( 'psc' ),
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }    
}

add_action('wp_enqueue_scripts', 'ajax_assets', 100);

//AJAX filter posts and display the content
function psc_more_posts() {
if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'psc' ) )
    die('Permission denied');

    $page = intval($_POST['params']['page']);
    $qty  = intval($_POST['params']['qty']);

//Setup the query args for wp query
$args = [
    'paged'          => $page,
    'post_status'    => 'publish',
    'posts_per_page' => $qty,
];
$moreQry = new WP_Query($args);
ob_start();
    if ($moreQry->have_posts()) : ?>
        <?php while ($moreQry->have_posts()) : $moreQry->the_post(); ?>
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

        <div class = "container mt-5 text-center">
            <div class="row">
                <div class="col-sm-12">
                    <div id="paginationWrapper">
                    <?php psc_ajax_pager($moreQry,$page); ?>
                    </div>
            </div><!-- .row -->
        </div>

<?php $response = [
    'status'=> 200,
    'found' => $moreQry->found_posts
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

add_action('wp_ajax_load_more_posts', 'psc_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'psc_more_posts');

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

        <div class = "container mt-5 text-center">
            <div class="row">
                <div class="col-sm-12">
                    <div id="postsPagination">
                    <?php psc_ajax_pager($qry,$page); ?>
                    </div>
            </div><!-- .row -->
        </div>

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

//Search functionality
function psc_search_posts() {
if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'psc' ) )
    die('Permission denied');

    $query = ($_POST['params']['query']);
    $page = intval($_POST['params']['page']);
    $qty  = intval($_POST['params']['qty']);

//Setup the query args for wp query
$args = [
    'paged'          => $page,
    'post_status'    => 'publish',
    'posts_per_page' => $qty,
    's' => $query
];
$searchQry = new WP_Query($args);
ob_start();
    if ($searchQry->have_posts()) : ?>
        <?php while ($searchQry->have_posts()) : $searchQry->the_post(); ?>
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

        <div class = "container mt-5 text-center">
            <div class="row">
                <div class="col-sm-12">
                    <div id="searchPagination">
                    <?php psc_ajax_pager($searchQry,$page); ?>
                    </div>
            </div><!-- .row -->
        </div>

<?php $response = [
    'status'=> 200,
    'found' => $searchQry->found_posts
    ];
else :
    $response = [
        'status'  => 201,
        'message' => '
        <div class = "col-sm-12"><h1>Sorry, there were no results for that search.</h1></div>'
    ];
endif;
$response['content'] = ob_get_clean();
die(json_encode($response));
}

add_action('wp_ajax_search_posts', 'psc_search_posts');
add_action('wp_ajax_nopriv_search_posts', 'psc_search_posts');

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
        <nav aria-label="Posts navigation">
            <ul class="pagination">
                <?php foreach( wpdocs_get_paginated_links( $query ) as $link ) : ?>
                    <?php if ( $link->page == $paged ): ?>
                        <li class="page-item">
                            <span aria-current="page" class="page-link current"><?php _e( $link->page ) ?></span> 
                        </li>
                    <?php else : ?>
                        <li class="page-item ">
                            <a class="page-link" href="<?php echo '#page=' . $link->page; ?>"><?php _e( $link->page ) ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>  
            </ul>
        </nav>    
    <?php endif; }
?>