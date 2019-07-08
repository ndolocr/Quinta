<!-- BEGIN MENU BAR ROW -->
<div class="row menu-bar">
    
        <!-- -->
        <div class="col-md-9">
            <a href="home.php"> Azury Traders | Admin Page   </a>
        </div>
        <!-- -->

        <!-- -->
        <div class="col-md-3">
            <div class="viewing-information">
                <!--<div class="profile-pic"> <img src="#"> </div> -->
                <div class="admin-name"> 
                    Welcome: <a href="profileView.php?id=<?php echo $_SESSION['id']; ?>"><?php echo ' '.$_SESSION['firstname'].' '.$_SESSION['lastname'] ?> </a>
                </div>

                <div class="admin-name"> 
                    <a href="logout.php" style="color:#999999;"> <i class="fa fa-shopping-lock fa-1x"></i> Logout </a> 
                </div>
                <div class="clear-float"></div>
            </div>
        </div>
        <!-- -->
    

</div>
<!-- END MENU BAR ROW -->