<?php 
  session_start();
  include "header.php";
  if (isset($_SESSION['username'])) {
  	# database connection file
  	include 'app/db.conn.php';

  	include 'app/helpers/user.php';
  	include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';

  	# Getting User data data
  	$user = getUser($_SESSION['username'], $conn);
    $conversations = getConversation($user['user_id'], $conn);


?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body style="padding-top: 80px;">

<div class="w3-container" style="width: 80%;margin-left: 115px;">
  <h1>Users List</h1>
</div>

<div class="w3-row-padding w3-margin-top" style="margin-top:200px;">
<?php
        $id = $_SESSION['user_id'];

        
        try {
            $stmt = $conn->prepare("SELECT * FROM users where user_id != $id  ");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                ?>
            <div class="w3-third" style="width:20%;margin-left: 100px;          margin-bottom:30px;overflow:hidden;height:400px;object-fit:cover">
                <div class="w3-card">
                <a target="_blank" href="details.php?id=<?php echo $row['user_id']; ?>">
                <img src="uploads/<?php echo $row['p_p']; ?>" style="width:100% "></a>
                <div class="w3-container">
                    <h3><?php echo $row['name'];?></h3>
                </div>
                </div>
            </div>
            <?php
                // Add more fields as neede
                
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        ?>
</div>
</body>
</html>
<?php
  }else{
  	header("Location: intro.php");
   	exit;
  }
 ?>
