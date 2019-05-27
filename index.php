<!doctype html>

<?php get_template_part('components/header'); ?>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    
    <!-- / Application \ -->

    <div id="app">
        
        <?php get_template_part('components/main-nav'); ?>

        <!-- / Main content \ -->

        <main class="row">

     
            <?php $thm->get_posts( $post , function( $child ) use ( $thm ) { ?>

            <article class="blog-intro row-center-wide"  itemscope itemtype="http://schema.org/TechArticle">
                
                <header class="img">

                    <?php 
                    $post_author = get_the_author_meta('display_name', $child->post_author );
                    $post_date = date_format( date_create( $child->post_date ) ,"l, F d, o");
                    ?>
                    <h2 itemprop="headline">
                        <a href="<?php echo get_permalink( $child->ID ); ?>" title="<?php echo $child->post_title; ?>" itemprop="url"><?php echo $child->post_title; ?></a>
                    </h2>

                    <p>By <a href="/about" itemprop="author"><?php echo $post_author; ?></a> - <span itemprop="datePublished"><?php echo $post_date; ?></span></p>

                    <a href="<?php echo get_permalink( $child->ID ); ?>" title="<?php echo $child->post_title; ?>">
                        <?php 
                        $imglarge = $thm->get_image_src( $child , 'post-thumb-large' ); 
                        $imgmedium = $thm->get_image_src( $child , 'post-thumb-medium' ); 
                        $imgsmall = $thm->get_image_src( $child , 'post-thumb-small' ); 
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
                    </a>

                </header>

                <div class="text row-center">

                    <ul itemprop="keywords">
                        <?php
                        $tags = array();
                        $tags = wp_get_post_tags( $child->ID );
                        $tags = array_reverse( $tags ); 
                        foreach($tags as $tag) {
                        ?>
                        <li><?php echo $tag->name; ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                    <!-- For complete article itemprop="articleBody" -->
                    <p itemprop="description"><?php echo get_the_excerpt( $child ); ?></p>

                    <a href="<?php echo get_permalink( $child->ID ); ?>" class="readmore" itemprop="url"  title="<?php echo $child->post_title; ?>">Read article</a>

                </div>

            </article>

            <?php }); ?>

        </main>

        <!-- \ Main content / -->

        <?php get_template_part('components/footer'); ?>

    </div>

    <!-- \ Application / -->

    <?php get_template_part('components/mobile-nav'); ?>

    <?php wp_footer(); ?>

</body>

</html>