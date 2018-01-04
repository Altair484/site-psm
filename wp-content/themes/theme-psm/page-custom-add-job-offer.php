<?php
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['insert_post'] )) { //check that our form was submitted
                    $title =  $_POST['thread_title'];  //set our title

                    if ($_POST['thread_description']=="") {  // check if a description was entered
                        $description = "See thread title...";  // if not, use placeholder
                    } else {
                        $description = $_POST['thread_description']; //if so, use it
                    }

                    $tags = $_POST['thread_tags']; //load thread tags (custom tax) into array
                    $post = array( //our wp_insert_post args
                        'post_title'	=> wp_strip_all_tags($title),
                        'post_content'	=> $description,
                        'post_category'	=> array('0' => $_POST['cat']),
                        'tax_input' 	=> array('thread_tag' => $tags),
                        'post_status'	=> 'publish',
                        'post_type' 	=> 'job_offer'
                    );
                    $my_post_id = wp_insert_post($post); //send our post, save the resulting ID
                    $current_user = wp_get_current_user(); //check who is logged in
                    //cp_points('new_thread', $current_user->ID, -$charge, $my_post_id); // take points from user meta

                    add_post_meta($my_post_id, '_your_custom_meta', 'my post meta value'); //add custom meta data, after the post is inserted

                    //wp_redirect( get_permalink($my_post_id) ); //send the user along to their newly created post
                } else {
                    if(is_user_logged_in()) { // check that the user is logged in before presenting form
                        $current_user = wp_get_current_user();
                        ?>

                        <div id="postbox">

                            <form id="new_thread" name="new_thread" method="post" action="">

                                <input class="required" type="text" id="thread_title" value="" tabindex="1" name="thread_title" placeholder="Thread Title" />

                                <textarea id="thread_description" name="thread_description" cols="80" rows="20" tabindex="2"></textarea>

                                <div class="left">
                                    <select name='cat' id='cat' class='postform required'  tabindex="3">
                                        <option value="" selected="selected">Category</option>
                                        <option class="level-0" value="5">News</option>
                                        <option class="level-0" value="313">Apps & Games</option>
                                        <option class="level-0" value="8735">Smartphones & Tablets</option>
                                        <option class="level-0" value="8733">Opinions</option>
                                        <option class="level-0" value="8767">Rumors</option>
                                        <option class="level-0" value="9094">Assignments</option>
                                    </select>
                                </div>

                                <input type="text" value="" tabindex="4" size="16" name="thread_tags" id="thread_tags" placeholder="Tags" />

                                <input type="submit" value="Start Thread" tabindex="5" id="thread_submit" name="thread_submit" class="thread-button" />

                                <input type="hidden" name="insert_post" value="post" />

                                <?php wp_nonce_field( 'new_thread' ); ?>
                            </form>
                        </div>
                    <?php  } else { echo 'please login'; } }  ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();