	<footer class="backwhite bottom">
		<p class="p4 center copy">Copyright © 2020 ComputerGate. All rights reserved. Designed & developed by ComputerGate Team</p>
	</footer>	
		
		<script src="../Bootstrap4.4.1/jquery-3.4.1.min.js"></script>
        <script src="../Bootstrap4.4.1/popper.min.js"></script>
        <script src="../Bootstrap4.4.1/js/bootstrap.min.js"></script>
		<script src="../JS/wow.min.js"></script>
		<script src="../JS/isotope-docs.min.js"></script>
		<script src="../JS/mixconfig.js"></script>

		<script>
            //Initiate WOW plugin
            new WOW().init();
        </script>

        <script>
            //Change Navbar Theme after scrolling
			$(window).scroll(function(){
			$('header').toggleClass('scrolled', $(this).scrollTop() > 500);
            $('.navbar-light').toggleClass('scrolled-item', $(this).scrollTop() > 500);
            $('.navbar-nav').toggleClass('scrolled-item', $(this).scrollTop() > 500);
            $('.nav-link').toggleClass('scrolled-item', $(this).scrollTop() > 500);
			});
		</script>

		<script>
            // Navbar change active class between pages
            var home = $("#home-nav");
            var products = $("#products-nav");
            var IT = $("#IT-nav");
            var web = $("#web-nav");
            var items = $(".nav-item")
            var path = window.location.pathname;
            var page = path.split("/").pop();
            $(document).ready(function() {
                if(page=="index.php"){
                    items.removeClass("active");
                    home.addClass("active");
                }
                else if(page==""){
                    items.removeClass("active");
                    home.addClass("active");
                }
                else if(page=="ITSupport.php"){
                    items.removeClass("active");
                    IT.addClass("active");
                }
                else if(page=="WebSupport.php"){
                    items.removeClass("active");
                    web.addClass("active");
                }
                else{
                    items.removeClass("active");
                    products.addClass("active");
                }
            })
		</script>

		<script>
            //Animate anchor scroll throw the page instead of moving instantly
			$(document).ready(function(){
                var contact = $("#contact-nav");
                var item = $(".nav-item")
                var contactus = $("#contactus-nav")
				contact.click(function( event ) {
					event.preventDefault();
                    item.removeClass("active");
                    contactus.addClass("active");
					$("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 1000);
				});
			});
		</script>
	</body>
</html>