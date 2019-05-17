<?php
    include('dbfiles/dbconnect.php');
    include('include/header.php');    
?>          
        
<div class="row">
    <!-- BEGIN CATEGORY TITLE -->
    <div class="col-sm-12 product-title-bar">
        <div class="title">
            Login
        </div>                              
    </div>
    <!-- END CATEGORY TITLE -->
</div>
<!-- END ROW --> 

<div class="row">
    <!--<div class="col-md-6">
        Section One
    </div>-->

    <div class="col-md-6 col-md-offset-3">
        <form>
            <div class="form-body">
                <div class="form-group">
                    <label> Email Address </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="text" name="email" placeholder="Enter your Email!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Password </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        <input type="text" name="email" placeholder="Enter your Email!" class="form-control">
                    </div>
                </div>

                <div class="form-action">
                    <button type="submit" name="submit" class="btn blue sbold uppercase"> Login </button>
                </div>

            </div>
            
        </form>
    </div>
</div>             
                                      
<?php
    include('include/footer.php');
?>