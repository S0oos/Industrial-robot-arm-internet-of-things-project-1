<?php

$conn = new mysqli('localhost','root','','industrial_robot_arm_internet_of_things_project_1');

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
		
} else { 
        if($_POST["bt"]=="save"){
		$engineOne = $_POST['engineOne'];
        $engineTwo = $_POST['engineTwo'];
        $engineThree = $_POST['engineThree'];
        $engineFour = $_POST['engineFour'];
        $engineFive = $_POST['engineFive'];
        $engineSix = $_POST['engineSix'];
		
		$stmt = $conn->prepare("insert into engines(engineOne, engineTwo, engineThree, engineFour, engineFive, engineSix) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiii", $engineOne, $engineTwo, $engineThree, $engineFour, $engineFive, $engineSix);
		$execval = $stmt->execute();
		echo $execval;
		echo "تم حفظ التغييرات";
		$stmt->close();
		$conn->close();
		
	}else if($_POST["bt"]=="robotOn"){
		$valOn ="on";
		$valOff ="null";
		
		$stmt = $conn->prepare("insert into run(robotOn, robotOff) values(?, ?)");
		$stmt->bind_param("ss",$valOn, $valOff);
		$execval = $stmt->execute();
		echo $execval;
		echo "تم تشغيل الروبوت";
		$stmt->close();
		$conn->close();
		
	}else{
		$valOn ="null";
		$valOff ="off";
		
		$stmt = $conn->prepare("insert into run(robotOn, robotOff) values(?, ?)");
		$stmt->bind_param("ss",$valOn, $valOff);
		$execval = $stmt->execute();
		echo $execval;
		echo "تم ايقاف الروبوت";
		$stmt->close();
		$conn->close();	
	}
	}
?>