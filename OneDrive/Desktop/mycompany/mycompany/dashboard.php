<?php include('partials/menu.php'); ?>

   <!-- content -->
     <div class="menu-content">
        <div class="wrapper">
          <h1>Dashbord</h1>
          <br><br>
          <?php
             if(isset($_SESSION['signin']))
              {
                 echo $_SESSION['signin'];
                 unset($_SESSION['signin']);
              } 
           ?>
           <br><br>
         <div class="col-4 text-center">
          <?php
           $sql="SELECT * FROM search_form ";

           $res=mysqli_query($conn,$sql);

           $count=mysqli_num_rows($res);


          ?>

          <h1><?php echo $count; ?></h1>
          Rent Forms
         </div>
         <div class="col-4 text-center">
         <?php
           $sql2="SELECT * FROM  book_form";

           $res2=mysqli_query($conn,$sql2);

           $count2=mysqli_num_rows($res2);


          ?>
          <h1><?php echo $count2; ?></h1>
          Bookings
         </div>
         <div class="col-4 text-center">
         <?php
           $sql3="SELECT * FROM sub_form ";

           $res3=mysqli_query($conn,$sql3);

           $count3=mysqli_num_rows($res3);


          ?>
          <h1><?php echo $count3; ?></h1>
          Subscribers
         </div>
         <div class="col-4 text-center">
          <?php 
           $sql4="SELECT SUM(total) AS TOTAL FROM tbl_order WHERE status='Delivered'";

           $res4=mysqli_query($conn,$sql4);

           $row4=mysqli_fetch_assoc($res4);

           $total_revenue=$row4['TOTAL'];


          ?>
          <h1>₹<?php echo $total_revenue; ?></h1>
          Revenue Generated
         </div>
         <div class="clearfix"></div>
       </div>    
     </div>
   <!--menu content end-->

 <?php include('partials/footer.php')?>