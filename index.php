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
<head>
<style>
div.gallery {
  border: 1px solid #ccc;
  margin: 10px;
  height: 100%;
  overflow: hidden;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 25.99999%;
  height: 350px;
  margin-bottom: 20px;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
.b-con{
  padding: 110px;
}
</style>
</head>
<body >
<div class="b-con">
<?php
        $id = $_SESSION['user_id'];

        
        try {
            $stmt = $conn->prepare("SELECT * FROM users where user_id != $id  ");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                ?>
                <div class="responsive">
                    <div class="gallery">
                      <h4></h4>
                      <a target="_blank" href="p-d.php?id=<?php echo $row['user_id'];?> && user=<?=$conversation['username']?>">
                        <img src="uploads/<?php echo $row['p_p']; ?>" alt="Cinque Terre" width="700" height="500">
                      </a>
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
 