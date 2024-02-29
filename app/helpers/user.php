<?php  

function getUser($username, $conn){
   $sql = "SELECT * FROM users 
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$username]);

   if ($stmt->rowCount() === 1) {
   	 $user = $stmt->fetch();
   	 return $user;
   }else {
   	$user = [];
   	return $user;
   }
}
function getUserID($id,$conn){
        $sql = "SELECT * FROM users 
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() === 1) {
   	 $user = $stmt->fetch();
   	 return $id;
   }else {
   	$user = [];
   	return $user;
   }
}