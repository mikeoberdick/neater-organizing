<?php
//Comments stuff
function psc_comments($comment, $args, $depth) { ?>
    <div class="row">
        <div class="col-sm-12">
            
        <div <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
            
            <div class="row comment-wrapper">
                <div class="col-sm-12">
                    <div class="author-info mb-3">
                        <div class="comment-author vcard">
                            <?php
                            printf( __( '<div class="h2 fn">%s</div>' ), get_comment_author() ); ?>
                        </div>  
                    </div><!-- .author-info -->
                    <?php 
                    if ( $comment->comment_approved == '0' ) { ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
                    } ?>
                    <div style = "clear: both;">
                        <?php comment_text(); ?>    
                    </div>

                    <?php $args = array(
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<div class="comment-reply btn">',
                        'after'     => '</div>'
                        );
                    ?>
                    <div class="d-block">
                        <?php comment_reply_link( $args ); ?>     
                    </div><!-- .d-block -->

                </div><!-- .col-sm-12 -->
                
            </div><!-- .row -->
        </div>
        </div><!-- .col.sm-12 -->
    </div><!-- .row -->
    <?php } ?>