<section class="backcolor" id="products" >
	<div class="row col-12 nopadd nomargin">
        <div id="options" class="col-5 col-sm-4 col-md-3 themecolor ar right rightpaddin footerpadd">
            <h3 class="ourhead headcolor wow bounceInDown nomargin paddin">التصنيف</h3>	  
            <div class="rightpadd textcolor wow fadeInUp">
                <div class="option-set" data-group="type">
                    <?php
                        $selectc_sql = "SELECT * FROM category";
                        $resultc = mysqli_query($conn, $selectc_sql);
                        for($i=0;$i<$resultc->num_rows;$i++){
                            $rowc = $resultc->fetch_assoc();
                    ?>
                    <div class="checkbox">
                        <input class="verticalcenter" type="checkbox" value=".<?=$rowc['value']?>"/>
                        <label class="rightpaddin"><?=$rowc['category_ar']?></label>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            
            <h3 class="ourhead headcolor wow bounceInDown nomargin paddin">الماركة</h3>	  
            <div class="rightpadd textcolor wow fadeInUp">
                <div class="option-set" data-group="brand">
                    <?php
                        $selectb_sql = "SELECT * FROM brand";
                        $resultb = mysqli_query($conn, $selectb_sql);
                        for($i=0;$i<$resultb->num_rows;$i++){
                            $rowb = $resultb->fetch_assoc();
                    ?>
                    <div class="checkbox">
                        <input class="verticalcenter" type="checkbox" value=".<?=$rowb['value']?>"/>
                        <label class="rightpaddin"><?=$rowb['brand_ar']?></label>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="checkbox">
                        <input class="verticalcenter" type="checkbox" value=".Others"/>
                        <label class="rightpaddin">أخرى</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-7 col-sm-8 col-md-9 backcolor nomargin nopadd footerpadd">
            <div id="filterComponent" class="row col-12 nopadd nomargin headcolor">
                <?php
                    $select_sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $select_sql);
                    for($i=0;$i<$result->num_rows;$i++){
                        $row = $result->fetch_assoc();
                        $id = $row['id'];
                        $selectca_sql = "SELECT * FROM category WHERE value = '{$row['category']}'";
                        $resultca = mysqli_query($conn, $selectca_sql);
                        $rowca = $resultca->fetch_assoc();
                        $categoryid = $rowca['id'];
                        $categoryAr = $rowca['category_ar'];
                            
                        $selectbr_sql = "SELECT * FROM brand WHERE value = '{$row['brand']}'";
                        $resultbr = mysqli_query($conn, $selectbr_sql);
                        $rowbr = $resultbr->fetch_assoc();
                        $brandAr = $rowbr['brand_ar'];
                        
                ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 nopadd center item <?=$row['category']?> <?=$row['brand']?>">
                    <div class="card wow bounceInDown">
                        <a href="Products.php?id=<?=$id?>" class="card-img-top card-image"><img src="../Images/products/<?=$row['primaryimage']?>" class="card-img-top card-image" alt="<?=$row['title']?>"></a>
                        <div class="card-body">
                            <h5 class="card-title height2line ar middlevertical justifycenter"><?php if ($categoryid == 4){ echo $categoryAr;} ?> <?php if($row['brand'] != "Others"){ echo $brandAr; } ?> <?=$row['title_ar']?> </h5>
                            
                            <?php
                                 if($categoryid == 1 || $categoryid == 2 || $categoryid == 3){
                                    $selectp_sql = "SELECT * FROM processorslist WHERE value='{$row['pseries']}'";
                                    $resultp = mysqli_query($conn, $selectp_sql);
                                    $rowp = $resultp->fetch_assoc();
                                    $processor_ar = $rowp['type_ar']." ".$rowp['series_ar']." ".$row['pmodel']." (".$row['pcache']."ميجا كاش ميموري)";
                                    
                                    if($row['vgatype'] == "Intel"){
                                        $vga_ar = "انتل ".$row['vgamodel'];
                                    }else if($row['vgatype'] == "Nvidia"){
                                        $vga_ar = "نفيديا ".$row['vgamodel'];
                                    }else if($row['vgatype'] == "AMD"){
                                        $vga_ar = "ايه ام دي ".$row['vgamodel'];
                                    }
                                    
                                    if($row['exvgatype'] == "Intel"){
                                        $exvga_ar = "انتل ".$row['exvgamodel'];
                                    }else if($row['exvgatype'] == "Nvidia"){
                                        $exvga_ar = "نفيديا ".$row['exvgamodel'];
                                    }else if($row['exvgatype'] == "AMD"){
                                        $exvga_ar = "ايه ام دي ".$row['exvgamodel'];
                                    }else{
                                        $exvga_ar = "none";
                                    }
                            ?>
                                    <p class="card-text height4line ar middlevertical justifycenter"><?=$processor_ar?>, <?=$row['ram']?>جيجا رام, <?=$row['hard']?>, <?php if($row['sechard'] != "none"){ echo $row['sechard'].', '; } ?> فيجا <?php if($exvga_ar != "none"){ echo $exvga_ar; }else{echo $vga_ar;}?></p>
                            <?php
                                  }elseif($categoryid == 4){
                            ?>
                                    <p class="card-text height4line ar middlevertical justifycenter"><?=$categoryAr?> <?php if($row['brand'] != "Others"){ echo $brandAr; } ?> <?=$row['display']?> بوصة, <?=$row['resolution']?>, <?php if($row['hdmi'] == "yes"){ echo 'HDMI'; } ?></p>
                            <?php
                                }elseif($categoryid == 5 || $categoryid == 7){
                            ?>
                                    <p class="card-text height4line ar middlevertical justifycenter"><?php if($row['brand'] != "Others"){ echo $brandAr; } ?> <?=$row['description_ar']?></p>
                            <?php
                                }elseif($categoryid == 6){
                            ?>
                                    <p class="card-text height4line ar middlevertical justifycenter"><?=$categoryAr?> <?php if($row['brand'] != "Others"){ echo $brandAr; } ?> <?=$row['papersize']?> <?php if($row['usb2'] != 0 || $row['usb3'] != 0){ echo ", يو اس بى"; } if($row['ethernet'] != "none"){ echo ", نتورك"; } if($row['wifi'] == "yes"){ echo ", وايرليس"; } ?> </p>
                            <?php
                                }
                            ?>
                            <p class="btn btn-secondary ar"><?=$row['price']?> جنيه</p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>   
    </div>
</section>