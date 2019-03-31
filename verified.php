  <?php
    require_once("includes/database.php");
    require_once("includes/settings.php");
    require_once("includes/functions/common.php");
    require_once("includes/classes/db.cls.php");
    require_once("includes/classes/sitedata.cls.php");

    $db = new SiteData();

    $sql = "SELECT * FROM verified_students";
    $res = $db->getData($sql);

    ?>

  <?php include('includes/templates/header2.php'); ?>
  <?php include('includes/templates/top_bar_admin.php'); ?>


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
                                              <h3 class="panel-title">Verified Students List</h3>
                                          </div>
                                          <div class="panel-body">
                                              <div class="row">
                                                  &nbsp &nbsp &nbsp &nbsp &nbsp
                                                  <div class="col-md-3 col-xs-6 col-sm-3">
                                                      <input type="text" placeholder="Search by Name" id="search">
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
                                                          <?php for ($i = 0; $i < ($res['NO_OF_ITEMS']); $i++) { ?>

                                                          <tr>
                                                              <td><?php echo $res['oDATA'][$i]['name'] ?></td>
                                                              <td><?php echo $res['oDATA'][$i]['email_id'] ?></td>
                                                              <td>

                                                                  <button type="button" data-toggle="modal" data-target=<?php echo '#myModal' . $i; ?>>View</button>

                                                                  <!-- Modal -->
                                                                  <div class="modal fade" id=<?php echo 'myModal' . $i; ?> role="dialog">
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
                  </body>
              </div>
          </div>
      </div>
  </body> 