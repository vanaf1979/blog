<!doctype html>

<?php get_template_part('components/header'); ?>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    
    <!-- / Application \ -->

    <div id="app">
        
        <?php get_template_part('components/main-nav'); ?>

        <!-- / Main content \ -->

        <main class="row">

            <article class="blog-post row-center-wide"  itemscope itemtype="http://schema.org/Article">
                
                <header class="img">

                    <?php 
                    $post_author = get_the_author_meta('display_name', $post->post_author );
                    $post_date = date_format( date_create( $post->post_date ) ,"l, F d, o");
                    ?>

                    <h2 itemprop="headline"><?php echo $post->post_title; ?></h2>

                    <p>By <a href="/about" itemprop="author"><?php echo $post_author; ?></a> - <span itemprop="datePublished"><?php echo $post_date; ?></span></p>

                    <?php 
                    $imglarge = $thm->get_image_src( $post , 'post-thumb-large' ); 
                    $imgmedium = $thm->get_image_src( $post , 'post-thumb-medium' ); 
                    $imgsmall = $thm->get_image_src( $post , 'post-thumb-small' ); 
                    ?>
                    <img alt="<?php echo $imglarge['alt']; ?>"
                        src="<?php echo $imglarge['src']; ?>"
                        srcset="
                            <?php echo $imglarge['src']; ?> 1000w,
                            <?php echo $imgmedium['src']; ?> 700w,
                            <?php echo $imgsmall['src']; ?> 334w
                        "
                        sizes="
                            (min-width: 769px) 1000px,
                            (min-width: 569px) 700px,
                            (min-width: 1px) 334px,
                            100vw 
                        "
                    />

                </header>

                <div class="text row-center">

                    <div itemprop="articleBody">
                        <?php echo $thm->get_content( $post ); ?>
                    </div>

                    <ul class="tags" itemprop="keywords">
                        <?php
                        $tags = array();
                        $tags = wp_get_post_tags( $post->ID );
                        $tags = array_reverse( $tags ); 
                        foreach($tags as $tag) {
                        ?>
                        <li><?php echo $tag->name; ?></li>
                        <?php
                        }
                        ?>
                    </ul>

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