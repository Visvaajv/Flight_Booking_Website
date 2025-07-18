document.getElementById('flightForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const source = document.getElementById('source').value;
    const destination = document.getElementById('destination').value;
    const date = document.getElementById('date').value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "FlightSearch.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('results').innerHTML = xhr.responseText;
        }
    };

    xhr.send("source=" + source + "&destination=" + destination + "&date=" + date);
});
