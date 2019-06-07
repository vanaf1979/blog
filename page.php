<!doctype html>

<?php get_template_part('components/header'); ?>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    
    <!-- / Application \ -->

    <div id="app">
        
        <?php get_template_part('components/main-nav'); ?>

        <!-- / Main content \ -->

        <main class="row">

            <article class="blog-post row-center-wide">
                
                <header class="img">

                    <?php 
                    $post_author = get_the_author_meta('display_name', $post->post_author );
                    $post_date = date_format( date_create( $post->post_date ) ,"l, F d, o");
                    ?>
                    <h2>
                        <a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a>
                    </h2>

                    <?php 
                    $imglarge = $thm->get_image_src( $post , 'post-thumb-large' ); 
                    $imgmedium = $thm->get_image_src( $post , 'post-thumb-medium' ); 
                    $imgsmall = $thm->get_image_src( $post , 'post-thumb-small' ); 
                    ?>
                    <img alt="<?php echo $imglarge['alt']; ?>" class="lazy" 
                        data-src="<?php echo $imglarge['src']; ?>" 
                        data-srcset="
                            <?php echo $imglarge['src']; ?> 1000w,
                            <?php echo $imgmedium['src']; ?> 700w,
                            <?php echo $imgsmall['src']; ?> 334w"
                        data-sizes="
                            (min-width: 769px) 1000px,
                            (min-width: 569px) 700px,
                            (min-width: 1px) 334px,
                            100vw
                        "
                    />

                </header>

                <div class="text row-center">

                    <div>
                        <?php echo $thm->get_content( $post ); ?>
                    </div>

                </div>

            </article>

        </main>

        <!-- \ Main content / -->

        <?php get_template_part('components/footer'); ?>

    </div>

    <!-- \ Application / -->

    <?php get_template_part('components/mobile-nav'); ?>

    <?php wp_footer(); ?>

</body>

</html>