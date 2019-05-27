<!-- / Navigtion \ -->

<header class="main-nav row">

    <section class="pure-g row-center-wide">

        <div class="logo pure-u-2-3 pure-u-sm-1-3 pure-u-md-1-3 pure-u-lg-1-3 pure-u-xl-1-3">

            <?php $cur_lang = pll_current_language(); ?>
            
            <?php if( $cur_lang == 'en' ) { ?> 

            <a href="/">VA79</a>
            
            <?php } else { ?>

            <a href="/nl">VA79</a>
            
            <?php } ?>

        </div>

        <div class="menu pure-u-1-3 pure-u-sm-2-3 pure-u-md-2-3 pure-u-lg-2-3 pure-u-xl-2-3">

            <?php if( $cur_lang == 'en' ) { ?> 

            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/about">About</a>
                </li>
                <li>
                    <a href="/contact">Contact</a>
                </li>
                <?php 
                $lang = pll_the_languages(array('raw'=>1));
                ?>
                <li>
                    <a href="<?php echo $lang['nl']['url']; ?>"><i class="fas fa-globe-europe"></i> Dutch</a>
                </li>
            </ul>

            <?php } else { ?>

            <ul>
                <li>
                    <a href="/nl">Home</a>
                </li>
                <li>
                    <a href="/nl/over">Over</a>
                </li>
                <li>
                    <a href="/nl/contact">Contact</a>
                </li>
                <?php 
                $lang = pll_the_languages(array('raw'=>1));
                ?>
                <li>
                    <a href="<?php echo $lang['en']['url']; ?>"><i class="fas fa-globe-europe"></i> English</a>
                </li>
            </ul>

            <?php } ?>

            <a href="#menu" class="mobile fas fa-bars">&nbsp;</a>

        </div>

    </section>

</header>

<!-- \ Navigtion / -->