<section id="Theme" class="themecolor">
	<?php
        $select_sql = "SELECT * FROM carousel";
        $result = mysqli_query($conn, $select_sql);
    ?>
	<div class="contain fullheight">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                    for($i=0;$i<$result->num_rows;$i++){   
                ?>
                <li data-target="#carouselExampleFade" data-slide-to="<?=$i?>" <?php if ($i==0){?>class="active"<?php }?> ></li>
                <?php
                    }   
                ?>
            </ol>
            
            <div class="carousel-inner">
                <?php
                    for($i=0;$i<$result->num_rows;$i++){   
                        $row = $result->fetch_assoc();
                ?>
                <div class="carousel-item <?php if ($i==0){?>active<?php }?>">
                    <img class="fullheight fullwidth" src="../Images/<?=$row['imagePath']?>" alt="<?=$row['caption_ar']?>"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="h3_1 wow bounceInDown ar"><?=$row['caption_ar']?></h3>
                    </div>
                </div>
                <?php
                    }
                ?>
              <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
        
            <div class="top-right">
                <div class="btn-group btn-group-toggle">
                    <label class="btn btn-secondary b">
                        <a class="lang" href="../ProductsSupport.php">en</a> 
                    </label>
                    <label class="btn btn-secondarybtn btn-primary active b">
                        <a class="lang" href="#">ar</a> 
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>