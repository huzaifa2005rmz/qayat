
<?php
include "../controle/db_conn.php";

include '../login/config.php';
session_start();
$admint = $_SESSION['admin'];

include "db_conn.php";

include '../login/config.php';
$user_id = $_SESSION['user_id'];
 $admint = $_SESSION['admin'];


if($admint == "huzaifaD"){
    if(!isset($user_id)){
       header('location:../login/login.php');
    };

    if(isset($_GET['logout'])){
       unset($user_id);
       session_destroy();
       header('location:../login/login.php');
    }
}else{
         header('location:../login/login.php');

}

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../login/login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login/login.php');
}
?>

				<!-- start php code users  -->
								   <?php
							        $sqlimg = "SELECT * FROM `user_form` WHERE id = '$user_id'";
							        $resultimg = mysqli_query($conn, $sqlimg);
							         $img = mysqli_fetch_assoc($resultimg);
       								 ?>
						<!-- end php code selsct users  -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="html/style.css?v=<?php echo time(); ?>">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="col.php" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">لوحة التحكم</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="col.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">المستخدمين</span>
				</a>
			</li>
			<li>
				<a href="addAccunt.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">اضافة حساب </span>
				</a>
			</li>
			<li>
				<a href="create-new-order.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">اضافة اوردر</span>
				</a>
			</li>
			<li>
				<a href="index.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">كل الاوردرات </span>
				</a>
			</li>
            <li class="active">
				<a href="accuntit.php">
                <i class='bx bxs-calculator'></i>
					<span class="text">الحسابات   </span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../login/Home.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="../login/Home.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="saerch.php" method="POST">
				<div class="form-input">
					<input type="search" placeholder="Search..." name="saerchInput">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../login/uploaded_img/<?php echo $img['image'] ?>">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>الصافي</th>
                                <th>الحساب التجاري </th>
                                <th>العنوان </th>
								<th>ID</th>
								<th>الطلب</th>
								<th>القيم  </th>

							</tr>
						</thead>

						<!-- start php code users  -->
								   <?php
							        $sql = "SELECT * FROM `orders` ";
							        $result = mysqli_query($conn, $sql);
							        while ($row = mysqli_fetch_assoc($result)) {
										if($row['statuse'] == 3){
       								 ?>
						<!-- end php code selsct users  -->
						<tbody>
							<tr>
							<td> <?php $pricePage = $row['price'] - $row['priceAd'];
							
								if($row['priceAd']){
									echo $pricePage;   
								}else{
									echo "لم يتم حساب الطلب ";
								}
									 ?> 000</td>
									
									<td>
										<p><?php if($row['page_name']){
											echo $row['page_name'];
										}else{
											echo $row['order_page_name'];
										}  ?></p>
									</td>
									<td>
										<p><?php $addric = $row['Governorate'] ." ". $row['addreces'];
										echo $addric?></p>
									</td>
									<td>
										<p><?php echo $row['id'] ?></p>
									</td>
									<td><a href="order.php?id=<?php echo $row['id'] ?>" > <span class="status completed">عرض</span></a> 
									<td><a href="edit.php?id=<?php echo $row['id'] ?>" > <span class="status completed">تعديل</span></a> 
	
									</span>
									</td>
								</tr>
								<?php 

								}?>
							  
							
						<?php } ?> 
						
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="html/script.js"></script>
</body>
</html>

