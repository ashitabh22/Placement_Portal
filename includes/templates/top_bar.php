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