<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM POSTED_JOBS";
$res = $db->getData($sql);
if (isset($_POST['delete']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

	$company_id = $_POST['delete'];
	$del_query = "DELETE FROM " . POSTED_JOBS . " WHERE company_id = '" . $company_id . "'";

	if (mysql_query($del_query)) {
		redirect('PostedJobs1.php');
	} else {
		die(mysql_error());
	}
}
?>

<?php include('includes/templates/header2.php'); ?>

<body id="body">
    <!--header and top bar starts here-->
    <!-- <div class=" topBar affix-top" id="topbar" data-spy="affix" data-offset-top="0" > -->
    <div class="topBar affix-top" id="topbar">
        <div class="container">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=reach_us"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="hidden-xs">&nbsp;&nbsp;IIT Bhilai</span></a></li>
                <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=reach_us"><i class="fa fa-phone" aria-hidden="true"></i><span class="hidden-xs">&nbsp;&nbsp;+91-771-2973622 </span></a></li>
                <li><a href="mailto:administration@iitbhilai.ac.in"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs">&nbsp;&nbsp; administration@iitbhilai.ac.in </span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-xs">
                <li><a onclick="btnHindiCulture();" style="cursor: pointer;">हिन्दी</a></li>
                <li><a onclick="btnEnglishCulture();" style="cursor: pointer;">English</a></li>
                <li><a href="index.php" onclick="customizeFont('down');return false;">A<sup>-</sup></a></li>
                <li><a href="index.php" onclick="customizeFont('default');return false;">A</a></li>
                <li><a href="index.php" onclick="customizeFont('up');return false;">A<sup>+</sup></a></li>
                <li><a href="https://www.facebook.com/iit.bh/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/iitbhilai/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href=https://twitter.com/IIT_Bhilai?lang=en-US target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li>
                    <form class="navbar-form navbar-right" id="search_form" action="index.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="q" id="q" autocomplete="off" onkeydown="if(event.keyCode == 13) { SearchSite(); }" placeholder="Search">
                        </div>
                        <button type="button" class="btn btn-default" onclick="SearchSite();"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- <nav class="navbar navbar-default affix-top" id="navigation" data-spy="affix" data-offset-top="20"> -->
    <nav class="navbar navbar-default" id="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img class="img-responsive" src="index.php?pid=img_logo" alt="">
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="index.php?pid=administration" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="main-nav-link">Institute <b class="caret"></b>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=admin_aboutiitbh">About IIT Bhilai</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_administration">Administration</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_department">Departments</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=institute_facility">Institute Facility</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_academic">Academics</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_research">Research and Development</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=distinguished_professor">Distinguished Professor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <span class="main-nav-link">Recruitment <b class="caret"></b>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=rec_faculty">Faculty</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=rec_staff">Staff</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <span class="main-nav-link">Admissions <b class="caret"></b>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=adm_undergraduate">Undergraduate</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=adm_masters">Masters</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=adm_phd_new">PhD</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=adm_foreign">Foreign Students</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle">
                            <span class="main-nav-link">Alumni <b class="caret"></b>
                            </span>
                        </a>
                        <!-- <ul class="dropdown-menu" style="display: none">
									<li>
										<a href="https://www.iitbhilai.ac.in:443/index.php?pid=stu_people">Alumini Portal</a>
									</li>
								</ul> -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle">
                            <span class="main-nav-link">Placement <b class="caret"></b>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=placement">Placement</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=company_portal">Company Registration</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown" style="display: none">
                        <a class="dropdown-toggle">
                            <span class="main-nav-link">People <b class="caret"></b>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=fac_faculty">Faculty</a>
                            </li>
                            <li style="display: none">
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=pla_student">Students</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=fac_staff">Staff</a>
                            </li>
                            <li style="display: none">
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=pla_student">Admin</a>
                            </li>
                        </ul>
                    </li>
                    <li style="display: none">
                        <a href="https://www.iitbhilai.ac.in:443/index.php?pid=aca_admission">
                            <span class="main-nav-link">Admissions</span>
                        </a>
                    </li>
                    <li style="display: none">
                        <a href="https://www.iitbhilai.ac.in:443/index.php?pid=recruit_recruitments">
                            <span class="main-nav-link">Recruitment</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle">
                            <span class="main-nav-link">Announcements <b class="caret"></b>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=ann_tenders">Tenders</a>
                            </li>
                            <li>
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=holiday_2019">Holiday List Year 2019</a>
                            </li>

                            <li style="display: none">
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=news_seminar">Seminar</a>
                            </li>
                            <li style="display: none">
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=news_conference">Conferences</a>
                            </li>
                            <li style="display: none">
                                <a href="https://www.iitbhilai.ac.in:443/index.php?pid=news_achievements">Achievements</a>
                            </li>
                        </ul>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--header and top bar ends here-->

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-9" id="content">

                    <body id="content">
                        <style type="text/css">
                            .red {
                                color: #f20000;
                            }

                            #webdet {
                                display: none;
                            }
                        </style>




                        <!-- table Data -->



                        <div class="wrapper">
                            <div id="sub-header"></div>
                            <section class="content-header">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Posted Jobs</h3>
                                            </div>


                                            <div class="panel-body">
                                                <div class="row">
                                                    &nbsp &nbsp &nbsp &nbsp &nbsp
                                                    <div class="col-md-3 col-xs-6 col-sm-3">
                                                        <input type="text" placeholder="Search by Job Title" id="search">
                                                    </div>
                                                    <div class="col-md-5 col-xs-6 col-sm-5">
                                                        <div class="form-row align-items-center">
                                                            <div class="col-auto my-1">
                                                                <label for="PPT date"> &nbsp &nbsp &nbsp Sort By &nbsp &nbsp </label>
                                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                    <option selected>Sort By</option>
                                                                    <option value="1">Application Deadline </option>
                                                                    <option value="2">f1</option>
                                                                    <option value="3">f2</option>
                                                                    <option value="1">f3</option>
                                                                    <option value="2">f4</option>
                                                                    <option value="3">f5</option>
                                                                </select>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="ex1">
                                                    <table class="table" id="stdlist">
                                                        <thead>
                                                            <tr>
                                                                <th>Company ID</th>
                                                                <th>Job Title</th>
                                                                <th>Details</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id = "myTable">

                                                            <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                            <tr>
                                                                <td><?php echo $res['oDATA'][$i]['company_id'] ?></td>
                                                                <td><?php echo $res['oDATA'][$i]['job_title'] ?></td>
                                                                <td>

                                                                    <button type="button" data-toggle="modal" data-target= <?php echo "#myModal" . $i ?>>View</button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id=<?php echo "myModal" . $i ?> role="dialog">
                                                                        <div class="modal-dialog">

                                                                            <!-- Modal content-->
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Company ID</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <table class="table" id="stdlist">
                                                                                        <tr>
                                                                                            <th> Sr.</th>
                                                                                            <th>Job Info.</th>
                                                                                            <th>Details</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>1.</td>
                                                                                            <td>Job Description</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['job_description'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>2.</td>
                                                                                            <td>CGPA Requirement</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['cgpa_requirements'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>3.</td>
                                                                                            <td>Program</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['program'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>4.</td>
                                                                                            <td>Branch</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['branch'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>5.</td>
                                                                                            <td>Application Period</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['application_period'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>6.</td>
                                                                                            <td>Minimum Package Offered</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['minimum_package_offered'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>7.</td>
                                                                                            <td>Number of Posts</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['number_of_posts'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>8.</td>
                                                                                            <td>PPT Date</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['ppt_date'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>9.</td>
                                                                                            <td>Test Date</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['test_date'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>10.</td>
                                                                                            <td>Interview Date</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['interview_date'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>11.</td>
                                                                                            <td>Shortlisting Date</td>
                                                                                            <td><?php echo $res['oDATA'][$i]['shortlisting_date'] ?></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <a href="AppliedStudents.php">
                                                                                        <button type="button" name="abc">View Applied Students</button>
                                                                                    </a>




                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </td>
                                                                <form method="post">
                                                                    <td>
                                                                        <button type="submit" value="<?php echo $res['oDATA'][$i]['company_id'] ?>" name="delete">Delete</button>
                                                                    </td>
                                                                </form>
                                                            </tr>
                                                        </tbody>
                                                        <?php 
																											} ?>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-5"></div>
                                                <div class="col-sm-7">
                                                    <button type="submit" class="btn btn-primary" onclick="showRecord();">
                                                        &nbsp; Print
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>




                    </body>
                </div>
                <div class="col-md-3">
                    <!-- generated from related link file -->
                    <h3 class='mytitle'>placement</h3>
                    <ul class='mysidebar'>
                        <li class='active'><a href='index.php?pid=invi_letter_tnp' target='_self'> Placement Invitation</a></li>
                        <li class='active'><a href='index.php?pid=internship_procedure' target='_self'> Internship Procedure</a></li>
                        <li class='active'><a href='index.php?pid=placement_procedure' target='_self'> Placement Procedure</a></li>
                        <li class='active'><a href='index.php?pid=company_portal' target='_self'> Company Registration</a></li>
                        <li class='active'><a href='index.php?pid=placement_office' target='_self'> Placement Office</a></li>
                        <li class='active'><a href='
' target=''></a></li>
                    </ul>
                    <h3 class="mytitle">Navigation</h3>
                    <!--Tes-->
                    <ul class="mysidebar">
                        <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_department">Departments</a></li>
                        <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=institute_facility">Facilities</a></li>
                        <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_research">Research and Development</a></li>
                        <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_academic">Academics</a></li>
                        <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_administration">Administration</a></li>
                        <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=aca_admission">Admissions</a></li>
                    </ul>
                </div>
            </div>
        </div>



        <script>
            function blinker() {
                $('.blink_me').fadeOut(500);
                $('.blink_me').fadeIn(500);
            }

            setInterval(blinker, 2000);
        </script>
    </body>
    <!--footer section starts here-->

    <div class="footersection">
        <div class="topBar">
            <div class="container">
                <div class="row">
                    <div>
                        <table style="table-layout: auto; width: 100%;">
                            <tr style="white-space: nowrap; height: 40px;">
                                <td style="vertical-align: middle; width: 1%">
                                    <h4><a href="index.php?pid=fac_department" style="color: white">Faculty</a></h4>
                                </td>
                                <td style="width: auto">
                                    &nbsp;
                                </td>
                                <td style="vertical-align: middle; width: 1%">
                                    <h4><a href="index.php?pid=pro_faculty" style="color: white">Prospective Faculty</a></h4>
                                </td>
                                <td style="width: auto">
                                    &nbsp;
                                </td>
                                <td style="vertical-align: middle; width: 1%">
                                    <h4><a href="index.php?pid=students" style="color: white">Student</a></h4>
                                </td>
                                <td style="width: auto">
                                    &nbsp;
                                </td>
                                <td style="vertical-align: middle; width: 1%">
                                    <h4><a href="index.php?pid=pro_student" style="color: white">Prospective Students</a></h4>
                                </td>
                                <td style="width: auto">
                                    &nbsp;
                                </td>
                                <td style="vertical-align: middle; width: 1%">
                                    <h4><a style="color: white">Outreach</a></h4>
                                </td>
                                <td style="width: auto">
                                    &nbsp;
                                </td>
                                <td style="vertical-align: middle; width: 1%">
                                    <h4><a style="color: white">Media</a></h4>
                                </td>
                                <td style="width: auto">
                                    &nbsp;
                                </td>
                                <td style="vertical-align: middle; width: 1%">
                                    <h4><a style="color: white" href="index.php?pid=reach_us">Contact Us</a></h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="footerright">
                        <h4>Message From Director</h4>
                        <p>
                            IIT Bhilai is striving for research-driven undergraduate and postgraduate education. Our objective is to create an education system with multifacet outcomes including research, entrepreneurship, technical leadership, and above all, responsible citizenship. <a href="index.php?pid=admin_messagefromdirector">Read More</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <h4>Institute</h4>
                    <ul class="footerlinks">
                        <li><a href="/index.php?pid=happening_iit">All Stories</a></li>
                        <li><a href="/index.php?pid=IITBhilai_Profile">Profile of IIT Bhilai</a></li>
                        <!-- <li><a href="/index.php?pid=institutional_responsibilities">Institutional Responsibilites</a></li> -->
                        <li><a href="/index.php?pid=iitbh_intranet">Intranet</a></li>
                        <li><a href="https://aimsportal.iitbhilai.ac.in/iitbhAims/" target="_blank">AIMS Portal</a></li>
                        <li><a href="/index.php?pid=rti">RTI</a></li>
                    </ul>
                </div>
                <div class="col-md-2 ">
                    <h4>Information</h4>
                    <ul class="footerlinks">
                        <li><a href="/index.php?pid=info_gallery">Gallery</a></li>
                        <li><a href="/index.php?pid=info_sitemap">Sitemap</a></li>
                        <li><a href="https://polaris.iitbhilai.ac.in/" target="_blank">Polaris</a></li>
                        <li><a href="/index.php?pid=info_directory" target="_blank">Directory</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4><a href="/index.php?pid=newsletter">Newsletter</a></h4>
                    <p>Subscribe to our Newsletter and stay tuned.</p>
                    <form id="subscription_form" action="index.php" method="post">
                        <input type="text" class="form-control" placeholder="your@email.com" name="email_id"><br>
                        <button Text="Subscribe Now!" class="btn btn-large" onclick="">Subscribe Now!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="topBar">
        <div class="container">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">Copyright © 2017 - All Rights Reserved - IIT Bhilai</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">
                <!-- <li><a href="index.php?pid=faq">FAQ</a></li> -->
                <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <!-- <li><a href="index.php?pid=reach_us">Contact Us</a></li> -->
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on('hidden.bs.modal', function(event) {
            if ($('.modal:visible').length) {
                $('body').addClass('modal-open');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body> 