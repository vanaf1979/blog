
import mmenu from '../libs/mmenu.js';

const MobileMenu = {

    init: function() {

        $("#menu").mmenu({
            extensions: ["theme-dark", "position-right"],
        });

    }

}

export default MobileMenu;