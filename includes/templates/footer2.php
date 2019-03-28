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
<script type="text/javascript" src="index.php?pid=js_bootstrapmin"></script>
<script>
    //google custom search engine
    (function() {
        var cx = '002503337570983062401:y-x0lh4xq70';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    });

    function btnHindiCulture() {
        var location = window.location.href;
        var new_location = location.split('&')[0];
        if (location.includes("culture"))
            location = removeParam("culture", location);
        var url = new URL(location);
        if (url.searchParams.get("pid") != null)
            window.location = location + "&culture=hi-IN"
        else {
            if (window.location.href.includes("index.php"))
                window.location = location + "?pid=home&culture=hi-IN";
            else
                window.location = location + "index.php?pid=home&culture=hi-IN"
        }
    }

    function btnEnglishCulture() {
        var location = window.location.href;
        var new_location = location.split('&')[0];
        if (location.includes("culture"))
            location = removeParam("culture", location);
        var url = new URL(location);
        if (url.searchParams.get("pid") != null)
            window.location = location + "&culture=en-US"
        else {
            if (window.location.href.includes("index.php"))
                window.location = location + "?pid=home&culture=en-US";
            else
                window.location = location + "index.php?pid=home&culture=en-US"
        }
    }

    function removeParam(key, URL) {
        var rtn = URL.split("?")[0],
            param,
            params_arr = [],
            queryString = (URL.indexOf("?") !== -1) ? URL.split("?")[1] : "";
        if (queryString !== "") {
            params_arr = queryString.split("&");
            for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                param = params_arr[i].split("=")[0];
                if (param === key) {
                    params_arr.splice(i, 1);
                }
            }
            rtn = rtn + "?" + params_arr.join("&");
        }
        return rtn;
    }

    function customizeFont(action) {
        current_size = parseInt($('#body').css('font-size'));
        current_box_height = parseInt($('.well').css('height'));
        new_size = 14;
        new_box_height = 200;
        if (action == 'up') {
            new_size = Math.min(current_size + 2, 18);
            new_box_height = Math.min(current_box_height + 50, 275)
        } else if (action == 'down') {
            new_size = Math.max(current_size - 2, 10);
            new_box_height = Math.max(current_box_height - 50, 200);
        }
        $('#body').css('font-size', new_size);
        new_box_height = new_box_height + 'px'
        $('.well').css('height', new_box_height);
        document.getElementById("card1").style.height = new_box_height;
        document.getElementById("card2").style.height = new_box_height;
        document.getElementById("card3").style.height = new_box_height;
    }
</script>
<script>
    function validateForm() {
        var x = document.forms["myform"]["pptdate"].value;
        if (x == "") {
            alert("date must be filled out");
            return false;
        }
    }
</script> 