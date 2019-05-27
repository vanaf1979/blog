<!-- / Mobile navigation \ -->

<nav id="menu">

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

</nav>

<!-- \ Mobile navigation / -->