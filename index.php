<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo $_GET['password'] . ' - ' . $_GET['username'];
}
// $studentArr = array(
// 	'0' => 'Nguyen Van A',
// 	'1' => 'Le Thi B',
// 	'2' => 'Tran Van C'
// );

// $name = 'Nguyen Van A';
// $dob = '12/12/2012';

$student1 = array(
	'name' => 'Nguyen Van A',
	'dob' => '12/12/2012',
	'address' => 'Hue',
	'phone' => '0928738423',
	'email' => 'vana@gmail.com',
);

$student2 = array(
	'name' => 'Nguyen Van B',
	'dob' => '12/12/2012',
	'address' => 'Hue',
	'phone' => '0928738423',
	'email' => 'vana@gmail.com',
);

$student3 = array(
	'name' => 'Nguyen Van B',
	'dob' => '12/12/2012',
	'address' => 'Hue',
	'phone' => '0928738423',
	'email' => 'vana@gmail.com',
);

// $studentArr = array(
// 	'0' => $student1,
// 	'1' => $student2,
// 	'2' => $student3,
// );

$studentArr = array(
	'0' => array(
		'name' => 'Nguyen Van A',
		'dob' => '12/12/2012',
		'address' => array(
			'no' => '227',
			'street' => 'Le Loi',
			'city' => 'Hue'
		),
		'phone' => '0928738423',
		'email' => 'vana@gmail.com',
	),
	'1' => array(
		'name' => 'Nguyen Van B',
		'dob' => '12/12/2012',
		'address' => 'Hue',
		'phone' => '0928738423',
		'email' => 'vana@gmail.com',
	),
);

echo "<pre>";
echo($studentArr['1']['address']);
echo "</pre>";
?>

<!-- <form action="index.php" method="GET">
	<input type="text" name="username" placeholder="Please input username">
	<input type="password" name="password" placeholder="Please input password">
	<input type="submit" value="Đăng nhập">
</form> -->