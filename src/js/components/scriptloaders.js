

var ScriptLoaders = {

    init: function( ) {

        // Register Service Worker
        this.registerServiceworkerJs();

    },


    registerServiceworkerJs: function()
    {
        if ( 'serviceWorker' in navigator )
        {
            window.addEventListener( 'load' , () => {
                navigator.serviceWorker.register('/wp-content/themes/vanaf1979/public/js/sw.js');
            });
        }
    },

}

 
export default ScriptLoaders;
