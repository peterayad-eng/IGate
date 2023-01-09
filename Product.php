<main>
     <?php
        $id = $_GET['id'];
    ?>
    <div class="top-right">
        <div class="btn-group btn-group-toggle">
            <label class="btn btn-primary active b">
                <a class="lang" href="#">en</a> 
            </label>
            <label class="btn btn-secondary b">
                 <a class="lang" href="ar/Products.php?id=<?=$id?>">ar</a> 
            </label>
        </div>
    </div>
    
    
    <div class="row col-12 d-flex flex-row-reverse bd-highlight productpaddind">
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
                $categoryEn = $rowca['category'];
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
                            <img class="seccarousel" src="Images/products/<?=$secimagesarray[$i]?>" alt="<?=$row['title']?>"/>
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
        <div class="col-10 col-md-7 bd-highlight" style="padding-bottom:<?php if($categoryid == 6){echo "20";}else if($categoryid == 4 || $categoryid == 5 || $categoryid == 7){echo "32";}else{echo "8";} ?>%;">
            <h1 class="bottommargin"><?php if($row['brand'] != "Others"){ echo $row['brand']; } ?> <?=$row['title']?> <?php if ($categoryid == 4){ echo $categoryEn;} ?></h1>
            <table class="table table-striped table-primary">
                <tbody>
                    <tr>
                        <th scope="row">Category</th>
                        <td><?=$categoryEn?></td>
                    </tr>
                    <?php
                        if($categoryid == 1 || $categoryid == 2 || $categoryid == 3){
                            $selectp_sql = "SELECT * FROM processorslist WHERE value='{$row['pseries']}'";
                            $resultp = mysqli_query($conn, $selectp_sql);
                            $rowp = $resultp->fetch_assoc();
                            $processor = $processor = $rowp['type']." ".$rowp['series']." ".$row['pmodel'];

                            $vga = $row['vgatype']." ".$row['vgamodel'];
                            if($row['exvgatype'] != "none"){
                                $exvga = $row['exvgatype']." ".$row['exvgamodel'];
                            }else{
                                $exvga = "none";
                            }
                    ?>
                    <tr>
                      <th scope="row">Processor</th>
                      <td><?=$processor?></td>
                    </tr>
                    <tr>
                      <th scope="row" >Cache Memory</th>
                      <td ><?=$row['pcache']?> MB</td>
                    </tr> 
                    <tr>
                      <th scope="row" >RAM</th>
                      <td ><?=$row['ram']?>GB DDR<?=$row['ramtype']?></td>
                    </tr>
                    <tr>
                      <th scope="row" >Storage</th>
                      <td ><?=$row['hard']?><?php if($row['sechard'] != "none"){ echo ', '.$row['sechard'];}?></td>
                    </tr>
                    <tr>
                      <th scope="row" >VGA</th>
                      <td ><?=$vga?></td>
                    </tr>
                    <?php 
                            if($exvga != "none"){
                    ?>
                            <tr>
                              <th scope="row" >External VGA</th>
                              <td ><?=$exvga?></td>
                            </tr>
                    <?php
                            }
                        }
                        if($categoryid == 3 || $categoryid == 4){
                    ?>
                    <tr>
                      <th scope="row" >Display Size</th>
                      <td ><?=$row['display']?> inch</td>
                    </tr>
                    <tr>
                      <th scope="row" >Resloution</th>
                      <td ><?=$row['resolution']?></td>
                    </tr>
                    <tr>
                      <th scope="row" >HDMI</th>
                      <td ><?=$row['hdmi']?></td>
                    </tr>
                    <?php
                        }
                        if($categoryid == 1 || $categoryid == 2 || $categoryid == 3 || $categoryid == 4 || $categoryid == 6){
                            if($row['ethernet'] != "none"){
                    ?>
                        <tr>
                          <th scope="row" >Ethernet</th>
                          <td ><?php if($row['ethernet'] == 1){echo "Yes";}else{ echo $row['ethernet']." Ports";}?></td>
                        </tr>
                    <?php
                            }
                            if($row['wifi'] == "Yes"){
                    ?>
                        <tr>
                          <th scope="row" >WIFI</th>
                          <td >Yes</td>
                        </tr>
                    <?php
                            }
                            if($row['usb2'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >USB</th>
                          <td ><?php if($row['usb2'] == 1){echo "Yes";}else{echo $row['usb2']." Ports";}?></td>
                        </tr>
                    <?php
                            }
                            if($row['usb3'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >USB 3</th>
                          <td ><?php if($row['usb3'] == 1){echo $row['usb3']." Port";}else{echo $row['usb3']." Ports";}?></td>
                        </tr>
                    <?php
                            }
                            if($row['usbc'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >USB TypeC</th>
                          <td ><?php if($row['usbc'] == 1){echo $row['usbc']." Port";}else{echo $row['usbc']." Ports";}?></td>
                        </tr>
                    <?php
                            }
                        }
                        if($categoryid == 6){
                            if($row['speed'] != 0){
                    ?>
                        <tr>
                          <th scope="row" >Print Speed</th>
                          <td ><?=$row['speed']?> Paper per Minute</td>
                        </tr>
                    <?php
                            }
                    ?>
                    <tr>
                      <th scope="row" >Paper Size</th>
                      <td ><?=$row['papersize']?></td>
                    </tr>
                    <?php
                        }
                        if($categoryid == 5 || $categoryid == 6 || $categoryid == 7){
                    ?>
                    <tr>
                      <th scope="row" >Description</th>
                      <td ><?=$row['description']?></td>
                    </tr>
                    <?php
                            }
                    ?>
                    <tr>
                        <th scope="col" style="width: 25%">Price</th>
                        <th scope="col" style="width: 75%"><?=$row['price']?>EGP</th>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</main>