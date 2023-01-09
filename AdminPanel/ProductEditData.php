<main>
    <?php
        $categoryid = $_GET['category'];
        $selectc_sql = "SELECT * FROM category WHERE id = '{$categoryid}'";
        $resultc = mysqli_query($conn, $selectc_sql);
        $rowc = $resultc->fetch_assoc();
        $initialCategory = $rowc['value'];
    
        $updatedid = $_GET['id'];
        $select_sql = "SELECT * FROM products WHERE id = '{$updatedid}'";
        $result = mysqli_query($conn, $select_sql);
        $row = $result->fetch_assoc();
    
            $selectps_sql = "SELECT * FROM processorslist WHERE value='{$row['pseries']}'";
            $resultps = mysqli_query($conn, $selectps_sql);
            $rowps = $resultps->fetch_assoc();
    ?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Carousel</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">UI Elements</a></li>
                        <li class="active"><a href="Carousel.php">Carousel</a></li>
                    </ol>
                </div>
            </div>
         </div>
    </div>
    <div id="services">
        <?php
            if(isset($_GET['editDerror']) && $_GET['editDerror'] == 1){
			echo "<div style='color:red'>The Data could not be updated </div>";
            }
            elseif(isset($_GET['editDerror']) && $_GET['editDerror'] == 2){
                echo "<div style='color:red'>This Product Exist </div>";
            }
        ?>
        <div class="animated fadeIn">
           <div class="login-form">
                 <div class="login-logo">
                    <h2> Edit Product Data </h2>
                </div>
                <form  action="ProductAfterEditData.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="productid" value="<?=$updatedid?>"/>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>English Title</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter English Title Label" name="title" value="<?=$row['title']?>" required></div>
                    </div>
                    <div class="form-group row col-12 nopadd">
                        <div class="col-2 labelCenter middlevertical"><label>Arabic Title</label></div>
                        <div class="col-10 nopadd middlevertical"><input type="text" class="form-control" placeholder="Enter Arabic Title Label" name="title_ar" value="<?=$row['title_ar']?>" required></div>
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
                                <option value="<?=$rowc['value']?>" <?php if($row['category'] == $rowc['value']){ echo "selected"; } ?> ><?=$rowc['category']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-6">
                            <label for="exampleFormControlSelect1">Brand</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="brand" required>
                                <option value="" disabled <?php if($row['brand'] == "none"){ echo "selected"; } ?>> Brand </option>
                                <?php
                                    $selectb_sql = "SELECT * FROM brand";
                                    $resultb = mysqli_query($conn, $selectb_sql);
                                    for($i=0;$i<$resultb->num_rows;$i++){
                                        $rowb = $resultb->fetch_assoc();
                                ?>
                                <option value="<?=$rowb['value']?>" <?php if($row['brand'] == $rowb['value']){ echo "selected"; } ?>><?=$rowb['brand']?></option>
                                <?php
                                    }
                                ?>
                                <option value="Others" <?php if($row['brand'] == "Others"){ echo "selected"; } ?>> Others </option>
                            </select>
                        </div>
                    </div>
                    
                    <div id="categoryControlled" class="row col-12 nopadd">
                        
                        <div id="computer" class="categoryitem">
                            
                            <div id="processor" class="row col-12 bottommargin">
                                <label class="col-12"><h5>Processor</h5></label>
                                <div class="form-group col-2">
                                    <label for="exampleFormControlSelect1">Type</label>
                                    <select class="form-control product-control computerElement" id="ptype">
                                        <option value="" disabled> Type</option>
                                        <option value="Intel" <?php if($rowps['type'] == "Intel"){ echo "selected"; } ?>> Intel </option>
                                        <option value="AMD" <?php if($rowps['type'] == "AMD"){ echo "selected"; } ?>> AMD </option>
                                    </select>
                                </div>
                                 <div class="form-group col-3">
                                    <label for="exampleFormControlSelect1">Series</label>
                                    <select class="form-control product-control computerElement" id="pseries" name="pseries">
                                        <option value="" disabled> Series</option>
                                        <?php
                                            $selectp_sql = "SELECT * FROM processorslist";
                                            $resultp = mysqli_query($conn, $selectp_sql);
                                            for($i=0;$i<$resultp->num_rows;$i++){
                                                $rowp = $resultp->fetch_assoc();
                                        ?>
                                        <option value="<?=$rowp['value']?>" class="<?=$rowp['type']?> ptypes" <?php if($rowps['series'] == $rowp['series']){ echo "selected"; } ?> ><?=$rowp['series']?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleFormControlSelect1">Model</label>
                                    <input type="text" id="pmodel" class="form-control product-control computerElement" placeholder="Enter Model" name="pmodel" value="<?=$row['pmodel']?>">
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleFormControlSelect1">Cache</label>
                                    <select class="form-control product-control computerElement" id="pcache" name="pcache" >
                                        <option value="" disabled> Cache</option>
                                        <?php 
                                            $cacheSize = [1, 2, 3, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 30, 32, 35, 40, 45, 50, 55, 60];
                                            $cacheCount = count($cacheSize);
                                            for($i=0;$i<$cacheCount;$i++){
                                        ?>
                                        <option value="<?=$cacheSize[$i]?>" <?php if($row['pcache'] == $cacheSize[$i]){ echo "selected"; } ?>> <?=$cacheSize[$i]?>MB </option>
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
                                            <option value="" disabled> RAM</option>
                                            <?php 
                                                $ramSize = [1, 2, 4, 6, 8, 12, 16, 20, 24, 32, 48, 64, 96, 128, 192, 256];
                                                $ramCount = count($ramSize);
                                                for($i=0;$i<$ramCount;$i++){
                                            ?>
                                            <option value="<?=$ramSize[$i]?>" <?php if($row['ram'] == $ramSize[$i]){ echo "selected"; } ?>> <?=$ramSize[$i]?>GB </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group col-6">
                                        <label for="exampleFormControlSelect1">Type</label>
                                        <select class="form-control product-control computerElement" id="ramtype" name="ramtype">
                                            <option value="" disabled selected> Type</option>
                                            <?php 
                                                $ramtypearr = [2, 3, 4];
                                                $ramtypearrCount = count($ramtypearr);
                                                for($i=0;$i<$ramtypearrCount;$i++){
                                            ?>
                                            <option value="<?=$ramtypearr[$i]?>" <?php if($row['ramtype'] == $ramtypearr[$i]){ echo "selected"; } ?>> DDR<?=$ramtypearr[$i]?> </option>
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
                                            <?php
                                                $phardValue = $row['hard'];
                                                $phardarray = explode(" ",$phardValue);
                                                $phardSize = "none";
                                                $phardtype = "none";
                                                if($phardValue != "none"){
                                                    $phardSize = preg_replace('/[^0-9.]+/', '', $phardarray[0]);
                                                    $phardtype = $phardarray[1];
                                                }   
                                            ?>
                                            <option value="" disabled <?php if($phardSize == "none"){ echo "selected"; } ?>> Hard</option>
                                            <?php 
                                                $hardSize = [32, 64, 80, 128, 256, 500, 1, 2, 4, 5, 6, 8, 10];
                                                $hardCount = count($hardSize);
                                                for($i=0;$i<$hardCount;$i++){
                                            ?>
                                            <option value="<?=$hardSize[$i]?>" <?php if($phardSize == $hardSize[$i]){ echo "selected"; } ?>> <?=$hardSize[$i]?><?php if($hardSize[$i]<30){echo "TB";}else{echo "GB";}?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                     <div class="form-group col-6">
                                        <select class="form-control product-control computerElement" id="phardtype" name="phardtype">
                                            <option value="" <?php if($phardtype == "none"){ echo "selected"; } ?> disabled> Type</option>
                                            <?php
                                                $hardType = ['HDD', 'SSD', 'M2'];
                                                $hardTypeCount = count($hardType);
                                                for($i=0;$i<$hardTypeCount;$i++){
                                            ?>
                                            <option value="<?=$hardType[$i]?>" <?php if($phardtype == $hardType[$i]){ echo "selected"; } ?>> <?=$hardType[$i]?> </option>
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
                                            <?php
                                                $shardValue = $row['sechard'];
                                                $shardarray = explode(" ",$shardValue);
                                                $shardSize = "none";
                                                $shardtype = "none";
                                                if($shardValue != "none"){
                                                    $shardSize = preg_replace('/[^0-9.]+/', '', $shardarray[0]);
                                                    $shardtype = $shardarray[1];
                                                }   
                                            ?>
                                            <option value="none" <?php if($shardSize == "none"){ echo "selected"; } ?>> None</option>
                                            <?php 
                                                for($i=0;$i<$hardCount;$i++){
                                            ?>
                                            <option value="<?=$hardSize[$i]?>" <?php if($shardSize == $hardSize[$i]){ echo "selected"; } ?>> <?=$hardSize[$i]?><?php if($hardSize[$i]<30){echo "TB";}else{echo "GB";}?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                     <div class="form-group col-6">
                                        <select class="form-control product-control computerElement" id="shardtype" name="shardtype" <?php if($shardSize == "none"){ echo "disabled"; } ?>>
                                            <option value="none" <?php if($shardtype == "none"){ echo "selected"; } ?>> None </option>
                                            <?php
                                                for($i=0;$i<$hardTypeCount;$i++){
                                            ?>
                                            <option value="<?=$hardType[$i]?>" <?php if($shardtype == $hardType[$i]){ echo "selected"; } ?>> <?=$hardType[$i]?> </option>
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
                                            <option value="" disabled <?php if($row['vgatype'] == "none"){ echo "selected"; } ?>> Type</option>
                                           <?php
                                                $vgaType = ['Intel', 'Nvidia', 'AMD'];
                                                $vgaTypeCount = count($vgaType);
                                                for($i=0;$i<$vgaTypeCount;$i++){
                                            ?>
                                            <option value="<?=$vgaType[$i]?>" <?php if($row['vgatype'] == $vgaType[$i]){ echo "selected"; } ?>> <?=$vgaType[$i]?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group col-8">
                                        <label for="exampleFormControlSelect1">Model</label>
                                        <input type="text" id="vgamodel" class="form-control product-control computerElement" placeholder="Enter Model" name="vgamodel" value="<?=$row['vgamodel']?>">
                                    </div>
                                </div>
                                
                                <div id="exvga" class="row col-6">
                                    <div class="form-group col-4">
                                        <label for="exampleFormControlSelect1"><h5>Ext VGA</h5></label>
                                        <select class="form-control product-control computerElement" id="exvgatype" name="exvgatype">
                                            <option value="none" <?php if($row['exvgatype'] == "none"){ echo "selected"; } ?>> None</option>
                                            <?php
                                                for($i=0;$i<$vgaTypeCount;$i++){
                                            ?>
                                            <option value="<?=$vgaType[$i]?>" <?php if($row['exvgatype'] == $vgaType[$i]){ echo "selected"; } ?>> <?=$vgaType[$i]?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group col-8">
                                        <label for="exampleFormControlSelect1">Model</label>
                                        <input type="text" id="exvgamodel" class="form-control product-control" placeholder="Enter Model" name="exvgamodel" <?php if($row['exvgatype'] != "none"){ $exvgamodelV=$row['exvgamodel']; echo 'value= "'.$exvgamodelV.'"';}else{echo "disabled";} ?>>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div id="monitor" class="row col-12 bottommargin categoryitem">
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>Display</h5></label>
                                <div class="row col-12">
                                    <div class="col-8 nopadd"><input type="text" id="display" class="form-control product-control monitorElement" placeholder="Display Size" name="display" value="<?=$row['display']?>"></div>
                                    <div class="col-4 middlevertical">inch</div>
                                </div>
                            </div>
                                
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>Resolution</h5></label>
                                <input type="text" id="resolution" class="form-control product-control monitorElement" placeholder="Enter Display Resolution" name="resolution" value="<?=$row['resolution']?>" >
                            </div>
                            
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>HDMI</h5></label>
                                <select class="form-control product-control monitorElement" id="hdmi" name="hdmi">
                                    <option value="" disabled <?php if($row['hdmi'] == "none"){ echo "selected"; } ?>> HDMI</option>
                                    <option value="Yes" <?php if($row['hdmi'] == "Yes"){ echo "selected"; } ?>> Yes </option>
                                    <option value="No" <?php if($row['hdmi'] == "No"){ echo "selected"; } ?>> No </option>
                                </select>
                            </div>
                                
                        </div>
                        
                        <div id="interfaces" class="row col-12 bottommargin categoryitem">
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>Ethernet</h5></label>
                                <select class="form-control product-control interfaceElement" id="ethernet" name="ethernet">
                                    <option value="none" <?php if($row['ethernet'] == "none"){ echo "selected"; } ?>> None </option>
                                    <?php
                                        for($i=1;$i<6;$i++){
                                    ?>
                                    <option value="<?=$i?>" <?php if($row['ethernet'] == $i){ echo "selected"; } ?>> <?=$i?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                                
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>Wifi</h5></label>
                                <select class="form-control product-control interfaceElement" id="wifi" name="wifi">
                                    <option value="" disabled <?php if($row['wifi'] == "none"){ echo "selected"; } ?>> Wifi</option>
                                    <option value="Yes" <?php if($row['wifi'] == "Yes"){ echo "selected"; } ?>> Yes </option>
                                    <option value="No" <?php if($row['wifi'] == "No"){ echo "selected"; } ?>> No </option>
                                </select>
                            </div>
                            
                            <div class="form-group col-sm">
                                <label for="exampleFormControlSelect1"><h5>USB2</h5></label>
                                <select class="form-control product-control interfaceElement" id="usb2" name="usb2">
                                    <?php
                                        for($i=0;$i<21;$i++){
                                    ?>
                                    <option value="<?=$i?>" <?php if($row['usb2'] == $i){ echo "selected"; } ?>> <?=$i?> </option>
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
                                    <option value="<?=$i?>" <?php if($row['usb3'] == $i){ echo "selected"; } ?>> <?=$i?> </option>
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
                                    <option value="<?=$i?>" <?php if($row['usbc'] == $i){ echo "selected"; } ?>> <?=$i?> </option>
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
                                    <div class="col-6 nopadd"><input type="text" id="speed" class="form-control product-control speedElement" placeholder="Print Speed" name="speed" value="<?=$row['speed']?>"></div>
                                    <div class="col-6 middlevertical">Paper per Minute</div>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleFormControlSelect1"><h5>Paper Size</h5></label>
                                <select class="form-control product-control speedElement" id="papersize" name="papersize">
                                    <option value="" disabled <?php if($row['papersize'] == "none"){ echo "selected"; } ?>> Paper Size</option>
                                    <option value="A4" <?php if($row['papersize'] == "A4"){ echo "selected"; } ?>> A4 </option>
                                    <option value="A3" <?php if($row['papersize'] == "A3"){ echo "selected"; } ?>> A3 </option>
                                </select>
                            </div>
                        </div>
                            
                        <div id="descriptionSection" class="row col-12 bottommargin categoryitem">
                            <div class="form-group col-12">
                                <label for="exampleFormControlSelect1"><h5>English Description</h5></label>
                                <textarea type="text" id="description" class="form-control product-control descriptionElement" placeholder="Enter Product Description" name="description"><?=$row['description']?></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleFormControlSelect1"><h5>Arabic Description</h5></label>
                                <textarea type="text" id="description_ar" class="form-control product-control descriptionElement" placeholder="Enter Arabic Product Description" name="description_ar"><?=$row['description_ar']?></textarea>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div id="price" class="row col-12 bottommargin" >
                        <div class="form-group nopadd col-4">
                            <label for="exampleFormControlSelect1"><h5>Price</h5></label>
                            <input type="text" class="form-control" placeholder="Enter Price" name="price" required value="<?=$row['price']?>">
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
        
        function prtype() {
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
        }
        
        if (ptype != null){
            window.addEventListener('load', function() { prtype(); });
            ptype.addEventListener('change', function() { prtype(); });
        }
    </script>
</main>