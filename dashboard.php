<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="#">Leave Requests</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="main-content">
    <section class="dashboard-section">
    <h1>Welcome to Leave Management System</h1>
    <p>Welcome to our Leave Management System (LMS), designed to streamline and manage leave requests effectively. Our system offers intuitive tools to handle leave applications, track leave history, and ensure smooth operations.</p>

    <div class="overview">
        <h2>Key Features</h2>
        <ul>
            <li>Submit and track leave requests online.</li>
            <li>Approve or reject leave applications with ease.</li>
            <li>View comprehensive leave history and summaries.</li>
            <li>Generate reports and analytics for better decision-making.</li>
            <li>Personalized dashboard for each user role.</li>
        </ul>
    </div>
</section>


        <section class="dashboard-section">
            <h2>Leave Requests</h2>
            <div class="leave-requests">
                <?php
                // Example PHP code to fetch leave requests from database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "form";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch leave requests
                $sql = "SELECT * FROM sub";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="leave-request">';
                        echo '<h3>Leave Request ID: ' . $row["roll_no"] . '</h3>';
                        echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
                        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
                        echo '<p><strong>Dates:</strong> ' . $row["start_date"] . ' to ' . $row["end_date"] . '</p>';
                        echo '<p><strong>Reason:</strong> ' . $row["reason"] . '</p>';
                        echo '<div class="actions">';
                        echo '<button class="approve-btn">Approve</button>';
                        echo '<button class="reject-btn">Reject</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No leave requests found.</p>';
                }

                // Close connection
                $conn->close();
                ?>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Leave Management System. All rights reserved.</p>
    </footer>
</body>
</html>
