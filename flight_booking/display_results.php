<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search Results</title>
    <link rel="stylesheet" href="sample.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header>
        <h1>Available Flights</h1>
    </header>

    <div class="results-container">
        <?php
       
        $servername = "localhost";
        $username = "visvaa";
        $password = "visvaa123";
        $dbname = "Flight1";

        
        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $departure = $_GET['departure'];
        $destination = $_GET['destination'];
        $date = $_GET['date'];

        
        $stmt = $conn->prepare("SELECT Flight_no, Flight_name, departure, destination, date, departure_time, duration, cost 
                                FROM Flight_booking1 
                                WHERE departure = ? AND destination = ? AND date = ?");

       
        $stmt->bind_param("sss", $departure, $destination, $date);

        
        $stmt->execute();

        
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Flight Number</th>
                        <th>Flight Name</th>
                        <th>Departure</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Departure Time</th>
                        <th>Duration</th>
                        <th>Cost</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["Flight_no"] . "</td>
                        <td>" . $row["Flight_name"] . "</td>
                        <td>" . $row["departure"] . "</td>
                        <td>" . $row["destination"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["departure_time"] . "</td>
                        <td>" . $row["duration"] . "</td>
                        <td>" . $row["cost"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No flights found for your search criteria.";
        }

        
        $stmt->close();
        $conn->close();
        ?>
    </div>
    </div>

    <footer>
        <p>&copy; 2024 AirX. All rights reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </footer>

</body>
</html>
