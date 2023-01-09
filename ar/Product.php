<main>
    <?php
        $id = $_GET['id'];
    ?>
   <div class="top-right">
        <div class="btn-group btn-group-toggle">
            <label class="btn btn-secondary b">
                <a class="lang" href="../Products.php?id=<?=$id?>">en</a> 
            </label>
            <label class="btn btn-secondarybtn btn-primary active b">
                <a class="lang" href="#">ar</a> 
            </label>
        </div>
    </div>
    
    
    <div class="row col-12  productpaddind">
        <div class="col-2 col-md-0 nomargin nopadd"></div>
        <div class="col-8 col-md-5 justify-content-center bd-highlight paddin">
            <?php
                $select_sql = "SELECT * FROM products WHERE id = '{$id}'";
                $result = mysqli_query($conn, $select_sql);
                $row = $result->fetch_assoc();
                $secimages = $row['secimages'];
                $secimagesarray = explode(",",$secimages);
                $secarraycount = count($secimagesarray);

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
            <div class="contain login-form center">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators seccarind">
                        <?php
                            for($i=0;$i<$secarraycount;$i++){   
                        ?>
                        <li data-target="#carouselExampleFade" data-slide-to="<?=$i?>" <?php if ($i==0){?>class="active"<?php }?> ></li>
                        <?php
                            }   
                        ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php
                            for($i=0;$i<$secarraycount;$i++){   
                        ?>
                        <div class="carousel-item <?php if ($i==0){?>active<?php }?>">
                            <img class="seccarousel" src="../Images/products/<?=$secimagesarray[$i]?>" alt="<?=$row['title']?>"/>
                        </div>
                        <?php
                            }
                        ?>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 col-md-0 nomargin nopadd"></div>
        
        <div class="col-1 col-md-0 nomargin nopadd"></div>
        <div class="col-10 col-md-7 bd-highlight ar right" style="padding-bottom:<?php if($categoryid == 6){echo "20";}else if($categoryid == 4 || $categoryid == 5 || $categoryid == 7){echo "32";}else{echo "8";} ?>%;">
            <h1 class="bottommargin"><?php if ($categoryid == 4){ echo $categoryAr;} ?> <?php if($row['brand'] != "Others"){ echo $brandAr; } ?> <?=$row['title_ar']?></h1>
            <table class="table table-striped table-primary">
                <tbody>
                    <tr>
                        <th scope="row">تصنيف</th>
                        <td><?=$categoryAr?></td>
                    </tr>
                    <?php
                        if($categoryid == 1 || $categoryid == 2 || $categoryid == 3){
                            $selectp_sql = "SELECT * FROM processorslist WHERE value='{$row['pseries']}'";
                            $resultp = mysqli_query($conn, $selectp_sql);
                            $rowp = $resultp->fetch_assoc();
                            $processor_ar = $rowp['type_ar']." ".$rowp['series_ar']." ".$row['pmodel'];
                                    
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
                    <tr>
                      <th scope="row">بروسيسور</th>
                      <td><?=$processor_ar?></td>
                    </tr>
                    <tr>
                      <th scope="row" >كاش ميموري</th>
                      <td ><?=$row['pcache']?> ميجابايت </td>
                    </tr> 
                    <tr>
                      <th scope="row" >رام</th>
                      <td ><?=$row['ram']?> جيجابايت دي دي ار <?=$row['ramtype']?></td>
                    </tr>
                    <tr>
                      <th scope="row" >التخزين</th>
                      <td ><?=$row['hard']?><?php if($row['sechard'] != "none"){ echo ', '.$row['sechard'];}?></td>
                    </tr>
                    <tr>
                      <th scope="row" >كارت الشاشة</th>
                      <td ><?=$vga_ar?></td>
                    </tr>
                    <?php 
                            if($exvga_ar != "none"){
                    ?>
                            <tr>
                              <th scope="row" >كارت الشاشة الخارجي</th>
                              <td ><?=$exvga_ar?></td>
                            </tr>
                    <?php
                            }
                        }
                        if($categoryid == 3 || $categoryid == 4){
                    ?>
                    <tr>
                      <th scope="row" >حجم الشاشة</th>
                      <td ><?=$row['display']?> بوصة</td>
                    </tr>
                    <tr>
                      <th scope="row" >دقة الشاشة</th>
                      <td ><?=$row['resolution']?></td>
                    </tr>
                    <tr>
                      <th scope="row" >HDMI</th>
                      <td ><?php if($row['hdmi'] == "Yes"){ echo "نعم";}else if($row['hdmi'] == "No"){ echo "لا"; } ?></td>
                    </tr>
                    <?php
                        }
                        if($categoryid == 1 || $categoryid == 2 || $categoryid == 3 || $categoryid == 4 || $categoryid == 6){
                            if($row['ethernet'] != "none"){
                    ?>
                        <tr>
                          <th scope="row" >كارت نتورك</th>
                          <td ><?php if($row['ethernet'] == 1){echo "نعم";}else{ echo $row['ethernet']." كروت";}?></td>
                        </tr>
                    <?php
                            }
                            if($row['wifi'] == "Yes"){
                    ?>
                        <tr>
                          <th scope="row" >واي فاي</th>
                          <td >نعم</td>
                        </tr>
                    <?php
                            }
                            if($row['usb2'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >يو اس بى</th>
                          <td ><?php if($row['usb2'] == 1){echo "نعم";}else{echo $row['usb2']." مدخل";}?></td>
                        </tr>
                    <?php
                            }
                            if($row['usb3'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >يو اس بى 3</th>
                          <td ><?php if($row['usb3'] == 1){echo "مدخل واحد";}else{echo $row['usb3']." مدخل";}?></td>
                        </tr>
                    <?php
                            }
                            if($row['usbc'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >يو اس بى نوع C</th>
                          <td ><?php if($row['usbc'] == 1){echo "مدخل واحد";}else{echo $row['usbc']." مدخل";}?></td>
                        </tr>
                    <?php
                            }
                        }
                        if($categoryid == 6){
                            if($row['speed'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >سرعة الطباعة</th>
                          <td ><?=$row['speed']?> ورقة في الدقيقة</td>
                        </tr>
                    <?php
                            }
                    ?>
                    <tr>
                      <th scope="row" >حجم الورق</th>
                      <td ><?=$row['papersize']?></td>
                    </tr>
                    <?php
                        }
                        if($categoryid == 5 || $categoryid == 6 || $categoryid == 7){
                    ?>
                    <tr>
                      <th scope="row" >وصف</th>
                      <td ><?=$row['description_ar']?></td>
                    </tr>
                    <?php
                            }
                    ?>
                    <tr>
                        <th scope="col" style="width: 25%">السعر</th>
                        <th scope="col" style="width: 75%"><?=$row['price']?> جنيه</th>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</main>