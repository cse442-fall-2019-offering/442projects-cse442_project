<!DOCTYPE html>
<style>
test {
     width: 100%;
     height: 100%;
}
</style>
<a>
        <li>
          <img src=<?php echo "images/".$Image ?> title="" alt="" />
          <section class="list-left">
            <h5 class="title"><?php echo $Product_Name ?></h5>
            <span Class="Product_description"><?php echo 	$Product_description ?> </span>
            <span class="adprice"> <?php  echo "$".$Price ?> </span>
            </section>
            <section class="list-right">
              <form class="edit_form" method="GET" action= <?php if (isset($_SESSION['username'])){
                echo"update.php"; }?>>
                <input type="hidden" name="Product_ID" value = <?php echo $Product_ID ?> />
                <button>Edit</button>
              </form>
                                <!--only the user can delete post !-->
              <form class="dele_form" method="GET" action= <?php if (isset($_SESSION['username'])){
                echo"dele_post.php"; }?>>
                <input type="hidden" name="Product_ID" value = <?php echo $Product_ID ?> />
                <button onclick="return confirmDele()">Delete</button>
              </form>
              <span class="date"><?php echo $Release_date ?></span>
              <br><span Class="Email"><?php echo $Email ?></span> <br>
              <span Class="contact_phone_number"> <?php echo $Phone_number ?></span>
            </section>
            <div class="clearfix"></div>
          </li>
          </a>
        <script>
          function confirmDele(){
            return confirm("Are you sure you want to delete?");
          }
        </script>
