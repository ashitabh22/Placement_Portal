<?php
@session_start();
include('includes/settings.php');
include('includes/functions/common.php');

if (is_loggedin()) {
    redirect('form.php');
}
if (is_admin()) {
    redirect('admin.php');
}
?>

<?php include('includes/templates/header.php'); ?>
<body>
    <div class="col-md-12">
        <div class="container-fluid">
            <br>
            <center>
                <h1 style="background-color: green; border-radius: 5px; color: #fff; padding: 5px 0 5px 0; font-size: 28px;"><?= SITE_TITLE ?></h1>
            </center>
            <div class="signin-form">
                <form class="form-signin" method="post" action="loginAction.php">
                    <h2 class="form-signin-heading">
                        <center><img height="150x" src="<?= BASE_URL ?>images/75.png"></center>
                    </h2>
                    <hr />
                    <div style="text-align: center; margin-bottom: 20px; padding: 5px 0 5px 0; background-color: #1179b3; border-radius: 5px; color: #fff;">Login Here</div>
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
                        <button type="submit" class="btn btn-primary" id="btn-login">
                            <span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('includes/templates/footer.php'); ?>