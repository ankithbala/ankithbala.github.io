<?php
include "conn.php";
$tab_menu = '';
$per_page = 10;
if($_GET)
{
$page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$sql="SELECT Id,Chap,Question,Code,Answer,Explanation FROM questionReveal";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["Code"]=="")
        {
            $code="";
        }
        else
        {
        $code='<pre class="prettyprint">'.$row["Code"].'</pre>';
        }
        if($row["Explanation"]=="")
        {
            $e="";
        }
        else
        {
            $e=' <div class="bs-callout bs-callout-info">
            <br>
             <code align="left">Explanation </code><br> '.$row["Explanation"].'
            </div>';
        }
        
		$tab_menu .= ' <div class="col-lg-8""><div class="panel panel-info">
      <div class="panel-heading">Chapter '.$row["Chap"].' Question '.$row["Id"].'</div>
      <div class="panel-body"><li><a href="#'.$row["Id"].'" data-toggle="tab"> '.$row["Question"].'</a></li>'.$code.'
      
      <br>
	  <div align="left";class="container">
 <a href="#demo'.$row["Id"].'" class="btn btn-info" data-toggle="collapse">Answer</a>
 <br>
  <br>
  <div id="demo'.$row["Id"].'" class="collapse"><code align="left">Answer: </code>'.$row["Answer"].'
  
    '.$e.'

   </div>
   </div>
	  </div>
	  </div>
	  </div>
  ';
    }
} else {
    echo "0 results";
}
?>