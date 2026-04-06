(function () {

    /*=====================================
    Sticky
    ======================================= */
    window.onscroll = function () {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;

        if (window.pageYOffset > sticky) {
            header_navbar.classList.add("sticky");
        } else {
            header_navbar.classList.remove("sticky");
        }



        // show or hide the back-top-top button
        var backToTo = document.querySelector(".scroll-top");
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        }
    };

    // section menu active
	function onScroll(event) {
		var sections = document.querySelectorAll('.page-scroll');
		var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

		for (var i = 0; i < sections.length; i++) {
			var currLink = sections[i];
			var val = currLink.getAttribute('href');
			var refElement = document.querySelector(val);
			if (refElement) {
				var scrollTopMinus = scrollPos + 73;
				if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight > scrollTopMinus)) {
					// Remove active class from all menu items
					var allLinks = document.querySelectorAll('.page-scroll');
					allLinks.forEach(function(link) {
						link.classList.remove('active');
					});
					// Add active class to current link
					currLink.classList.add('active');
				}
			}
		}
	};

    window.document.addEventListener('scroll', onScroll);
    
    // Animated text rotation
    function initAnimatedText() {
        const texts = document.querySelectorAll('.animated-text');
        if (texts.length === 0) return;
        
        let currentIndex = 0;
        
        function rotateText() {
            // Remove active class from all
            texts.forEach(text => text.classList.remove('active'));
            
            // Add active class to current
            texts[currentIndex].classList.add('active');
            
            // Move to next text
            currentIndex = (currentIndex + 1) % texts.length;
        }
        
        // Initial call
        rotateText();
        
        // Rotate every 3 seconds
        setInterval(rotateText, 3000);
    }
    
    // Initialize animated text when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimatedText);
    } else {
        initAnimatedText();
    }
    
    // for menu scroll 
    var pageLink = document.querySelectorAll('.page-scroll');

    pageLink.forEach(elem => {
        elem.addEventListener('click', e => {
            e.preventDefault();
            
            // Close mobile menu after click
            var navbarCollapse = document.querySelector('.navbar-collapse');
            var navbarToggler = document.querySelector('.navbar-toggler');
            
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
                if (navbarToggler) {
                    navbarToggler.classList.remove('active');
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            }
            
            // Close sidebar if open
            var sidebar = document.querySelector('.sidebar-left');
            var overlay = document.querySelector('.overlay-left');
            if (sidebar && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                if (overlay) {
                    overlay.classList.remove('open');
                }
            }
            
            document.querySelector(elem.getAttribute('href')).scrollIntoView({
                behavior: 'smooth',
                offsetTop: 1 - 60,
            });
        });
    });

    "use strict";

}) ();
