<?php
// Establish a connection to the database
$link = mysqli_connect('localhost', 'root', '', 'form');
if (!$link) {
    die('Connection error: ' . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['action']) && isset($_POST['roll_no'])) {
    $action = $_POST['action'];
    $roll_no = $_POST['roll_no'];

    // Sanitize input to prevent SQL injection
    $roll_no = mysqli_real_escape_string($link, $roll_no);

    // Fetch the student's details
    $query = "SELECT * FROM sub WHERE roll_no='$roll_no'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $name = $row['name'];

        // Email content
        $subject = $action == 'approve' ? 'Application Approved' : 'Application Rejected';
        $message = $action == 'approve'
            ? "Dear $name,\n\nWe are pleased to inform you that your application has been approved.\n\nThank you."
            : "Dear $name,\n\nWe regret to inform you that your application has been rejected.\n\nThank you.";
        $headers = "From: no-reply@example.com"; // Replace with your sender email

        // Send the email
        if (mail($email, $subject, $message, $headers)) {
            echo "<script>alert('Email sent successfully.');</script>";
        } else {
            echo "<script>alert('Failed to send email.');</script>";
        }

        // Optionally, you can update the database to mark the request as approved/rejected
        $status = $action == 'approve' ? 'Approved' : 'Rejected';
        $update_query = "UPDATE sub SET status='$status' WHERE roll_no='$roll_no'";
        mysqli_query($link, $update_query);
    } else {
        echo "<script>alert('No record found for the provided roll number.');</script>";
    }
}

// Display the table with approve/reject buttons
$query = "SELECT * FROM sub";
$result = mysqli_query($link, $query);
if ($result && mysqli_num_rows($result) > 0) {
    echo '<table class="dbresult">';
    echo '<tr><th colspan="9"><a href="form.html">GO BACK</a></th></tr>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Roll No</th>';
    echo '<th>Email</th>';
    echo '<th>Start Date</th>';
    echo '<th>End Date</th>';
    echo '<th>Reason</th>';
    echo '<th>Approve</th>';
    echo '<th>Reject</th>';
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
        echo '<td><form method="post"><input type="hidden" name="roll_no" value="' . $roll_no . '"><input type="submit" name="action" value="approve"></form></td>';
        echo '<td><form method="post"><input type="hidden" name="roll_no" value="' . $roll_no . '"><input type="submit" name="action" value="reject"></form></td>';
        echo '</tr>';
    }
    echo '</table>';
}

mysqli_close($link);
?>
