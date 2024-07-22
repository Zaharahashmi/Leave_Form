<?php
$link=mysqli_connect('localhost','root',"",'form');
if(!$link)
{
    die('connection error'.mysqli_connect_error());
}
if(isset($_POST['submitval']) && $_POST['submitval']=='submit')
{
    $name=$_POST['name'];
    $roll_no=$_POST['rno'];
    $email=$_POST['email'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    $reason=$_POST['reason'];
    $sql="insert into sub (name, roll_no, email, start_date, end_date, reason) values ('$name','$roll_no','$email','$start_date','$end_date','$reason')";

    $res=mysqli_query($link,$sql);
    if($res)
    {
        ?>
        <script>
            alert("Leave form has been submitted");
        </script>
        <?php
    }
    else
    {
        echo "Error inserting record: " . mysqli_error($link);
    }
}
?>

