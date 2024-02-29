<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie Time Tracker</title>
</head>
<body>
    <h1>Welcome!</h1>
    <p>This page will remember when you first visited.</p>
    <p>Time since your first visit: <span id="timeSinceVisit"></span></p>

    <script>
        // Function to set a cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Function to get a cookie
        function getCookie(name) {
            var nameEQ = name + "=";
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1, cookie.length);
                }
                if (cookie.indexOf(nameEQ) === 0) {
                    return cookie.substring(nameEQ.length, cookie.length);
                }
            }
            return null;
        }

        // Function to calculate time since first visit
        function calculateTimeSinceVisit() {
            var firstVisitTime = getCookie("firstVisitTime");
            if (firstVisitTime) {
                var currentTime = new Date().getTime();
                var elapsed = currentTime - parseInt(firstVisitTime);
                var minutes = Math.floor(elapsed / (1000 * 60));
                var seconds = Math.floor((elapsed % (1000 * 60)) / 1000);
                document.getElementById("timeSinceVisit").textContent = minutes + " minutes and " + seconds + " seconds";
            } else {
                // If no first visit time, set it and display as 0
                setCookie("firstVisitTime", new Date().getTime(), 365);
                document.getElementById("timeSinceVisit").textContent = "0 minutes and 0 seconds";
            }
        }

        // Call the function when the page loads
        calculateTimeSinceVisit();
    </script>
</body>
</html>
