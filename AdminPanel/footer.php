
            <!-- <div id="test"></div> -->

        </div><!-- /#right-panel -->
		<!-- Right Panel -->

		<script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>
        


        <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/widgets.js"></script>
        <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script>
            (function($) {
                "use strict";

                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            })(jQuery);
        </script>

        <script>
            // Submit Form before delete item
            var d = document.getElementsByClassName('deleteButton');
            var confirmIt = function (e) {
                if (!confirm('Do you want to delete this item?')) e.preventDefault();
                };
            for (var i = 0, l = d.length; i < l; i++) {
                d[i].addEventListener('click', confirmIt, false);
                }
        </script>

        <script>
            // Adabt requested data for each category
            
            //Container Elements
            var categorySelect = document.getElementById('categorySelector');
            if(categorySelect != null){var category = document.getElementById('categorySelector').value;}
            var computer = document.getElementById('computer');
            var monitor = document.getElementById('monitor');
            var interfaces = document.getElementById('interfaces');
            var speed = document.getElementById('speedSection');
            var description = document.getElementById('descriptionSection');
            var items = document.getElementsByClassName('categoryitem');
            
            //Input Elements
            var all = document.getElementsByClassName('product-control');
            var computerElement = document.getElementsByClassName('computerElement');
            var monitorElement = document.getElementsByClassName('monitorElement');
            var interfaceElement = document.getElementsByClassName('interfaceElement');
            var speedElement = document.getElementsByClassName('speedElement');
            var descriptionElement = document.getElementsByClassName('descriptionElement');
            
            
            //var test = document.getElementById('test');
            //test.innerHTML = category;

            function categories() {
                var category = document.getElementById('categorySelector').value;
                for (i = 0; i < items.length; i++)
                        items[i].classList.remove("hidden");
                
                if(category == "desktop" || category == "server"){
                    monitor.classList.add("hidden");
                    speed.classList.add("hidden");
                    description.classList.add("hidden");
                    
                    for (i = 0; i < all.length; i++)
                        all[i].removeAttribute("required");
                    
                    addcomputerrequired();
                    addinterfacerequired();
                }
                else if(category == "laptop"){
                    speed.classList.add("hidden");
                    description.classList.add("hidden");
                    
                    for (i = 0; i < all.length; i++)
                        all[i].removeAttribute("required");
                    
                    addcomputerrequired();
                    addmonitorrequired();
                    addinterfacerequired();
                }
                else if(category == "monitor"){
                    computer.classList.add("hidden");
                    speed.classList.add("hidden");
                    description.classList.add("hidden");
                    
                    for (i = 0; i < all.length; i++)
                        all[i].removeAttribute("required");
                    
                    addmonitorrequired();
                    addinterfacerequired();
                }
                else if(category == "acc" || category == "network"){
                    computer.classList.add("hidden");
                    monitor.classList.add("hidden");
                    interfaces.classList.add("hidden");
                    speed.classList.add("hidden");
                    
                    for (i = 0; i < all.length; i++)
                        all[i].removeAttribute("required");
                    
                    adddescriptionrequired();
                }
                else if(category == "printer"){
                    computer.classList.add("hidden");
                    monitor.classList.add("hidden");
                    
                    for (i = 0; i < all.length; i++)
                        all[i].removeAttribute("required");
                    
                    addinterfacerequired();
                    addspeedrequired();
                    adddescriptionrequired();
                }
            }
            
            if (categorySelect != null){
                window.addEventListener('load', function() { 
                    <?php if(isset($initialCategory)){ echo 'category = ".Print('.$initialCategory.')";';} ?>
                    categories(); 
                });
                categorySelect.addEventListener('change', function() { categories(); });
            }
            
            
            function addcomputerrequired(){
                for (i = 0; i < computerElement.length; i++)
                    computerElement[i].setAttribute("required", "required");
            }
            
            function addmonitorrequired(){
                for (i = 0; i < monitorElement.length; i++)
                    monitorElement[i].setAttribute("required", "required");
            }
            
            function addinterfacerequired(){
                for (i = 0; i < interfaceElement.length; i++)
                    interfaceElement[i].setAttribute("required", "required");
            }
            
            function addspeedrequired(){ 
                for (i = 0; i < speedElement.length; i++)
                    speedElement[i].setAttribute("required", "required");
            }
            
            function adddescriptionrequired(){
                for (i = 0; i < descriptionElement.length; i++)
                    descriptionElement[i].setAttribute("required", "required");
            }
        </script>

        <script>
            // Disable model for second hard and External VGA if the type is None
            var shardsize = document.getElementById('shardsize');
            if(shardsize != null){var shardvalue = document.getElementById('shardsize').value;}
            var shardtype = document.getElementById('shardtype');
            var exvgatype = document.getElementById('exvgatype');
            var exvgamodel = document.getElementById('exvgamodel');
            
            if (shardsize != null){
                shardsize.addEventListener('change', function() { 
                    var shardvalue = document.getElementById('shardsize').value;
                    
                    if (shardvalue == "none"){
                        shardtype.setAttribute("disabled", "disabled");
                    }else{
                        shardtype.removeAttribute("disabled");
                    }
                });
                
                exvgatype.addEventListener('change', function() { 
                    var exvgatypevalue = document.getElementById('exvgatype').value;
                    
                    if (exvgatypevalue == "none"){
                        exvgamodel.setAttribute("disabled", "disabled");
                        exvgamodel.removeAttribute("required");
                    }else{
                        exvgamodel.removeAttribute("disabled");
                        exvgamodel.setAttribute("required", "required");
                    }
                });
            }
        </script>

	</body>
</html>