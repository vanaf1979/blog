
import ScriptLoaders from './components/scriptloaders.js';
import MobileMenu from './components/mobile-menu.js';
import LazyLoading from './components/lazyloading.js';

$(document).ready( function() {

    LazyLoading.init();

    ScriptLoaders.init();

    MobileMenu.init();

});
