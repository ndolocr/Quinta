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
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $administrator; ?> "> Administrators </div>
            <ul>
                <li>
                    <a href="administratorAdd.php"> Add New </a>
                </li>
                <li>
                    <a href="administratorViewAll.php"> View All </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END ADMINISTRATOR MENU ROW -->
    
    <!-- BEGIN CUSTOMER MENU ROW -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $category; ?> "> Category </div>
            <ul>
                <li>
                    <a href="categoryAdd.php"> Add New </a>
                </li>
                <li>
                    <a href="categoryViewAll.php"> View All </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END CUSTOMER MENU ROW -->
    
    <!-- BEGIN CUSTOMER MENU ROW -->
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
    <!-- END CUSTOMER MENU ROW -->
    
    <!-- BEGIN PRODUCT MENU ROW -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $product; ?> "> Products </div>
            <ul>
                <li>
                    <a href="productAdd.php"> Add New </a>
                </li>
                <li>
                    <a href="productViewAll.php"> View All </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END PRODUCT MENU ROW -->
    
    <!-- BEGIN SLIDE SHOW MENU ROW -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $slideShow; ?> "> Slide Show </div>
            <ul>
                <li>
                    <a href="slideShowAdd.php"> Add New </a>
                </li>
                <li>
                    <a href="slideShowViewAll.php"> View All </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END SLIDE SHOW MENU ROW -->
    
    <!-- BEGIN STOCK MENU ROW -->
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
    <!-- END STOCK MENU ROW -->
    
    <!-- BEGIN ORDER MENU ROW -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-12 menubox">
            <div class="menu-title  <?php echo $order; ?> "> Orders </div>
            <ul>                
                <li>
                    <a href="orderViewAll.php"> View All </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END ORDER MENU ROW -->
    
    
</div>