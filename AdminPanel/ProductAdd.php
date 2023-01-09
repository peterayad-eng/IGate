<main>
    <?php
        $categoryid = $_GET['category'];
        $selectc_sql = "SELECT * FROM category WHERE id = '{$categoryid}'";
        $resultc = mysqli_query($conn, $selectc_sql);
        $rowc = $resultc->fetch_assoc();
        $initialCategory = $rowc['value'];
    
        $select_sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $select_sql);
        $Addedid = $result->num_rows+1;
    ?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Products</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">UI Elements</a></li>
                        <li class="active"><a href="Products.php">Products</a></li>
                    </ol>
                </div>
            </div>
         </div>
    </div>
    <div id="services">
        <?php
            if(isset($_GET['adderror']) && $_GET['adderror'] == 1){
                echo "<div style='color:red'>The Product could not be added </div>";
            }
            elseif(isset($_GET['adderror']) && $_GET['adderror'] == 2){
                echo "<div style='color:red'>This Product Exist </div>";
            }
            if(isset($_GET['editIerror']) && $_GET['editIerror'] == 2){
                echo "<div style='color:red'>The Image Must be less than 5MB </div>";
            }
            elseif(isset($_GET['editIerror']) && $_GET['editIerror'] == 3){
                echo "<div style='color:red'>The File Must be an image </div>";
            }
        ?>
        <div class="animated fadeIn">
           <div class="login-form">
                 <div class="login-logo">
                    <h2> Add Product </h2>
                </div>
                <form  action="ProductAfterAdd.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="productid" value="<?=$Addedid?>"/>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>English Title</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter English Title Label" name="title" required></div>
                    </div>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>Arabic Title</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter Arabic Title Label" name="title_ar" required></div>
                    </div>
                    
                    <div class="row col-12 bottommargin nopadd">
                        <div class="form-group col-6">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control" id="categorySelector" name="category" required>
                                <?php
                                    $selectc_sql = "SELECT * FROM category";
                                    $resultc = mysqli_query($conn, $selectc_sql);
                                    for($i=0;$i<$resultc->num_rows;$i++){
                                        $rowc = $resultc->fetch_assoc();
                                ?>
                                <option value="<?=$rowc['value']?>" <?php if($categoryid == $rowc['id']){ echo "selected"; } ?> ><?=$rowc['category']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-6">
                            <label for="exampleFormControlSelect1">Brand</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="brand" required>
                                <option value="" disabled selected> Brand </option>
                                <?php
                                    $selectb_sql = "SELECT * FROM brand";
                                    $resultb = mysqli_query($conn, $selectb_sql);
                                    for($i=0;$i<$resultb->num_rows;$i++){
                                        $rowb = $resultb->fetch_assoc();
                                ?>
                                <option value="<?=$rowb['value']?>"><?=$rowb['brand']?></option>
                                <?php
                                    }
                                ?>
                                <option value="Others"> Others </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row col-12 nopadd bottommargin">
                        <h5 class="col-12 center">Primary Image</h5>
                        <div class="col-sm-3 center database">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="col-sm-9 nopadd">
                            <div class="text-left dib row col-sm-12">
                                <div class="stat-heading col-sm-12">Select image to upload (jpg or png images only):</div>
                                <div class="stat-text col-sm-12"><input type="file" name="pimage" required/></div>
                                <div class="stat-text col-sm-12">MaxSize:5MB</div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="categoryControlled" class="row col-12 nopadd">
                        
                        <div id="computer" class="categoryitem">
                            
                            <div id="processor" class="row col-12 bottommargin">
                                <label class="col-12"><h5>Processor</h5></label>
                                <div class="form-group col-2">
                                    <label for="exampleFormControlSelect1">Type</label>
                                    <select class="form-control product-control computerElement" id="ptype">
                                        <option value="" disabled selected> Type</option>
                                        <option value="Intel"> Intel </option>
                                        <option value="AMD"> AMD </option>
                                    </select>
                                </div>
                                 <div class="form-group col-3">
                                    <label for="exampleFormControlSelect1">Series</label>
                                    <select class="form-control product-control computerElement" id="pseries" name="pseries" disabled>
                                        <option value="" disabled selected> Series</option>
                                        <?php
                                            $selectp_sql = "SELECT * FROM processorslist";
                                            $resultp = mysqli_query($conn, $selectp_sql);
                                            for($i=0;$i<$resultp->num_rows;$i++){
                                                $rowp = $resultp->fetch_assoc();
                                        ?>
                                        <option value="<?=$rowp['value']?>" class="<?=$rowp['type']?> ptypes" ><?=$rowp['series']?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleFormControlSelect1">Model</label>
                                    <input type="text" id="pmodel" class="form-control product-control computerElement" placeholder="Enter Model" name="pmodel" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleFormControlSelect1">Cache</label>
                                    <select class="form-control product-control computerElement" id="pcache" name="pcache" disabled>
                                        <option value="" disabled selected> Cache</option>
                                        <?php 
                                            $cacheSize = [1, 2, 3, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 30, 32, 35, 40, 45, 50, 55, 60];
                                            $cacheCount = count($cacheSize);
                                            for($i=0;$i<$cacheCount;$i++){
                                        ?>
                                        <option value="<?=$cacheSize[$i]?>"> <?=$cacheSize[$i]?>MB </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <div id="ram_hd" class="row col-12 bottommargin">
                                <div id="ram" class="row col-4">
                                    <div class="form-group col-6">
                                        <label for="exampleFormControlSelect1"><h5>RAM</h5></label>
                                        <select class="form-control product-control computerElement" id="ram" name="ram">
                                            <option value="" disabled selected> RAM</option>
                                            <?php 
                                                $ramSize = [1, 2, 4, 6, 8, 12, 16, 20, 24, 32, 48, 64, 96, 128, 192, 256];
                                                $ramCount = count($ramSize);
                                                for($i=0;$i<$ramCount;$i++){
                                            ?>
                                            <option value="<?=$ramSize[$i]?>" > <?=$ramSize[$i]?>GB </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group col-6">
                                        <label for="exampleFormControlSelect1">Type</label>
                                        <select class="form-control product-control computerElement" id="ramtype" name="ramtype" disabled>
                                            <option value="" disabled selected> Type</option>
                                            <option value="" disabled selected> Type</option>
                                            <?php 
                                                $ramtypearr = [2, 3, 4];
                                                $ramtypearrCount = count($ramtypearr);
                                                for($i=0;$i<$ramtypearrCount;$i++){
                                            ?>
                                            <option value="<?=$ramtypearr[$i]?>"> DDR<?=$ramtypearr[$i]?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div id="phard" class="row col-4">
                                    <label for="exampleFormControlSelect1" class="col-12"><h5>1st Hard</h5></label>
                                    <div class="form-group col-6">
                                        <select class="form-control product-control computerElement" id="phard" name="phard">
                                            <option value="" disabled selected> Hard</option>
                                            <?php 
                                                $hardSize = [32, 64, 80, 128, 256, 500, 1, 2, 4, 5, 6, 8, 10];
                                                $hardCount = count($hardSize);
                                                for($i=0;$i<$hardCount;$i++){
                                            ?>
                                            <option value="<?=$hardSize[$i]?>"> <?=$hardSize[$i]?><?php if($hardSize[$i]<30){echo "TB";}else{echo "GB";}?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                     <div class="form-group col-6">
                                        <select class="form-control product-control computerElement" id="phardtype" name="phardtype" disabled>
                                            <option value="" disabled selected> Type</option>
                                            <?php
                                                $hardType = ['HDD', 'SSD', 'M2'];
                                                $hardTypeCount = count($hardType);
                                                for($i=0;$i<$hardTypeCount;$i++){
                                            ?>
                                            <option value="<?=$hardType[$i]?>"> <?=$hardType[$i]?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div id="shard" class="row col-4">
                                    <label for="exampleFormControlSelect1" class="col-12"><h5>2nd Hard</h5></label>
                                    <div class="form-group col-6">
                                        <select class="form-control product-control computerElement" id="shardsize" name="shard">
                                            <option value="none" selected> None</option>
                                            <?php 
                                                for($i=0;$i<$hardCount;$i++){
                                            ?>
                                            <option value="<?=$hardSize[$i]?>"> <?=$hardSize[$i]?><?php if($hardSize[$i]<30){echo "TB";}else{echo "GB";}?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                     <div class="form-group col-6">
                                        <select class="form-control product-control computerElement" id="shardtype" name="shardtype" disabled>
                                            <option value="none" selected> None </option>
                                            <?php
                                                for($i=0;$i<$hardTypeCount;$i++){
                                            ?>
                                            <option value="<?=$hardType[$i]?>"> <?=$hardType[$i]?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            
                             <div id="vgaall" class="row col-12 bottommargin">
                                <div id="vga" class="row col-6">
                                    <div class="form-group col-4">
                                        <label for="exampleFormControlSelect1"><h5>VGA</h5></label>
                                        <select class="form-control product-control computerElement" id="vgatype" name="vgatype">
                                            <option value="" disabled selected> Type</option>
                                            <?php
                                                $vgaType = ['Intel', 'Nvidia', 'AMD'];
                                                $vgaTypeCount = count($vgaType);
                                                for($i=0;$i<$vgaTypeCount;$i++){
                                            ?>
                                            <option value="<?=$vgaType[$i]?>"> <?=$vgaType[$i]?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group col-8">
                                        <label for="exampleFormControlSelect1">Model</label>
                                        <input type="text" id="vgamodel" class="form-control product-control computerElement" placeholder="Enter Model" name="vgamodel" disabled>
                                    </div>
                                </div>
                                
                                <div id="exvga" class="row col-6">
                                    <div class="form-group col-4">
                                        <label for="exampleFormControlSelect1"><h5>Ext VGA</h5></label>
                                        <select class="form-control product-control computerElement" id="exvgatype" name="exvgatype">
                                            <option value="none" selected> None</option>
                                            <?php
                                                for($i=0;$i<$vgaTypeCount;$i++){
                                            ?>
                                            <option value="<?=$vgaType[$i]?>"> <?=$vgaType[$i]?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group col-8">
                                        <label for="exampleFormControlSelect1">Model</label>
                                        <input type="text" id="exvgamodel" class="form-control product-control" placeholder="Enter Model" name="exvgamodel" disabled>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div id="monitor" class="row col-12 bottommargin categoryitem">
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>Display</h5></label>
                                <div class="row col-12">
                                    <div class="col-8 nopadd"><input type="text" id="display" class="form-control product-control monitorElement" placeholder="Display Size" name="display"></div>
                                    <div class="col-4 middlevertical">inch</div>
                                </div>
                            </div>
                                
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>Resolution</h5></label>
                                <input type="text" id="resolution" class="form-control product-control monitorElement" placeholder="Enter Display Resolution" name="resolution">
                            </div>
                            
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>HDMI</h5></label>
                                <select class="form-control product-control monitorElement" id="hdmi" name="hdmi">
                                    <option value="" disabled selected> HDMI</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>
                                
                        </div>
                        
                        <div id="interfaces" class="row col-12 bottommargin categoryitem">
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>Ethernet</h5></label>
                                <select class="form-control product-control interfaceElement" id="ethernet" name="ethernet">
                                    <option value="none" selected> None </option>
                                    <?php
                                        for($i=1;$i<6;$i++){
                                    ?>
                                    <option value="<?=$i?>"> <?=$i?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                                
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>Wifi</h5></label>
                                <select class="form-control product-control interfaceElement" id="wifi" name="wifi">
                                    <option value="" disabled selected> Wifi</option>
                                    <option value="Yes"> Yes </option>
                                    <option value="No"> No </option>
                                </select>
                            </div>
                            
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>USB2</h5></label>
                                <select class="form-control product-control interfaceElement" id="usb2" name="usb2">
                                    <?php
                                        for($i=0;$i<21;$i++){
                                    ?>
                                    <option value="<?=$i?>"> <?=$i?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>USB3</h5></label>
                                <select class="form-control product-control interfaceElement" id="usb3" name="usb3">
                                    <?php
                                        for($i=0;$i<11;$i++){
                                    ?>
                                    <option value="<?=$i?>"> <?=$i?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>Type C</h5></label>
                                <select class="form-control product-control interfaceElement" id="usbc" name="usbc">
                                    <?php
                                        for($i=0;$i<6;$i++){
                                    ?>
                                    <option value="<?=$i?>"> <?=$i?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div id="speedSection" class="row col-12 bottommargin categoryitem">
                            <div class="form-group col-8">
                                <label for="exampleFormControlSelect1"><h5>Print Speed</h5></label>
                                <div class="row col-12">
                                    <div class="col-6 nopadd"><input type="text" id="speed" class="form-control product-control speedElement" placeholder="Print Speed" name="speed"></div>
                                    <div class="col-6 middlevertical">Paper per Minute</div>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>Paper Size</h5></label>
                                <select class="form-control product-control speedElement" id="papersize" name="papersize">
                                    <option value="" disabled selected> Paper Size</option>
                                    <option value="A4"> A4 </option>
                                    <option value="A3"> A3 </option>
                                </select>
                            </div>
                        </div>
                            
                        <div id="descriptionSection" class="row col-12 bottommargin categoryitem">
                            <div class="form-group col-12">
                                <label for="exampleFormControlSelect1"><h5>English Description</h5></label>
                                <textarea type="text" id="description" class="form-control product-control descriptionElement" placeholder="Enter Product Description" name="description"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleFormControlSelect1"><h5>Arabic Description</h5></label>
                                <textarea type="text" id="description_ar" class="form-control product-control descriptionElement" placeholder="Enter Arabic Product Description" name="description_ar"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div id="price" class="row col-12 bottommargin" >
                        <div class="form-group nopadd col-4">
                            <label for="exampleFormControlSelect1"><h5>Price</h5></label>
                            <input type="text" class="form-control" placeholder="Enter Price" name="price" required>
                        </div>
                    </div>
                    
					<div class="center submitbtn">
                        <button type="submit" class="btn btn-success save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
        <script>
            // Connect Processor Items
            var ptype = document.getElementById('ptype');
            var ptypevalue = document.getElementById('ptype').value;
            var pseries = document.getElementById('pseries');
            var pseriesvalue = document.getElementById('pseries').value;
            var ptypes = document.getElementsByClassName('ptypes');
            var intel = document.getElementsByClassName('Intel');
            var amd = document.getElementsByClassName('AMD');
            var pmodel = document.getElementById('pmodel');
            var pcache = document.getElementById('pcache');
            
            if (ptype != null){
                window.addEventListener('load', function() { 
                    if(ptypevalue != ""){
                        pseries.removeAttribute("disabled");
                        if(pseriesvalue != ""){
                            pmodel.removeAttribute("disabled");
                            pcache.removeAttribute("disabled");
                        }
                    }
                });
                
                ptype.addEventListener('change', function() { 
                    var ptypevalue = document.getElementById('ptype').value;
                    pseries.removeAttribute("disabled");

                    for (i = 0; i < ptypes.length; i++)
                        ptypes[i].classList.remove("hidden");
                    
                    if (ptypevalue == "Intel"){
                        for (i = 0; i < amd.length; i++)
                            amd[i].classList.add("hidden");
                    }else{
                        for (i = 0; i < intel.length; i++)
                            intel[i].classList.add("hidden");
                    }
                });
                
                pseries.addEventListener('change', function() { 
                    pmodel.removeAttribute("disabled");
                    pcache.removeAttribute("disabled");
                });
            }
            
            // Connect RAM Items
            var ram = document.getElementById('ram');
            var ramvalue = document.getElementById('ram').value;
            var ramtype = document.getElementById('ramtype');
            
            if (ram != null){
                 window.addEventListener('load', function() { 
                    if(typeof ramvalue !== "undefined"){
                        ramtype.removeAttribute("disabled");
                    }
                });
                
                ram.addEventListener('change', function() { 
                    ramtype.removeAttribute("disabled");
                });
            }
            
            // Connect Primary Hard Items
            var phard = document.getElementById('phard');
            var phardvalue = document.getElementById('phard').value;
            var phardtype = document.getElementById('phardtype');
            if (phard != null){
                 window.addEventListener('load', function() { 
                    if(typeof phardvalue !== "undefined"){
                        phardtype.removeAttribute("disabled");
                    }
                });
    
                phard.addEventListener('change', function() { 
                    phardtype.removeAttribute("disabled");
                });
            }
            
            // Connect Primary VGA Items
            var vgatype = document.getElementById('vgatype');
            var vgavalue = document.getElementById('vgatype').value;
            var vgamodel = document.getElementById('vgamodel');
            if (vgatype != null){
                 window.addEventListener('load', function() { 
                    if(vgavalue != ""){
                        vgamodel.removeAttribute("disabled");
                    }
                });
                
                vgatype.addEventListener('change', function() { 
                    vgamodel.removeAttribute("disabled");
                });
            }
        </script>

</main>