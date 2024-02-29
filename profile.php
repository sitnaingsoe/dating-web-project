<?php
session_start();

// Include the file with the database connection
include 'app/db.conn.php';

if (isset($_SESSION['username'])) {
    include 'app/helpers/user.php';
    include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';

    # Getting User data
    $user = getUser($_SESSION['username'], $conn);

    # Getting User conversations
    $conversations = getConversation($user['user_id'], $conn);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <style>
            img {
                width: 200px;
                height: 200px;
            }
        </style>
    </head>
    <body>
    <h1>Welcome, <?php echo $user['name']; ?></h1>
    <h2>Profile User</h2>

    <!-- Display Current User -->
    <div>
        <h3>Current User:</h3>
        <p>Name: <?php echo $user['name']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <img src="uploads/<?php echo $user['p_p']; ?>" alt="Profile Picture">
    </div>

    <!-- Display Other Users -->
    <div>
        <h3>Other Users:</h3>
        <?php
        $currentUserID = $user['user_id'];

        // Query to get all users except the current user
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id != ?");
        $stmt->execute([$currentUserID]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $row) {
            echo "<h4>User ID: {$row['user_id']}</h4>";
            echo "<p>Name: {$row['name']}</p>";
            echo "<img src='uploads/{$row['p_p']}' alt='Profile Picture'><br>";
        }
        ?>

        <!-- Next User Button -->
        <h3>Next User:</h3>
        <?php
        $nextUserID = getNextUserID($conn, $currentUserID);
        if ($nextUserID !== null) {
            echo "<a href='index.php?id=$nextUserID'>Next User</a>";
        } else {
            echo "No more users.";
        }

        // Function to get the next user ID, skipping the current user
        function getNextUserID($conn, $currentUserID) {
            $sql = "SELECT user_id FROM users WHERE user_id > ? ORDER BY user_id ASC LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$currentUserID]);
            $nextID = $stmt->fetchColumn();
            return $nextID;
        }
        ?>
    </div>

    </body>
    </html>
    <?php
} else {
    header("Location: signin.php");
    exit;
}
?>
