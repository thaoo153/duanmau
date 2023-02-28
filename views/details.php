<?php
include '../model/sanpham.php';
include '../model/danhmuc.php';
include '../connect.php';
include '../model/pdo.php';
include '../model/binhluan.php';

session_start();

// include '../connect.php';
$sql = "SELECT * FROM sanpham";
$statement = $connect->prepare($sql);
$statement->execute();
$data = $statement->fetchAll();

// include '../connect.php';
$listbinhluan = loadOneSp_binhluan($_GET['id']);
$id_kh = isset($_SESSION['name']['id']) ? $_SESSION['name']['id'] : '';
$id_sp = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Converse</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<style>
		table,
		tr,
		td {
			border: 1px solid black;
		}
	</style>
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header trans_300">

			<!-- Top Navigation -->

			<div class="top_nav">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top_nav_left">free shipping on all u.s orders over $50</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="top_nav_right">
								<ul class="top_nav_menu">
									<li class="account">
										<a href="#">
											<!-- Tài khoản của tôi -->
											<?php
											if (isset($_GET['name']) ? $_GET['name'] : '') {
												echo $name;
											}
											?>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Navigation -->

			<div class="main_nav_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<!-- <a href="#">colo<span>shop</span></a> -->
								<img src="imgs/logo3.jpg" alt="" width="200px">
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="#">home</a></li>
									<li><a href="#">shop</a></li>
									<li><a href="#">promotion</a></li>
									<li><a href="#">pages</a></li>
									<li><a href="#">blog</a></li>
									<li><a href="contact.html">contact</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
									<li class="checkout">
										<a href="#">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<span id="checkout_items" class="checkout_items">2</span>
										</a>
									</li>
								</ul>
								<div class="hamburger_container">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>


		<!-- Products details -->
		<div style="margin-top: 150px">
			<div class="container" style="display: grid; grid-template-columns: 1fr 1fr">
				<?php
				// $sp = loadone_sanpham($id);
				if (isset($_GET['id']) && ($_GET['id'] > 0)) {
					$id = $_GET['id'];
					$sp = loadone_sanpham($id);
					if (!$sp) {
						echo "Sản phẩm không tồn tại.";
					} else {
						$img = $sp['img'];
						$name = $sp['name'];
						$price = $sp['price'];
						$description = $sp['description'];
				?>
						<div>
							<img src="<?= $img ?>" alt="" width="400px">
						</div>
						<div>
							<p>Mã sản phẩm:
								<?= $id ?>
							</p>
							<p>Tên:
								<?= $name ?>
							</p>
							<p>Đơn giá:
								<?= $price ?>
							</p>
							<p>Giảm giá: 20%</p>
							<p>Mô tả:
								<?= $description ?>
							</p>
						</div>
					<?php } ?>

				<?php } ?>

			</div>
		</div>

		<div class="comment">
			<div class="container">
				<div style="display: grid; grid-template-columns: 2fr 1fr; background: #DDDDDD; margin-top: 40px">
					<div style="margin: 20px 0 20px 10px">
						<table>
							<tr style="text-align: center;">
								<td style="width: 40px">Mã số</td>
								<td style="width: 300px">Nội dung bình luận</td>
								<td style="width: 130px">Mã khách hàng</td>
								<td style="width: 200px">Thời gian</td>
							</tr>

							<?php
							foreach ($listbinhluan as  $binhluan) { ?>
								<table>
									<tr>
										<td style="width: 40px; text-align: center">
											<?= $binhluan['id']; ?>
										</td>
										<td style="width: 300px; padding-left: 10px">
											<?= $binhluan['noi_dung']; ?>
										</td>
										<td style="width: 130px; text-align: center">
											<?= $binhluan['id_kh']; ?>
										</td>
										<td style="width: 200px; text-align: center">
											<?= $binhluan['ngay_bl']; ?>
										</td>
									</tr>
								</table>
							<?php } ?>
						</table>
					</div>
					<div style="margin-top: 20px">
						<form action="./account/addbl.php" class="row g-2" method="post">
							<div>
								<input type="hidden" name="id_sp" value="<?= $id_sp ?>">
								<input type="hidden" name="id_kh" value="<?= $id_kh ?>">
							</div>
							<div class="col-auto" style="margin-bottom: 20px">
								<textarea name="noi_dung" class="form-control" id="" cols="40" rows="5" placeholder="Viết bình luận"></textarea>
							</div>
							<div class="col-auto">
								<button type="submit" class="btn btn-primary mb-3" name="guibl">Gửi</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<!-- Best Sellers -->
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>other products</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<?php for ($i = 0; $i < count($data); $i++) {
							$img = $data[$i]['img'];
							$id = $data[$i]['id'];
							$name = $data[$i]['name'];
							$price = $data[$i]['price'];
						?>
							<div class="product-item men">
								<div class="product discount product_filter">
									<div class="product_image">
										<a href="details.php?id=<?php echo $id; ?>"><img src="<?= $img ?>" alt="" style="height: 230px"></a>
									</div>
									<div class="favorite favorite_left"></div>
									<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
										<span>-$20</span>
									</div>
									<div class="product_info">
										<h6 class="product_name"><a href="details.php?id=<?php echo $id; ?>"><?= $name ?></a></h6>
										<div class="product_price">
											<?= $price ?>
										</div>
									</div>
								</div>
								<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>



		<div class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
							<h4>Newsletter</h4>
							<p>Subscribe to our newsletter and get 20% off your first purchase</p>
						</div>
					</div>
					<div class="col-lg-6">
						<form action="post">
							<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
								<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
								<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
							<ul class="footer_nav">
								<li><a href="#">Blog</a></li>
								<li><a href="#">FAQs</a></li>
								<li><a href="contact.html">Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="footer_nav_container">
							<div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
						</div>
					</div>
				</div>
			</div>
		</footer>

	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>