import LazyLoad from "vanilla-lazyload";


var LazyLoading = {

    init: function( ) {

        this.dependOnIntersectionObserver();

    },


    dependOnIntersectionObserver() {

        if (!('IntersectionObserver' in window) || !('IntersectionObserverEntry' in window) || !('intersectionRatio' in window.IntersectionObserverEntry.prototype) ) {
        
            this.addScript( 'https://cdn.jsdelivr.net/npm/intersection-observer@0.5.1/intersection-observer.js', () => {

                this.lazyLoadImages();

            });
            
        } else {

            this.lazyLoadImages();

        }
    },


    lazyLoadImages: function()
    {
        var lazyLoadInstance = new LazyLoad({
            
            elements_selector: ".lazy"

        });
    },


    addScript: function( script = null, callback = null ) {

        var element = document.createElement( 'script' );
        element.type = 'text/javascript';
        element.async = true;
        element.src = script;
        parent = 'body';

        if( callback != null && typeof callback === "function" ) {
        
            element.onload = function() {

                callback()
                
            };
        }

        document[parent].appendChild(element);

    }

}

 
export default LazyLoading;
