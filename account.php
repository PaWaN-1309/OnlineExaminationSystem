<?php
   session_start();
   ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Online examiner</title>
      <link  rel="stylesheet" href="css/bootstrap.min.css"/>
      <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
      <link rel="stylesheet" href="css/main.css">
      <link  rel="stylesheet" href="css/font.css">
      <script src="js/jquery.js" type="text/javascript"></script>
      <script src="js/bootstrap.min.js"  type="text/javascript"></script>
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
      <!--alert message-->
      <?php if (@$_GET["w"]) {
         echo '<script>alert("' . @$_GET["w"] . '");</script>';
         } ?>
      <!--alert message end-->
   </head>
   <?php include_once "dbConnection.php"; ?>
   <body>
      <div class="header">
         <div class="row" style="background-color:#f4511e;">
            <div class="col-lg-6" >
               <span class="logo"></span>
            </div>
            <div class="col-md-4 col-md-offset-2">
               <?php
                  include_once "dbConnection.php";
                  if (!isset($_SESSION["email"])) {
                      header("location:index.php");
                  } else {
                      $dept_sf = $_SESSION["dept_sf"];
                      $semester = $_SESSION["semester"];
                      $name = $_SESSION["name"];
                      $email = $_SESSION["email"];
                  
                      include_once "dbConnection.php";
                      echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Welcome,</span> <a href="account.php?q=1" class="log log1">' .
                          $name .
                          '</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="bg">
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
                  <a class="navbar-brand" href="account.php?q=1"><b>Dashboard - Student</b></a>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar left">
                     <li <?php if (@$_GET["q"] == 1) {
                        echo 'class="active"';
                        } ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
                     <li <?php if (@$_GET["q"] == 2) {
                        echo 'class="active"';
                        } ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
                     <li <?php if (@$_GET["q"] == 3) {
                        echo 'class="active"';
                        } ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;ScoreBoard</a></li>
                     <li <?php if (@$_GET["q"] == 4) {
                        echo 'class="active"';
                        } ?>><a href="account.php?q=4"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;Chat</a></li>
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
                  <?php if (@$_GET["q"] == 1) {
                     // $result = mysqli_query($con,"SELECT * FROM quiz  ORDER BY date DESC where dept_sf = $dept_sf and semester = $semester") or die('Error');
                     $result = mysqli_query(
                         $con,
                         "SELECT * FROM quiz WHERE dept_sf = '$dept_sf' AND semester = '$semester' ORDER BY date DESC"
                     );
                     
                     echo '<div class="panel"><table class="table table-striped title1">
                     <tr style="color:black"><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>positive</b></td><td><b>negative</b></td><td><b>Time limit</b></td><td></td><td></td></tr>';
                     $c = 1;
                     while ($row = mysqli_fetch_array($result)) {
                         $title = $row["title"];
                         $total = $row["total"];
                         $right = $row["right"];
                         $wrong = $row["wrong"];
                         $time = $row["test_time"];
                         $eid = $row["eid"];
                         // $id = $row['id'];
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
                     <td><a title="Open quiz description" href="account.php?q=1&fid=' .
                                 $eid .
                                 '"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>
                     <td><b><a href="account.php?q=quiz&step=2&eid=' .
                                 $eid .
                                 "&n=1&t=" .
                                 $total .
                                 '" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
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
                                 $right .
                                 "</td><td>" .
                                 $wrong .
                                 "</td><td>" .
                                 $time .
                                 '&nbsp;min</td>
                     </tr>';
                         }
                     }
                     $c = 0;
                     echo "</table></div>";
                     } ?>
                  <!----quiz reading portion starts--->
                  <?php if (@$_GET["fid"]) {
                     echo "<br />";
                     $eid = @$_GET["fid"];
                     ($result = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ")) or
                         die("Error");
                     while ($row = mysqli_fetch_array($result)) {
                         // $name = $row['name'];
                         $title = $row["title"];
                         $date = $row["date"];
                         $date = date("d-m-Y", strtotime($date));
                         //$time = $row['time'];
                         $intro = $row["intro"];
                     
                         echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' .
                             $title .
                             "</b></h1>";
                         echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;' .
                             $date .
                             '</span>
                     <span style="line-height:35px;padding:5px;"></span><br />' .
                             $intro .
                             "</div></div>";
                     }
                     } ?>
                  <!--quiz reading portion closed-->
                  <!--home closed-->
                  <!--quiz start-->
                  <?php
                     if (@$_GET["q"] == "quiz" && @$_GET["step"] == 2) {
                     
                         $eid = @$_GET["eid"];
                         $sn = @$_GET["n"];
                         $total = @$_GET["t"];
                         $q = mysqli_query(
                             $con,
                             "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' "
                         );
                     
                         echo '<div class="panel" style="margin:5%">';
                       
                     ?>
                         <script type="text/javascript">
                        let focusCount = 0;

                        window.addEventListener('blur', () => {
                        focusCount++;
                      alert(`WARNING !!! Change in focus will result in submission of current question`);
                       if (focusCount > 0) {
                            let form = document.getElementById('quiz_form');
                            form.submit();
                        
                            
                        }
                            
                        });

                       
                    </script>
<?php
                         $sql = "SELECT test_time FROM quiz WHERE eid ='$eid'";
                         $result = $con->query($sql);
                         echo '<div class="panel" style="margin:5%">';
                         // ! PHP & Js code for displaying timer and starting countdown
                         // If result has at least one row
                         if ($result->num_rows > 0) {
                             // Output data of each row
                             if ($row = $result->fetch_assoc()) {
                                 // echo $row["test_time"];
                                 echo '<b><span style="border:2px solid #000; border-radius:2px; float:right; padding:5px;" id="timer_text">' .
                                     $row["test_time"] .
                                     ":00</span></b>";
                             }
                         } else {
                             echo "Error: " . mysqli_error($con);
                         }
                         ?>
                    <script type="text/javascript">
                    window.history.forward();

function disableBackButton() {
  window.history.pushState(null, "", window.location.href);
  window.onpopstate = function () {
    window.history.forward();
  };
}

                        // Initialize clock countdowns by using the total seconds in the element's tag
                        let timerText = document.getElementById('timer_text');
                        let secs = parseInt(timerText.innerHTML.split(':')[0], 10) * 60 + parseInt(timerText.innerHTML.split(':')[1], 10);
                        setTimeout(function() {
                            countdown('timer_text', secs);
                        }, 1000);

                        function countdown(id, timer) {
                            timer--;
                            let minRemain = Math.floor(timer / 60);
                            let secsRemain = (timer - (minRemain * 60)).toString();
                            // Pad the string with leading 0 if less than 2 chars long
                            if (secsRemain.length < 2) {
                                secsRemain = '0' + secsRemain;
                            }

                            // String format the remaining time
                            let clock = minRemain + ':' + secsRemain;
                            document.getElementById(id).innerHTML = clock;
                            if (timer > 0) {
                                // Time still remains, call this function again in 1 sec
                                setTimeout(function() {
                                    countdown(id, timer);
                                }, 1000);
                            } else {
                                // Submit the quiz form when time runs out
                                let form = document.getElementById('quiz_form');
                                form.submit();
                            }
                        }


                        window.history.pushState(null, '', window.location.href);
                        window.onpopstate = function () {
                        window.history.pushState(null, '', window.location.href);
                        };
                    </script>

                  <?php
                     while ($row = mysqli_fetch_array($q)) {
                         $qns = $row["qns"];
                         $qid = $row["qid"];
                         echo "<b>Question &nbsp;" .
                             $sn .
                             "&nbsp;::<br />" .
                             $qns .
                             "</b><br /><br />";
                     }
                     $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
                     echo '<form id=quiz_form action="update.php?q=quiz&step=2&eid=' .
                         $eid .
                         "&n=" .
                         $sn .
                         "&t=" .
                         $total .
                         "&qid=" .
                         $qid .
                         '" method="POST"  class="form-horizontal">
                     <br />';
                     
                     while ($row = mysqli_fetch_array($q)) {
                         $option = $row["option"];
                         $optionid = $row["optionid"];
                         echo '<input type="radio" name="ans" value="' .
                             $optionid .
                             '">' .
                             $option .
                             "<br /><br />";
                     }
                     echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
                     
                     }
                     //result display
                     if (@$_GET["q"] == "result" && @$_GET["eid"]) {
                         $eid = @$_GET["eid"];
                         ($q = mysqli_query(
                             $con,
                             "SELECT * FROM history WHERE eid='$eid' AND email='$email' "
                         )) or die("Error157");
                         echo '<div class="panel">
                     <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
                     
                         while ($row = mysqli_fetch_array($q)) {
                             $s = $row["score"];
                             $w = $row["wrong"];
                             $r = $row["right"];
                             $qa = $row["level"];
                             echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>' .
                                 $qa .
                                 '</td></tr>
                           <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' .
                                 $r .
                                 '</td></tr> 
                         <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' .
                                 $w .
                                 '</td></tr>
                         <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' .
                                 $s .
                                 "</td></tr>";
                         }
                         ($q = mysqli_query($con, "SELECT * FROM rank WHERE  email='$email' ")) or
                             die("Error157");
                         while ($row = mysqli_fetch_array($q)) {
                             $s = $row["score"];
                             echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' .
                                 $s .
                                 "</td></tr>";
                         }
                         echo "</table></div>";
                     }
                     ?>
                  <!--quiz end-->
                  <?php
                     //history start
                     if (@$_GET["q"] == 2) {
                         ($q = mysqli_query(
                             $con,
                             "SELECT * FROM history WHERE email='$email' ORDER BY date DESC "
                         )) or die("Error197");
                         echo '<div class="panel title">
                     <table class="table table-striped title1" >
                     <tr style="color:black"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td></td><td><b>Ranking</b></td>';
                         $c = 0;
                         while ($row = mysqli_fetch_array($q)) {
                             $eid = $row["eid"];
                             $s = $row["score"];
                             $w = $row["wrong"];
                             $r = $row["right"];
                             $qa = $row["level"];
                             ($q23 = mysqli_query(
                                 $con,
                                 "SELECT title FROM quiz WHERE  eid='$eid' "
                             )) or die("Error208");
                             while ($row = mysqli_fetch_array($q23)) {
                                 $title = $row["title"];
                             }
                             $c++;
                             echo "<tr><td>" .
                                 $c .
                                 "</td><td>" .
                                 $title .
                                 "</td><td>" .
                                 $qa .
                                 "</td><td>" .
                                 $r .
                                 "</td><td>" .
                                 $w .
                                 "</td><td>" .
                                 $s .
                                 '</td><td><a title="View Rank" href="account.php?quiz=' .
                                 $eid .
                                 "&nm=" .
                                 $title .
                                 '"><b><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></b></a></td></tr>';
                         }
                         echo "</table></div>";
                     }
                     
                     //test wise ranking
                     if (@$_GET["quiz"]) {
                         $quiz = $_GET["quiz"];
                         $nm = $_GET["nm"];
                         ($q = mysqli_query(
                             $con,
                             "SELECT s.stud_roll,s.stud_name,h.score from student_info s,history h where eid='$quiz' and h.email=s.stud_username order by h.score DESC"
                         )) or die("Error197");
                         // $q=mysqli_query($con,"SELECT  q.title,s.stud_roll,s.stud_name,h.score from student_info s,history h,quiz q where h.eid='643a575b6e27a' and q.eid=h.eid and h.email=s.stud_username order by h.score DESC");
                         echo '
                     <br /><br />
                     <span class="title1" style="margin-left:33%;font-size:30px;"><b>Ranking of :' .
                             $nm .
                             '</b></span>
                     
                     <div class="panel title">
                       <table class="table table-striped title1" >
                       <tr style="color:black"><td><b>Rank</b></td><td><b>Roll</b></td><td><b>Name</b></td><td><b>Score</b></td>';
                         $c = 0;
                         while ($row = mysqli_fetch_array($q)) {
                             // $qname = $row['title'];
                             $name = $row["stud_name"];
                             $roll = $row["stud_roll"];
                             $score = $row["score"];
                     
                             $c++;
                             echo "<tr><td>" .
                                 $c .
                                 "</td><td>" .
                                 $roll .
                                 "</td><td>" .
                                 $name .
                                 "</td><td>" .
                                 $score .
                                 "</td></tr>";
                         }
                         echo "</table></div>";
                     }
                     
                     //ranking start
                     if (@$_GET["q"] == 3) {
                         ($q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ")) or
                             die("Error223");
                         echo '<div class="panel title">
                     <table class="table table-striped title1" >
                     <tr style="color:black"><td><b>Rank</b></td><td><b>Roll</b></td><td><b>Name</b></td><td><b>Score</b></td></tr>';
                         $c = 0;
                         while ($row = mysqli_fetch_array($q)) {
                             $e = $row["email"];
                             $s = $row["score"];
                             ($q12 = mysqli_query(
                                 $con,
                                 "SELECT * FROM student_info WHERE stud_username='$e' "
                             )) or die("Error231");
                             while ($row = mysqli_fetch_array($q12)) {
                                 $roll = $row["stud_roll"];
                                 $name = $row["stud_name"];
                             }
                             $c++;
                             echo '<tr><td style="color:#99cc32"><b>' .
                                 $c .
                                 "</b></td><td>" .
                                 $roll .
                                 "</td><td>" .
                                 $name .
                                 "</td><td>" .
                                 $s .
                                 "</td><td>";
                         }
                         echo "</table></div>";
                     }
                     
                     if (@$_GET["q"] == 4) {
                         // ? Predifined code
                         ($result = mysqli_query($con, "SELECT * from chat")) or die("Error98");
                         echo '<div class="panel"><table class="table table-striped title1">
                                       <tr style="color:black"><td><b>From:</b></td><td><b>Sent at</b></td><td><b>Message</b></td>';
                         while ($row = mysqli_fetch_array($result)) {
                             $from_user = $row["from_user"];
                             $sent_at = $row["sent_at"];
                             $text_message = $row["text_message"];
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
                     ob_end_flush();
                     ?>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>