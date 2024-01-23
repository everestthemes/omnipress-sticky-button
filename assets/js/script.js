(function () {

    // Floating Button 
    function omnipressfb_sticky_buttons() {

        const fbWrap = document.querySelector(".omnipress-fb-wrapper");
        const scrollPosition = document.documentElement.scrollTop;

        if (fbWrap) {
        document.body.classList.toggle(
            "opfb-active",
            scrollPosition > 100
        );
        }
    }

    // Function Call
    window.addEventListener("scroll", function() {

        omnipressfb_sticky_buttons();

    });

})();