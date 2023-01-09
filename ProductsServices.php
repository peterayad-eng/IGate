    <section class="backcolor" id="products" >
        <div class="row col-12 nopadd nomargin">
            <div id="options" class="col-5 col-sm-4 col-md-3 themecolor footerpadd">
                <h3 class="ourhead headcolor wow bounceInDown nomargin paddin">Categories</h3>	  
                <div class="leftpadd textcolor wow fadeInUp">
                    <div class="option-set" data-group="type">
                        <?php
                            $selectc_sql = "SELECT * FROM category";
                            $resultc = mysqli_query($conn, $selectc_sql);
                            for($i=0;$i<$resultc->num_rows;$i++){
                                $rowc = $resultc->fetch_assoc();
                        ?>
                        <div class="checkbox">
                            <input class="verticalcenter" type="checkbox" value=".<?=$rowc['value']?>"/>
                            <label class=""><?=$rowc['category']?></label>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <h3 class="ourhead headcolor wow bounceInDown nomargin paddin">Brand</h3>	  
                <div class="leftpadd textcolor wow fadeInUp">
                    <div class="option-set" data-group="brand">
                        <?php
                            $selectb_sql = "SELECT * FROM brand";
                            $resultb = mysqli_query($conn, $selectb_sql);
                            for($i=0;$i<$resultb->num_rows;$i++){
                                $rowb = $resultb->fetch_assoc();
                        ?>
                        <div class="checkbox">
                            <input class="verticalcenter" type="checkbox" value=".<?=$rowb['value']?>"/>
                            <label class=""><?=$rowb['brand']?></label>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="checkbox">
                            <input class="verticalcenter" type="checkbox" value=".Others"/>
                            <label class="">Others</label>
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
                            $categoryEn = $rowca['category'];
                    ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 nopadd center item <?=$row['category']?> <?=$row['brand']?>">
                        <div class="card wow bounceInDown">
                            <a href="Products.php?id=<?=$id?>" class="card-img-top card-image"><img src="Images/products/<?=$row['primaryimage']?>" class="card-img-top card-image" alt="<?=$row['title']?>"></a>
                            <div class="card-body">
                                <h5 class="card-title height2line middlevertical justifycenter"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['title']?> <?php if ($categoryid == 4){ echo $categoryEn;} ?></h5>

                                <?php
                                     if($categoryid == 1 || $categoryid == 2 || $categoryid == 3){
                                        $selectp_sql = "SELECT * FROM processorslist WHERE value='{$row['pseries']}'";
                                        $resultp = mysqli_query($conn, $selectp_sql);
                                        $rowp = $resultp->fetch_assoc();
                                        $processor = $processor = $rowp['type']." ".$rowp['series']." ".$row['pmodel']." ".$row['pcache']."MB Cache";

                                        $vga = $row['vgatype']." ".$row['vgamodel'];
                                        if($row['exvgatype'] != "none"){
                                            $exvga = $row['exvgatype']." ".$row['exvgamodel'];
                                        }else{
                                            $exvga = "none";
                                        }
                                ?>
                                        <p class="card-text height4line middlevertical justifycenter"><?=$processor?>, <?=$row['ram']?>GB RAM, <?=$row['hard']?>, <?php if($row['sechard'] != "none"){ echo $row['sechard'].', '; } ?>VGA <?php if($exvga != "none"){ echo $exvga; }else{echo $vga;} ?></p>
                                <?php
                                      }elseif($categoryid == 4){
                                ?>
                                        <p class="card-text height4line middlevertical justifycenter"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$categoryEn?> <?=$row['display']?> inch, <?=$row['resolution']?>, <?php if($row['hdmi'] == "yes"){ echo 'HDMI'; } ?></p>
                                <?php
                                    }elseif($categoryid == 5 || $categoryid == 7){
                                ?>
                                        <p class="card-text height4line middlevertical justifycenter"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['description']?></p>
                                <?php
                                    }elseif($categoryid == 6){
                                ?>
                                        <p class="card-text height4line middlevertical justifycenter"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['papersize']?> <?php if($row['usb2'] != 0 || $row['usb3'] != 0){ echo ", USB"; } if($row['ethernet'] != "none"){ echo ", Ethernet"; } if($row['wifi'] == "yes"){ echo ", Wireless"; } ?> <?=$categoryEn?></p>
                                <?php
                                    }
                                ?>
                                <p class="btn btn-secondary nomargin"><?=$row['price']?> EGP</p>
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
</main>