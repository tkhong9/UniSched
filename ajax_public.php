<?php
// This part is to set the user timetable to public.
require __DIR__.'/lib/db.inc.php';
global $db;
$db = unisched_DB();

$userID = $_POST['userID'];
$shared = 1;

$stmt = $db->prepare("SELECT shared FROM mycourses WHERE user_id = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$resultSet = $stmt->get_result();
$res = $resultSet->fetch_all();
foreach($res as $row){
    if($row[0] == 1){
        echo('The timetable is public originally!');
    }
    else{
        $sql="UPDATE mycourses SET shared = ? WHERE user_id = ?";
        $stmt2 = $db->prepare($sql);
        $stmt2->bind_param("ii", $shared, $userID);
        if($stmt2->execute()){
            echo('The timetable is set to public successfully!');
        }
    }
}

