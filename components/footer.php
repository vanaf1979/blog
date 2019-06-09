<!-- / Footer \ -->

<footer class="row">

    <section class="tweets pure-g row-center-wide">

        <div class="socials pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1 pure-u-xl-1">

            <ul>
                <li>
                    <a href="https://www.linkedin.com/in/stephannijman/" title="LinkedIn" class="fab fa-linkedin" target="_blank"></a>
                </li>
                <li>
                    <a href="https://medium.com/@vanaf1979" title="Medium" class="fab fa-medium" target="_blank"></a>
                </li>
                <li>
                    <a href="https://twitter.com/Vanaf1979" title="Twitter" class="fab fa-twitter" target="_blank"></a>
                </li>
                <li>
                    <a href="https://vanaf1979.tumblr.com/" title="Tumblr" class="fab fa-tumblr" target="_blank"></a>
                </li>
                <li>
                    <a href="https://github.com/vanaf1979" title="Github" class="fab fa-github" target="_blank"></a>
                </li>
                <li>
                    <a href="https://profiles.wordpress.org/vanaf1979/" title="WordPress" class="fab fa-wordpress" target="_blank"></a>
                </li>
                <li>
                    <a href="https://dev.to/vanaf1979" title="Dev.to" class="fab fa-dev" target="_blank"></a>
                </li>
                <li>
                    <a href="https://pinterest.com/vanaf1979/" title="Pinterest" class="fab fa-pinterest" target="_blank"></a>
                </li>
                <li>
                    <a href="https://www.reddit.com/user/vanaf1979/" title="Reddit" class="fab fa-reddit" target="_blank"></a>
                </li>
                <li>
                    <a href="https://stackoverflow.com/users/8279555/va79?tab=profile" title="Stack Overflow" class="fab fa-stack-overflow" target="_blank"></a>
                </li>
                <li>
                    <a href="https://mix.com/vanaf1979" title="Mix" class="fab fa-mix" target="_blank"></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/vanaf1979/" title="Facebook" class="fab fa-facebook" target="_blank"></a>
                </li>
            </ul>

        </div>

        <div class="copy pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1 pure-u-xl-1">

            <?php dynamic_sidebar( 'latest_tweets' ); ?>

        </div>

    </section>

    <section class="footer pure-g row-center-wide">

        <div class="copy pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-2-3 pure-u-xl-2-3">

            <p>&copy; <a href="https://vanaf1979.nl">Vanaf1979</a> / <a href="https://vanaf1979.nl/about">Stephan Nijman</a> All rights reserved</p>

        </div>

        <div class="menu pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-3 pure-u-xl-1-3">

            <?php $cur_lang = pll_current_language(); ?>

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

        </div>

    </section>

</footer>

<!-- \ Footer / -->