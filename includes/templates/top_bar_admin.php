
<div class="topBar affix-top" id="topbar">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <h2>Placement Cell</h2>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs">
            <li><a class="drop" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Logout</a></li>
        </ul>
    </div>
</div>
<!-- <nav class="navbar navbar-default affix-top" id="navigation" data-spy="affix" data-offset-top="20"> -->
<nav class="navbar navbar-default" id="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="main-nav-link">Home<b class="caret"></b>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="viewRegisteredCompany.php">View Registered Company</a>
                        </li>
                        <li>
                            <a href="postJobs.php">Post Job</a>
                        </li>
                        <li>
                            <a href="PostedJobs.php">Posted Jobs</a>
                        </li>
                        <!-- <li>
                            <a href="unverified.php">Unverified Students</a>
                        </li>
                        <li>
                            <a href="verified.php">Verified students</a>
                        </li> -->
                        <li>
                            <a href="AppliedStudents.php">Applied Students</a>
                        </li>
                        <li>
                            <a href="pptList.php">Pre-Placement List</a>
                        </li>
                        <li>
                            <a href="ppt.php">PPT Attendence</a>
                        </li>
                        <li>
                            <a href="finalPlacementStatus.php">Final Placement Status</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right main-nav-link" id="username">
                <li>
                    <?php 
                    $username = "Real admin";
                    echo $username; ?>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!--header and top bar ends here--> 