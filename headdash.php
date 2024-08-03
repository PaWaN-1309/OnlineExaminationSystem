<?php
  session_start();
  ob_start();
  ?> 
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online examiner </title>
        <link  rel="stylesheet" href="css/bootstrap.min.css"/>
        <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="css/main.css">
        <link  rel="stylesheet" href="css/font.css">
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"  type="text/javascript"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <script>
          $(function () {
              $(document).on( 'scroll', function(){
                  console.log('scroll top : ' + $(window).scrollTop());
                  if($(window).scrollTop()>=$(".logo").height())
                  {
                        $(".navbar").addClass("navbar-fixed-top");
                  }
          
                  if($(window).scrollTop()<$(".logo").height())
                  {
                        $(".navbar").removeClass("navbar-fixed-top");
                  }
              });
          });
        </script>
    </head>
    <body  style="background:#eee;">
        <div class="header">
          <div class="row">
              <div class="col-lg-6"></div>
              <?php
              include_once "dbConnection.php";
              $email = $_SESSION["email"];
              if (!isset($_SESSION["email"])) {
                  header("location:index.php");
              } else {
                  $name = $_SESSION["name"];

                  include_once "dbConnection.php";
                  echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="headdash.php" class="log log1">' .
                      $name .
                      '</a>&nbsp;|&nbsp;<a href="logout.php?q=headdash.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
              }
              ?>
          </div>
        </div>
        <!-- admin start-->
        <!--navigation menu-->
        <nav class="navbar navbar-default title1">
          <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="headdash.php?q=0"><b>Dashboard - head</b></a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if (@$_GET["q"] == 0) {
                        echo 'class="active"';
                    } ?>><a href="headdash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
                    <!-- <li <?php if (@$_GET["q"] == 1) {
                        echo 'class="active"';
                    } ?>><a href="headdash.php?q=1">User</a></li> -->
                    <li class="dropdown <?php if (
                        @$_GET["q"] == 1.1 ||
                        @$_GET["q"] == 1.2
                    ) {
                        echo "active";
                    } ?>">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Student<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="headdash.php?q=1.1">Add Student</a></li>
                          <li><a href="headdash.php?q=1.2">Remove Student</a></li>
                      </ul>
                    </li>
                    <li class="dropdown <?php if (
                        @$_GET["q"] == 2.1 ||
                        @$_GET["q"] == 2.2
                    ) {
                        echo "active";
                    } ?>">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chat Setting<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="headdash.php?q=2.1">Go to Chat</a></li>
                          <li><a href="headdash.php?q=2.2">Clear Chat</a></li>
                      </ul>
                    </li>
                    <li class="dropdown <?php if (
                        @$_GET["q"] == 3.1 ||
                        @$_GET["q"] == 3.2
                    ) {
                        echo "active";
                    } ?>">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teacher<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="headdash.php?q=3.1">Add Teacher</a></li>
                          <li><a href="headdash.php?q=3.2">Remove Teacher</a></li>
                      </ul>
                    </li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>
        <!--navigation menu closed-->
        <div class="container">
          <!--container start-->
          <div class="row">
              <div class="col-md-12">
                <!--home start-->
                <?php if (@$_GET["q"] == 0) {
                    ($result = mysqli_query(
                        $con,
                        "SELECT * FROM quiz ORDER BY date DESC"
                    )) or die("Error");
                    echo '<div class="panel"><table class="table table-striped title1">
                    <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>positive</b></td><td><b>negative</b></td><td><b>Time limit</b></td><td></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $title = $row["title"];
                        $total = $row["total"];
                        $right = $row["right"];
                        $wrong = $row["wrong"];
                        $time = $row["test_time"];
                        $eid = $row["eid"];
                        ($q12 = mysqli_query(
                            $con,
                            "SELECT score FROM history WHERE eid='$eid' AND email='$email'"
                        )) or die("Error98");
                        $rowcount = mysqli_num_rows($q12);
                        if ($rowcount == 0) {
                            echo "<tr><td>" .
                                $c++ .
                                "</td><td>" .
                                $title .
                                "</td><td>" .
                                $total .
                                "</td><td>" .
                                $right * $total .
                                "</td><td>" .
                                $right .
                                "</td><td>" .
                                $wrong .
                                "</td><td>" .
                                $time .
                                '&nbsp;min</td>
                      </tr>';
                        } else {
                            echo '<tr style="color:#99cc32"><td>' .
                                $c++ .
                                "</td><td>" .
                                $title .
                                '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' .
                                $total .
                                "</td><td>" .
                                $right * $total .
                                "</td><td>" .
                                $time .
                                '&nbsp;min</td>
                      </tr>';
                        }
                    }
                    $c = 0;
                    echo "</table></div>";
                } ?>
                <!--home closed-->
                <!-- add students (users) start  -->
                <?php if (@$_GET["q"] == 1.1) {
                    echo ' 
                    <div class="row">
                    <span class="title1" style="margin-left:42%;font-size:30px;"><b>Enroll Students</b></span><br/><br/>
                    <div class="col-md-3"></div><div class="col-md-6">   <form action="addfile.php" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <fieldset>
                    <style> 
                      select {
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                        padding: 1%;
                        
                        background-repeat: no-repeat;
                        background-position: right center;
                        
                        width: 100%;
                      }
                      
                      
                      select:focus {
                        outline: none;
                        border-color: #5b9dd9;
                        box-shadow: 0 0 3px #5b9dd9;
                      }
                      
                      /* Style the options within the dropdown */
                      select option {
                        background-color: #fff;
                        color: #333;
                    }
                    </style>
                    
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="total"></label>  
                      <div class="col-md-12">
                      <select name="department">
                      <option value="CO">CO</option>
                      <option value="CE">CE</option>
                      <option value="EE>EE</option>
                      <option value="AIML">AIML</option>
                      <option value="AE">AE</option>
                      <option value="ME">ME</option>
                      </select>    
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="total"></label>  
                      <div class="col-md-12">
                    <select name="semester">
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                        <option value="4">4th Semester</option>
                        <option value="5">5th Semester</option>
                        <option value="6">6th Semester</option>
                        </select>
                      </div>
                    </div>  

                    
                      <p class="aaa"> Please refer the following table before Uploading this file :</p>
                    
                    <style>
                    .aaa{

                      margin-top:10rem;
                      }
                                .ch {
                                  display: inline-block;
                                  padding-top: 2rem;
                                  font-size: 1.2rem;
                                  font-weight: bold;
                                  margin-bottom: 0.5rem;
                                }
                                
                                .ch::after {
                                  content: "*";
                                  color: red;
                                }
                                
                                .f{
                                  padding-left: 2rem;
                                }
                                input[type="file"] {
                                  border: none;
                                  font-size: 1.2rem;
                                  padding: 0.5rem 1rem;
                                  background-color: #f7f7f7;
                                  color: #444;
                                  border-radius: 0.25rem;
                                  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
                                }
                                
                                input[type="file"]:focus {
                                  outline: none;
                                  box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.2);
                                }
                                
                                input[type="file"]::file-selector-button {
                                  background-color: #369;
                                  color: #fff;
                                  border: none;
                                  border-radius: 0.25rem;
                                  padding: 0.5rem 1rem;
                                  font-size: 1.2rem;
                                  cursor: pointer;
                                }
                                
                                input[type="file"]::file-selector-button:hover {
                                  background-color: #258;
                                }

                                </style>

                                <style>
                                
                                table {
                                  margin-top: 2rem;
                                  margin-left: 15rem;
                                }
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
      }
      th {
        background-color: lightgray;
      }
    </style>
  <table>
      <thead>
        <tr>
          <th>Roll No</th>
          <th>Name</th>
          <th>Username</th>
          <th>Password</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>John Doe</td>
          <td>johndoe</td>
          <td>password1</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Jane Smith</td>
          <td>janesmith</td>
          <td>password2</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Mike Johnson</td>
          <td>mikejohnson</td>
          <td>password3</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Sarah Lee</td>
          <td>sarahlee</td>
          <td>password4</td>
        </tr>
      </tbody>
    </table>

                                <div class="f">
                                    <label class="ch">Choose Excel File</label> 
                                    <input type="file" name="file" id="file" accept=".xls,.xlsx">
                                </div>
                              <br></br> 
                            
                    
                            <div class="form-group">
                            <label class="col-md-12 control-label" for=""></label>
                            <div class="col-md-12"> 
                              <input  type="submit" style="margin-left:45%" class="btn btn-primary" id="submit" name="import" value="Import" class="btn btn-primary"/>
                            </div>
                          </div>
                    
                    </fieldset>
                    </form></div>';
                } ?>
                <!-- add users end -->
                <!--delete users start-->
                <?php if (@$_GET["q"] == 1.2) {
                    ($result = mysqli_query(
                        $con,
                        "SELECT * FROM student_info"
                    )) or die("Error");
                    echo '<div class="panel"><table class="table table-striped title1">
                    <tr><td><b>S.N.</b></td><td><b>Course</b></td><td><b>Semester</b></td><td><b>Roll</b></td><td><b>Name</b></td><td><b>Username</b></td>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $dept_sf = $row["dept_sf"];
                        $sem = $row["semester"];
                        $name = $row["stud_name"];
                        $stud_roll = $row["stud_roll"];
                        $stud_username = $row["stud_username"];

                        echo "<tr><td>" .
                            $c++ .
                            "</td><td>" .
                            $dept_sf .
                            "</td><td>" .
                            $sem .
                            "</td><td>" .
                            $stud_roll .
                            "</td><td>" .
                            $name .
                            "</td><td>" .
                            $stud_username .
                            '</td>
                      <td><a title="Delete User" href="update.php?demail=' .
                            $stud_username .
                            '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
                    }
                    $c = 0;
                    echo "</table></div>";
                } ?>
                <!--delete user end-->
                <!-- Go to Chat start -->
                <?php if (@$_GET["q"] == 2.1) {
                    ($result = mysqli_query($con, "SELECT * from chat")) or
                        die("Error98");
                    echo '<div class="panel"><table class="table table-striped title1">
                          <tr style="color:black"><td><b>From:</b></td><td><b>Sent at</b></td><td><b>Message</b></td>';
                    while ($row = mysqli_fetch_array($result)) {
                        $from_user = $row["from_user"];
                        $sent_at = $row["sent_at"];
                        $text_message = $row["text_message"];
                        // $chat_fetch_query = mysqli_query($con, "SELECT * from chat") or die('Error98');
                        $rowcount = mysqli_num_rows($result);
                        if ($rowcount == 0) {
                            echo "<tr><td> -- </td><td> -- </td><td> -- </td><td>&nbsp;min</td></tr>";
                        } else {
                            echo "<tr><td>" .
                                $from_user .
                                "</td><td>" .
                                $sent_at .
                                "</td><td>" .
                                $text_message .
                                "</td></tr>";
                        }
                    }
                    echo '</table></div>
                    <form action="send_message.php" method="post" style="margin-bottom: 50px">
                      <div class="chat-input">
                        <input id="message-text" name="message-text"  type="text" class="message-input" placeholder="Type your message here" required>
                        <button class="send-button">Send</button>
                    </form>
                    <style>
                    form {
                      display: inline-block;
                      align-self: center;
                    }
                    
                    input[type=text], button {
                      display: inline-block;
                      vertical-align: middle;
                      margin-right: 10px; 
                      padding: 5px 10px; 
                      font-size: 16px; 
                    }
                    
                    button {
                      background-color: #4CAF50; 
                      color: white; 
                      border: none;
                      cursor: pointer; 
                    }
                    
                    button:hover {
                      background-color: #3e8e41; 
                    }
                    </style>
                    ';
                }
  // Go to Chat closed
  // Clear Chat Start

  if (@$_GET["q"] == 2.2) {
                    $sql = "TRUNCATE TABLE chat";
                    if (mysqli_query($con, $sql)) {
                        header("Location: headdash.php?q=2.1");
                    } else {
                        echo "Something went wrong !!";
                    }
                }
  // Clear Chat End
  ?>
                <!--add admin start-->
                <?php if (@$_GET["q"] == 3.1) {
                    echo ' 
                    <div class="row">
                    <span class="title1" style="margin-left:33%;font-size:30px;"><b>Enter New Teacher Details</b></span><br /><br />
                    <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="signadmin.php?q=headdash.php?q=4"  method="POST">
                    <fieldset>
                    
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                      <div class="col-md-12">
                      <input id="name" name="name" placeholder="Enter Teacher Name" class="form-control input-md" type="text">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="name"></label>  
                      <div class="col-md-12">
                      <input id="email" name="email" placeholder="Enter Teacher Username" class="form-control input-md" type="text">
                        
                      </div>
                    </div>
                    
                    
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="total"></label>  
                      <div class="col-md-12">
                      <input id="password" name="password" placeholder="Enter password" class="form-control input-md" type="password">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="total"></label>  
                      <div class="col-md-12">
                      <input id="sub" name="subject" placeholder="Enter Subject (in short form)" class="form-control input-md" type="text">
                        
                      </div>
                    </div>
                    
                    <style> 
                      select {
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                        padding: 1%;
                        
                        background-repeat: no-repeat;
                        background-position: right center;
                        
                        width: 100%;
                      }
                      
                      
                      select:focus {
                        outline: none;
                        border-color: #5b9dd9;
                        box-shadow: 0 0 3px #5b9dd9;
                      }
                      
                      /* Style the options within the dropdown */
                      select option {
                        background-color: #fff;
                        color: #333;
                    }
                    </style>
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="total"></label>  
                      <div class="col-md-12">
                      <select name="department">
                      <option value="CO">CO</option>
                      <option value="CE">CE</option>
                      <option value="EE>EE</option>
                      <option value="AIML">AIML</option>
                      <option value="AE">AE</option>
                      <option value="ME">ME</option>
                      </select>    
                      </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="total"></label>  
                      <div class="col-md-12">
                    <select name="semester">
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                        <option value="4">4th Semester</option>
                        <option value="5">5th Semester</option>
                        <option value="6">6th Semester</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-12 control-label" for=""></label>
                      <div class="col-md-12"> 
                        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                      </div>
                    </div>
                    
                    </fieldset>
                    </form></div>';
                } ?>
                <!--add admin end-->
                <!--delete admin start-->
                <?php
                if (@$_GET["q"] == 3.2) {
                    ($result = mysqli_query(
                        $con,
                        "SELECT * FROM teacher_info where role ='admin' "
                    )) or die("Error");
                    echo '<div class="panel"><table class="table table-striped title1">
                    <tr><td><b>S.N.</b></td><td><b>Department</b></td><td><b>Semester</b></td><td><b>Subject</b></td><td><b>Username</b></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $dept = $row["dept_sf"];
                        $sem = $row["semester"];
                        $sub = $row["sub_sf"];
                        $t_email = $row["teacher_username"];

                        echo "<tr><td>" .
                            $c++ .
                            "</td><td>" .
                            $dept .
                            "</td><td>" .
                            $sem .
                            "</td><td>" .
                            $sub .
                            "</td><td>" .
                            $t_email .
                            '</td>
                      <td><a title="Delete User" href="update.php?demail1=' .
                            $t_email .
                            '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
                    }
                    $c = 0;
                    echo "</table></div>";
                }
                ob_end_flush();
                ?>
                <!--delete admin end-->
              </div>
          </div>
        </div>
    </body>
  </html>