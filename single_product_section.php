    <a>
        <li>
  
          <a href="big_post.php"> 
          <input type="hidden" name="Product_ID" value = <?php echo $Product_ID ?> />
          <img src=<?php echo "images/".$Image ?> title="" alt="" />
          <section class="list-left">
            <h5 class="title"><?php echo $Product_Name ?></h5>
            <span Class="Product_description"><?php echo 	$Product_description ?> </span>
            <span class="adprice"> <?php  echo "$".$Price ?> </span>
            </section>
            <section class="list-right">
              <span class="date"><?php echo $Release_date ?></span>
              <br><span Class="Email"><?php echo htmlentities($Email)  ?></span><br>
              <span Class="contact_phone_number"> <?php echo $Phone_number ?></span>
               <input type="hidden" name="Product_ID" value = <?php echo $Product_ID ?> />
            </section>
            <div class="clearfix"></div>
          </li>
          </a>

  </li>
</a>
