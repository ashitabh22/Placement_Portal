<!-- header begin -->
<!DOCTYPE html>
<html lang=en-US>

<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Description" content="IIT Bhilai Main Page" />
    <meta name="KeyWords" content="IIT Bhilai, Youngest IIT, Premier Engineering Institute of India, IIT Bhilai" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/a.css">
    <link rel="stylesheet" href="./css/b.css">
    <link rel="stylesheet" href="./css/c.css">
    <link rel="stylesheet" href="./css/table.css">

    <script type="text/javascript" src="./js/d.js"></script>

    <style type="text/css">
        .modal-dialog {
            max-width: 700px;
            /* New width for default modal */
        }

        .modal {
            overflow-y: auto;
        }

        .modal-backdrop {
            visibility: hidden !important;
        }

        .modal.in {
            background-color: rgba(0, 0, 0, 0.5);

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<!-- header end -->
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
                            <a href="admin.php">Registered Students</a>
                        </li>
                        <li>
                            <a href="viewRegisteredCompany.php">Registered Company</a>
                        </li>
                        <li>
                            <a href="postJobs.php">Post Job</a>
                        </li>
                        <li>
                            <a href="PostedJobs.php">Posted Jobs</a>
                        </li>
                        <li>
                            <a href="AppliedStudents.php">Applied Students</a>
                        </li>
                        <!-- <li>
                            <a href="pptList.php">Pre-Placement List</a>
                        </li> -->
                        <li>
                            <a href="ppt.php">PPT Attendence</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right username" id="username" style="color: #4a3c8d;">
                <li>
                    <?php echo $_SESSION[SES]['uname']; ?>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!--header and top bar ends here--> 