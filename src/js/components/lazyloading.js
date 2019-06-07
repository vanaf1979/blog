import LazyLoad from "vanilla-lazyload";


var LazyLoading = {

    init: function( ) {

        this.lazyLoadImages();

    },


    lazyLoadImages: function()
    {
        var lazyLoadInstance = new LazyLoad({
            elements_selector: ".lazy"
        });
    },

}

 
export default LazyLoading;
