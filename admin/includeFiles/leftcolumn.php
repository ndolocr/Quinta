<div class="col-md-2 left-column">
    <!-- BEGIN SEARCH BAR ROW -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            
            <!-- BEGIN SEARCH BAR -->
            <div class="searchbar">
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="search" placeholder="Search..." class="searchtext">
                            </td>
                            
                        <!--</tr>
                        <tr>-->
                            <td>
                                <button type="submit" name="submit" class="searchbutton"> </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- END SEARCH BAR -->
            
        </div>
    </div>
    <!-- END SEARCH BAR ROW -->
    
    <!-- BEGIN DASHBOARD ROW -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 dashboard <?php echo $dashoboard; ?>">
            <a href="home.php" style="color:#FFF; text-decoration: none;"> DASHBOARD </a>
        </div>
    </div>
    <!-- END DASHBOARD ROW -->
    
    <!-- BEGIN ADMINISTRATOR MENU ROW -->
    <?php if($_SESSION['admin_add']=="Yes" AND $_SESSION['admin_view_all']=="Yes"){ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $administrator; ?> "> Administrators </div>
            <ul>
                <li>
                    <?php if($_SESSION['admin_add']=="Yes"){ ?>
                        <a href="administratorAdd.php"> Add New </a>
                    <?php } ?>
                </li>
                <li>
                    <?php if($_SESSION['admin_view_all']=="Yes"){ ?>
                        <a href="administratorViewAll.php"> View All </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <!-- END ADMINISTRATOR MENU ROW -->
    
    <!-- BEGIN CUSTOMER MENU ROW -->
    <?php if($_SESSION['category_add']=="Yes" AND $_SESSION['category_view_all']=="Yes"){ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $category; ?> "> Category </div>
            <ul>
                <li>
                    <?php if($_SESSION['category_add']=="Yes"){ ?>
                        <a href="categoryAdd.php"> Add New </a>
                    <?php } ?>
                </li>
                <li>
                    <?php if($_SESSION['category_view_all']=="Yes"){ ?>
                        <a href="categoryViewAll.php"> View All </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <!-- END CUSTOMER MENU ROW -->
    
    <!-- BEGIN CUSTOMER MENU ROW -->
    <?php if($_SESSION['customer_view_all']=="Yes"){ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $customer; ?> "> Customer </div>
            <ul>                
                <li>
                    <a href="customerViewAll.php"> View All </a>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <!-- END CUSTOMER MENU ROW -->
    
    <!-- BEGIN PRODUCT MENU ROW -->
    <?php if($_SESSION['product_add']=="Yes" AND $_SESSION['product_view_all']=="Yes"){ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $product; ?> "> Products </div>
            <ul>
                <li>
                    <?php if($_SESSION['product_add']=="Yes"){ ?>
                        <a href="productAdd.php"> Add New </a>
                    <?php } ?>
                </li>
                <li>
                    <?php if($_SESSION['product_view_all']=="Yes"){ ?>
                        <a href="productViewAll.php"> View All </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <!-- END PRODUCT MENU ROW -->
    
    <!-- BEGIN SLIDE SHOW MENU ROW -->
    <?php if($_SESSION['slideshow_add']=="Yes" AND $_SESSION['slideshow_view_all']=="Yes"){ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $slideShow; ?> "> Slide Show </div>
            <ul>
                <li>
                    <?php if($_SESSION['slideshow_add']=="Yes"){ ?>
                        <a href="slideShowAdd.php"> Add New </a>
                    <?php } ?>
                </li>
                <li>
                    <?php if($_SESSION['slideshow_view_all']=="Yes"){ ?>
                        <a href="slideShowViewAll.php"> View All </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <!-- END SLIDE SHOW MENU ROW -->
    
    <!-- BEGIN STOCK MENU ROW -->
    <?php if($_SESSION['stock_add']=="Yes"){ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $stock; ?> "> Stocks </div>
            <ul>                
                <li>
                    <a href="stockAdd.php"> Re-Stock </a>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <!-- END STOCK MENU ROW -->
    
    <!-- BEGIN ORDER MENU ROW -->
    <!-- <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $order; ?> "> Orders </div>
            <ul>                
                <li>
                    <a href="orderViewAll.php"> View All </a>
                </li>
            </ul>
        </div>
    </div> -->
    <!-- END ORDER MENU ROW -->

    <!-- BEGIN ORDER MENU ROW -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $profile; ?> "> My Profile </div>
            <ul>                
                <li>
                    <a href="profileView.php?id=<?php echo $_SESSION['id'] ?>"> View Profile </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END ORDER MENU ROW -->
    
    
</div>