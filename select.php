<style>
     body
    {
        background-image:url('bg1.jpg');
        background-repeat:no-repeat;
        background-size:cover;
    }
.dbresult,.dbresult td,.dbresult th{
    border:1px solid black;
    border-collapse:collapse;
    padding:8px;
}
.dbresult {
    width:500px;
    margin:auto;
}
.dbresult tr:nth-child(odd) {
    background-color:white;
}
.dbresult tr:nth-child(even) {
    background-color:Cyan;
}
</style>
<form method="POST">
ROLL_NO:<br><input type="text"  name="rno"  autocomplete="off" style="width:300px;height:50px;font-size:20px;color:white;" required><br><br>
<input type="submit" value="submit" name="submitval"  id="submit">
</form>
<?php
$link = mysqli_connect('localhost', 'root', '', 'form');
if (!$link) {
    die('connection error' . mysqli_connect_error());
}
if (isset($_POST['submitval']) && $_POST['submitval'] == 'submit') {
    $roll_no = $_POST['rno'];
    $query = "SELECT * FROM sub WHERE roll_no='$roll_no'";
    $result = mysqli_query($link, $query);
    $numrow = mysqli_num_rows($result);

    if ($numrow > 0) {
        echo '<table class="dbresult">';
        echo '<tr>><th colspan="8"><a href="form.html">GO BACK</a></th></tr>';
        echo '<tr>';
        echo '<th>name</th>';
        echo '<th>roll_no</th>';
        echo '<th>email</th>';
        echo '<th>start_date</th>';
        echo '<th>end_date</th>';
        echo '<th>reason</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            $roll_no = $row['roll_no'];
            $name = $row['name'];
            $email = $row['email'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $reason = $row['reason'];

            echo '<tr>';
            echo '<td>' . $name . '</td>';
            echo '<td>' . $roll_no . '</td>';
            echo '<td>' . $email . '</td>';
            echo '<td>' . $start_date . '</td>';
            echo '<td>' . $end_date . '</td>';
            echo '<td>' . $reason . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
