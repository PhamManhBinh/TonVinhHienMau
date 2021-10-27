<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kết quả import</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
</head>

<body>
    <div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
          <div class="sidebar-header">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl ms-3">
                <a href="{{ url('/Index') }}">
                  <img src="assets/images/faces/1.jpg" alt="Logo" srcset="" />
                </a>
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">Admin</h5>
                <h6 class="text-teal mb-0">@admin</h6>
              </div>
              <div class="toggler ms-2">
                <a href="#" class="sidebar-hide d-xl-none d-block"
                  ><i class="bi bi-x bi-middle"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title">Menu</li>

              <li class="sidebar-item">
                <a href="{{ url('/Index') }}" class="sidebar-link">
                  <i class="bi bi-grid-fill"></i>
                  <span>Trang chủ</span>
                </a>
              </li>

              <li class="sidebar-item has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-stack"></i>
                  <span>Quản lý tôn vinh</span>
                </a>
                <ul class="submenu ">
                  <li class="submenu-item">
                    <a href="{{ url('/KiemDuyetTonVinh') }}">Kiểm duyệt tôn vinh</a>
                  </li>
                  <li class="submenu-item ">
                    <a href="{{ url('/TimKiemTonVinh') }}"> Tìm kiếm thông tin </a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-hexagon-fill"></i>
                  <span>Lịch sử tôn vinh</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item">
                    <a href="{{ url('/TaoMoiTonVinh') }}">Tạo mới tôn vinh</a>
                  </li>
                  <li class="submenu-item">
                    <a href="{{ url('/XemKetQua') }}">Xem kết quả</a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-droplet-fill"></i>
                  <span>Quản lý nguồn máu</span>
                </a>
              </li>

              <li class="sidebar-item active has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Quản lý import</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item">
                    <a href="#">Cơ sở</a>
                  </li>
                  <li class="submenu-item active">
                    <a href="{{ url('/ImportBenhVien') }}">Bệnh viện</a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-person-badge-fill"></i>
                  <span>Quản lý tài khoản</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item">
                    <a href="{{ url('/TaoTaiKhoan') }}">Tạo tài khoản</a>
                  </li>
                  <li class="submenu-item active">
                    <a href="{{ url('/DoiMatKhau') }}">Đổi mật khẩu</a>
                  </li>
                  <li class="submenu-item ">
                    <a href="{{ url('/UpdateTaiKhoan') }}">Sửa/Xóa tài khoản</a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item">
                <a href="{{ url('/Logout') }}" class="sidebar-link">
                  <i class="bi bi-arrow-bar-right"></i>
                  <span>Đăng xuất</span>
                </a>
              </li>
            </ul>
          </div>
          <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
          </button>
        </div>
      </div>

        <div id="main" class="layout-navbar">
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-envelope bi-sub fs-4 text-gray-600"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">Admin</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, Admin!</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-mid bi bi-gear me-2"></i>
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"> </i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            @php
                $listDuplicate = $data['listDuplicate'];
                $listInsert = $data['listInsert'];
                $listUpdate = $data['listUpdate'];
            @endphp
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Kết quả import</h3>
                                <p class="text-subtitle text-muted">Kết quả import từ bệnh viện.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Kết quả import</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <section class="bootstrap-select">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
										<form action ="/ImportBenhVien/ImportAll" method="post">
                                        {{ csrf_field() }}
                                            <div class="row">
                                                <div class="text-center mt-1">
                                                    <h3>KẾT QUẢ IMPORT</h3>
                                                    <table class="mx-auto mb-5">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-left">Số người được cập nhật:</td>
                                                                <td>{{ $count['update'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Số người được thêm mới:</td>
                                                                <td>{{ $count['insert'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Số người cần xử lý:</td>
                                                                <td>{{ $count['duplicate'] }}</td>
                                                            </tr>
															@if($count['error']>0)
															<tr>
                                                                <td class="text-left">Lỗi:</td>
                                                                <td>{{ $count['error'] }}</td>
                                                            </tr>
															@endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="line-set mb-4"></div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Số thứ tự</th>
                                                                <th>Họ và tên</th>
                                                                <th>Ngày sinh</th>
                                                                <th>Nơi làm việc</th>
                                                                <th>Số điện thoại</th>
                                                                <th>Địa chỉ</th>
                                                                <th>Số lần đã hiến</th>
                                                                <th>Nhóm máu</th>
                                                                <th>Nhóm Rh</th>
                                                                <th>Chọn</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <!-- những người cần xử lý -->
                                                        @if ($count['duplicate'] > 0)
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="11">
                                                                        <h4>Cần Xử Lý</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            @for ($i = 0; $i < count($listDuplicate); $i++)
                                                                <tbody id="tbody_{{ $listDuplicate[$i][0]->Id }}">
                                                                    @for ($j = 0; $j < count($listDuplicate[$i]); $j++)
                                                                        @if ($j == 0)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $i + 1 }}
                                                                                    <img class="icon"
                                                                                        src="assets/images/logo/excel.png" />
																					<input type="hidden" name="dataID[]" value="{{ $listDuplicate[$i][$j]->Id }}"/>
                                                                                </td>
                                                                                <td class="text-bold-500">
                                                                                    {{ $listDuplicate[$i][$j]->HoTen }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->NgaySinh->format('d/m/Y') }}
                                                                                </td>
                                                                                <td class="text-bold-500">
                                                                                    {{ $listDuplicate[$i][$j]->NoiLamViec }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SDT }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->DiaChi }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SoLanHien }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_ABO }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_Rh }}
                                                                                </td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        @else
                                                                            <tr id="row_{{ $listDuplicate[$i][$j]->Id }}">
                                                                                <td>
                                                                                    {{ $i + 1 }}
                                                                                    <img class="icon"
                                                                                        src="assets/images/logo/database_16px.png" />
																					<input type="hidden" name="dataID[]" value="{{ $listDuplicate[$i][$j]->Id }}"/>
                                                                                </td>
                                                                                <td class="text-bold-500"></td>
                                                                                <td></td>
                                                                                <td class="text-bold-500">
                                                                                    {{ $listDuplicate[$i][$j]->NoiLamViec }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SDT }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->DiaChi }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->SoLanHien }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_ABO }}
                                                                                </td>
                                                                                <td>{{ $listDuplicate[$i][$j]->Nhom_Rh }}
                                                                                </td>
                                                                                <td>
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="flexRadioDefault"
                                                                                        id="flexRadioDefault1" />
                                                                                </td>
                                                                                <td><a onclick="Xoa({{ $listDuplicate[$i][$j]->Id }})"
                                                                                        class="btn btn-primary btn-size">Xóa</a>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endfor
                                                                    <tr>
                                                                        <td colspan="11" style="text-align: right">
                                                                            <button class="btn btn-primary"
                                                                                type="button" id="btn-import" onclick="Import({{ $listDuplicate[$i][0]->Id }})">
                                                                                Import
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endfor
                                                        @endif

                                                        <!-- những người được thêm mới -->
                                                        @if ($count['insert'] > 0)
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="11">
                                                                        <h4>Thêm Mới</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            @for ($i = 0; $i < count($listInsert); $i++)
                                                                <tbody id="tbody_{{ $listInsert[$i]->Id }}">
                                                                    <tr>
                                                                        <td>
                                                                            {{ $i + 1 }}
                                                                            <img class="icon"
                                                                                src="assets/images/logo/excel.png" />
																			<input type="hidden" name="dataID[]" value="{{ $listInsert[$i]->Id }}""/>
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listInsert[$i]->HoTen }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->NgaySinh->format('d/m/Y') }}
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listInsert[$i]->NoiLamViec }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->SDT }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->DiaChi }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->SoLanHien }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->Nhom_ABO }}
                                                                        </td>
                                                                        <td>{{ $listInsert[$i]->Nhom_Rh }}
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td colspan="11" style="text-align: right">
                                                                            <button class="btn btn-primary"
                                                                                type="button" id="btn-import" onclick="Import({{ $listInsert[$i]->Id }})">
                                                                                Import
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endfor
                                                        @endif

                                                        <!-- những người được cập nhật -->
                                                        @if ($count['update'] > 0)
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="11">
                                                                        <h4>Cập Nhật</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            @for ($i = 0; $i < count($listUpdate); $i++)
                                                                <tbody id="tbody_{{ $listUpdate[$i]->Id }}">
                                                                    <tr>
                                                                        <td>
                                                                            {{ $i + 1 }}
                                                                            <img class="icon"
                                                                                src="assets/images/logo/excel.png" />
																			<input type="hidden" name="dataID[]" value="{{ $listUpdate[$i]->Id }}"/>
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listUpdate[$i]->HoTen }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->NgaySinh->format('d/m/Y') }}
                                                                        </td>
                                                                        <td class="text-bold-500">
                                                                            {{ $listUpdate[$i]->NoiLamViec }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->SDT }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->DiaChi }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->SoLanHien }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->Nhom_ABO }}
                                                                        </td>
                                                                        <td>{{ $listUpdate[$i]->Nhom_Rh }}
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td colspan="11" style="text-align: right">
                                                                            <button class="btn btn-primary"
                                                                                type="button" id="btn-import" onclick="Import({{ $listUpdate[$i]->Id }})">
                                                                                Import
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endfor
                                                        @endif
														
                                                    </table>
                                                </div>
                                                <div id="btn-right">
                                                    <button class="btn btn-primary btn-set" type="submit"
                                                        id="btn-import-all">
                                                        Import All
                                                    </button>
                                                </div>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    function Xoa(id) {
        $.ajax({
            url: "/api/ImportBenhVien/Xoa",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", Id: id },
            success: function (data) {
                $("#row_"+id).remove();
                alert("Xóa thành công!");
            },
			error: function(){
				alert("Có lỗi xảy ra! Vui lòng thử lại");
			}
        })
    }
	function Import(id) {
        $.ajax({
            url: "/api/ImportBenhVien/Import",
            method: "POST",
            data: { "_token": "{{ csrf_token() }}", Id: id },
            success: function (data) {
                $("#tbody_"+id).remove();
                alert("Import thành công!");
            },
			error: function(){
				alert("Có lỗi xảy ra! Vui lòng thử lại");
			}
        })
    }
</script>
</body>

</html>
