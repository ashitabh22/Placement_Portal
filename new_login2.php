<?php
unset($_SESSION);
session_start();
include('includes/settings.php');
include('includes/functions/common.php');
if (is_loggedin()) {
    redirect('form.php');
}
if (is_admin()) {
    redirect('admin.php');
}
?>
<?php include('includes/templates/header2.php'); ?>
<div class="topBar affix-top" id="topbar">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <h2 id="h2new"><b>Placement Cell</b></h2>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs">

        </ul>
    </div>
</div>

    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="container-fluid" style="padding:10%">
            <br>

            <div class="signin-form">
                <form class="form-signin" method="post" action="loginAction.php">
                    <h2 class="form-signin-heading">
                        <center><img height="150x" src="images/75.png"></center>
                    </h2>
                    <hr />
                    <div style="text-align: center; margin-bottom: 20px; padding: 5px 0 5px 0; background-color: #4a3c8d ; border-radius: 5px; color: #fff;">Login Here</div>
                    <center>
                        <p>
                            <?php
                            getMessage();
                            ?>
                        </p>
                    </center>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter LDAP ID" name="username" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" />
                    </div>
                    <hr />
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            &nbsp &nbsp &nbsp &nbsp
                            <button type="submit" class="btn btn-primary" id="btn-login">
                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
                            </button>


                        </div>
                </form>
            </div>
        </div>
    </div>

<?php include('includes/templates/footer2.php') ?>