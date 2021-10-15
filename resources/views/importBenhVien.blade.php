<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<!--<link href="font-awesome/css/font-awesome.css" rel="stylesheet">-->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/quanlytonvinh.css">
	<!--<link rel="stylesheet" type="text/css" href="./css/menu.css">-->
	<link rel="stylesheet" type="text/css" href="./css/header.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
	<title>Import Dữ Liệu Bệnh Viện</title>
</head>

<body>
	<div>
		<div>
			<img src="image/banner-hctd-sau.png" />
		</div>
		<nav id='nav' itemscope='itemscope' itemtype='http://schema.org/SiteNavigationElement' role='navigation'>
			<a class='menu-trigger' href='#'><svg fill='none' height='20' id='i-menu' overflow='visible' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' viewBox='0 -6 32 32' width='20'>
					<path d='M4 8 L28 8 M4 16 L28 16 M4 24 L28 24' /></svg> Menu</a>
			<ul class='shnav simple-mainmenu'>
				<li><a class='active' href='/'><span itemprop='name'>Trang Chủ</span></a></li>
				<li><a href='#' itemprop='url'><span itemprop='name'>Quản Lý Tài Khoản </span><svg fill='none' height='9' id='i-chevron-bottom-mobile' overflow='visible' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='6' viewBox='-15 -65 32 32' width='9' style="overflow:inherit;">
							<path d='M30 12 L16 24 2 12' /></svg></a>
					<ul>
						<li><a href='#' itemprop='url'><span itemprop='name'>Đổi Mật Khẩu</span></a></li>
						<li><a href='#' itemprop='url'><span itemprop='name'>Tạo Tài Khoản</span></a></li>
						<li><a href='#' itemprop='url'><span itemprop='name'>Sửa/Xóa Tài Khoản</span></a></li>
					</ul>
				</li>
				<li><a href='#' itemprop='url'><span itemprop='name'>Quản Lý Nguồn Máu</span></a></li>
				<li><a href='#' itemprop='url'><span itemprop='name'>Quản Lý Tôn Vinh</span><svg fill='none' height='9' id='i-chevron-bottom-mobile' overflow='visible' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='6' viewBox='-15 -65 32 32' width='9' style="overflow:inherit;">
							<path d='M30 12 L16 24 2 12' /></svg></a>
					<ul>
						<li><a href='#' itemprop='url'><span itemprop='name'>Kiểm Duyệt Tôn Vinh</span></a></li>
						<li><a href='#' itemprop='url'><span itemprop='name'>Tìm Kiếm Thông Tin</span></a></li>
					</ul>
				</li>
				<li><a href='#' itemprop='url'><span itemprop='name'>Lịch Sử Tôn Vinh</span><svg fill='none' height='9' id='i-chevron-bottom-mobile' overflow='visible' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='6' viewBox='-15 -65 32 32' width='9' style="overflow:inherit;">
							<path d='M30 12 L16 24 2 12' /></svg></a>
					<ul>
						<li><a href='#' itemprop='url'><span itemprop='name'>Tạo Mới Tôn Vinh</span></a></li>
						<li><a href='#' itemprop='url'><span itemprop='name'>Xem Kết Quả Tôn Vinh</span></a></li>
					</ul>
				</li>
				<li><a href='#' itemprop='url'>Đăng Nhập</a></li>
			</ul>
		</nav>
	</div>
    <form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-tt">
			<h1>Import Dữ Liệu Bệnh Viện</h1><br>
            <table class="center">
				<tr>
					<td></td>
					<td>
					<?php
					if(isset($status)){
                        if($status != 1){
							echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
                        }else{
                            echo '<div class="alert alert-success" role="success">
                            <center>Kết quả nhập dữ liệu:</center><br>
                            Số người được cập nhật: '.$count['update'].'<br>
                            Số người được thêm mới: '.$count['insert'].'<br>
                            Số người cần xử lý: '.$count['duplicate'].'
                            </div>';
                        }
                    }
					?>
					</td>
				</tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="file" id="myfile" name="myfile" accept=".xls,.xlsx">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm add">Import</button><br/>
                    </td>
                </tr>
            </table>

        </div>
    </form>
<script type='text/javascript'>
	// Main Menu
	var ww = document.body.clientWidth;
	$(document).ready(function() {
		$(".shnav li a").each(function() {
			if($(this).next().length > 0) {
				$(this).addClass("parent")
			}
		});
		$(".menu-trigger").click(function(e) {
			e.preventDefault();
			$(this).toggleClass("active");
			$(".shnav").toggle()
		});
		adjustMenu()
	});
	$(window).bind("resize orientationchange", function() {
		ww = document.body.clientWidth;
		adjustMenu()
	});
	var adjustMenu = function() {
		if(ww < 580) {
			$(".menu-trigger").css("display", "inline-block");
			if(!$(".menu-trigger").hasClass("active")) {
				$(".shnav").hide()
			} else {
				$(".shnav").show()
			}
			$(".shnav li").unbind("mouseenter mouseleave");
			$(".shnav li a.parent").unbind("click").bind("click", function(e) {
				e.preventDefault();
				$(this).parent("li").toggleClass("hover")
			})
		} else if(ww >= 580) {
			$(".menu-trigger").css("display", "none");
			$(".shnav").show();
			$(".shnav li").removeClass("hover");
			$(".shnav li a").unbind("click");
			$(".shnav li").unbind("mouseenter mouseleave").bind("mouseenter mouseleave", function() {
				$(this).toggleClass("hover")
			})
		}
	}
	//]]>
	</script>

</body>

</html>
