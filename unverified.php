<?php
session_start();
require_once("includes/database.php");
require_once("includes/settings.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();

$sql = "SELECT * FROM unverified_students";
$res = $db->getData($sql);

?>

<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar.php'); ?>


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
                    <div class="wrapper">
                        <div id="sub-header"></div>
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Unverified Students List</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <input type="text" placeholder="Search by Name" id="mySearch">
                                                </div>
                                                <div class="col-md-5 col-xs-6 col-sm-5">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="PPT date"> &nbsp &nbsp &nbsp Sort Branch Wise &nbsp &nbsp </label>
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                <option selected>Sort Branch Wise</option>
                                                                <option value="1">B.Tech CSE</option>
                                                                <option value="2">B.Tech ME</option>
                                                                <option value="3">B.Tech EE</option>
                                                                <option value="1">M.Tech CSE</option>
                                                                <option value="2">M.Tech ME</option>
                                                                <option value="3">M.Tech EE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="ex1 scrolling">
                                                <style>
                                                    .scrolling {
                                                        overflow-y: auto;
                                                        max-height: 350px;
                                                    }
                                                </style>
                                                <table class="table table-striped table-hover" id="stdlist">
                                                    <thead>
                                                        <tr>
                                                            <th>Student_ID</th>
                                                            <th>Email</th>
                                                            <th>Profile_Link</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">

                                                    <tbody id="myTable">
                                                        <?php for ($i = 0; $i < ($res['NO_OF_ITEMS']); $i++) { ?>

                                                        <tr>
                                                            <td><?php echo $res['oDATA'][$i]['name'] ?></td>
                                                            <td><?php echo $res['oDATA'][$i]['email_id'] ?></td>
                                                            <td>

                                                                <button type="button" data-toggle="modal" data-target=<?php echo "#myModal" . $i ?>>View</button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id=<?php echo "myModal" . $i ?> role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title text-center">Student_ID</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-hover table-striped table-bordered table-condensed">
                                                                                    <tr>
                                                                                        <th> Sr.</th>
                                                                                        <th>Field</th>
                                                                                        <th>Description</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>1.</td>
                                                                                        <td>Name</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['name'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>2.</td>
                                                                                        <td>Semester</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['semester'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>3.</td>
                                                                                        <td>Student ID</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['student_id'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>4.</td>
                                                                                        <td>Discipline</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['discipline'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>5.</td>
                                                                                        <td>Email-Id</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['email_id'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>6.</td>
                                                                                        <td>Age</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['age'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>7.</td>
                                                                                        <td>Contact-1</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['contact_1'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>8.</td>
                                                                                        <td>Contact-2</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['contact_2'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>9.</td>
                                                                                        <td>Program</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['program'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>10.</td>
                                                                                        <td>CGPA</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['cgpa'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>11.</td>
                                                                                        <td>Class XII School</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['xii_school'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>12.</td>
                                                                                        <td>Class XII percentage</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['xii_percentage'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>13.</td>
                                                                                        <td>Class X School</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['x_school'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>14.</td>
                                                                                        <td>Class X percentage</td>
                                                                                        <td><?php echo $res['oDATA'][$i]['x_percentage'] ?></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Go to Page</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <?php 
                                                      } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-7" ">
                            <button type=" submit" class="btn btn-primary" onclick="showRecord();">
                                                &nbsp; Print
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <script type="text/javascript">
                        var cd;
                        $(function() {
                            CreateCaptcha();
                        });
                        // Create Captcha
                        function CreateCaptcha() {
                            //$('#InvalidCapthcaError').hide();
                            var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                            var i;
                            for (i = 0; i < 6; i++) {
                                var a = alpha[Math.floor(Math.random() * alpha.length)];
                                var b = alpha[Math.floor(Math.random() * alpha.length)];
                                var c = alpha[Math.floor(Math.random() * alpha.length)];
                                var d = alpha[Math.floor(Math.random() * alpha.length)];
                                var e = alpha[Math.floor(Math.random() * alpha.length)];
                                var f = alpha[Math.floor(Math.random() * alpha.length)];
                            }
                            cd = a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f;
                            $('#CaptchaImageCode').empty().append('<canvas id="CapCode" class="capcode" width="300" height="80"></canvas>')
                            var c = document.getElementById("CapCode"),
                                ctx = c.getContext("2d"),
                                x = c.width / 2,
                                img = new Image();
                            img.src = "https://www.iitbhilai.ac.in/index.php?pid=img_captcha";
                            img.onload = function() {
                                var pattern = ctx.createPattern(img, "repeat");
                                ctx.fillStyle = pattern;
                                ctx.fillRect(0, 0, c.width, c.height);
                                ctx.font = "46px Roboto Slab";
                                ctx.fillStyle = '#ccc';
                                ctx.textAlign = 'center';
                                ctx.setTransform(1, -0.12, 0, 1, 0, 15);
                                ctx.fillText(cd, x, 55);
                            };
                        }
                        // Validate Captcha
                        function ValidateCaptcha() {
                            var string1 = removeSpaces(cd);
                            var string2 = removeSpaces($('#UserCaptchaCode').val());
                            if (string1 == string2) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                        // Remove Spaces
                        function removeSpaces(string) {
                            return string.split(' ').join('');
                        }
                        // Check Captcha
                        function CheckCaptcha() {
                            var result = ValidateCaptcha();
                            if ($("#UserCaptchaCode").val() == "" || $("#UserCaptchaCode").val() == null || $("#UserCaptchaCode").val() == "undefined") {
                                window.alert('Please enter captcha given below in a picture.');
                                $('#UserCaptchaCode').focus();
                                return false;
                            } else {
                                if (result == false) {
                                    window.alert('Invalid Captcha! Please try again.');
                                    CreateCaptcha();
                                    $('#UserCaptchaCode').focus();
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                        }
                    </script>
                    <script type="text/javascript">
                        function validateURL(url) {
                            var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
                            if (pattern.test(url)) {
                                return true;
                            }
                            return false;

                        }
                    </script>
                    <script type="text/javascript">
                        function checkForm() {
                            var cmp_name = document.forms["cmpReg"]["cmp_name"];
                            var cmp_addr = document.forms["cmpReg"]["cmp_post_addr"];
                            var cmp_url = document.forms["cmpReg"]["cmp_url"];
                            var cmp_offc_phno = document.forms["cmpReg"]["cmp_offc_phno"];
                            var fpoc_name = document.forms["cmpReg"]["fpoc_name"];
                            var fpoc_desig = document.forms["cmpReg"]["fpoc_desig"];
                            var fpoc_email = document.forms["cmpReg"]["fpoc_email"];
                            var fpoc_phno = document.forms["cmpReg"]["fpoc_phno"];

                            /*var cmp_desc_file = document.forms["cmpReg"]["cmp_desc_file"];*/
                            var cmp_desc = document.forms["cmpReg"]["cmp_desc"];

                            if (cmp_name.value.trim() == "") {
                                window.alert("Please enter Name of the Company.");
                                cmp_name.focus();
                                return false;
                            }
                            if (cmp_desc.value.trim() == "") {
                                window.alert("Please write about the Company");
                                cmp_desc.focus();
                                return false;
                            }
                            if (cmp_addr.value.trim() == "") {
                                window.alert("Please enter Postal Address of HR / Hiring Office.");
                                cmp_addr.focus();
                                return false;
                            }
                            if (cmp_offc_phno.value.trim() == "") {
                                window.alert("Please enter Office Phone Number.");
                                cmp_offc_phno.focus();
                                return false;
                            }
                            if (cmp_url.value.trim() == "") {
                                window.alert("Please enter your company website.");
                                cmp_url.focus();
                                return false;
                            } else {
                                if (!validateURL(cmp_url.value)) {
                                    window.alert("Invali company website");
                                    cmp_url.focus();
                                    return false;
                                }
                            }
                            if (fpoc_name.value.trim() == "") {
                                window.alert("Please enter your first point of contact name.");
                                fpoc_name.focus();
                                return false;
                            }
                            if (fpoc_desig.value.trim() == "") {
                                window.alert("Please enter your first point of contact designation.");
                                fpoc_desig.focus();
                                return false;
                            }
                            if (fpoc_email.value.trim() == "") {
                                window.alert("Please enter your first point of contact email address.");
                                fpoc_email.focus();
                                return false;
                            }
                            if (fpoc_phno.value.trim() == "") {
                                window.alert("Please enter your first point of contact number.");
                                fpoc_phno.focus();
                                return false;
                            }
                            if (CheckCaptcha()) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    </script>
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
                    <li class='active'><a href='' target=''></a></li>
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

<?php include('includes/templates/bottom_bar.php'); ?> 