<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tôn vinh hiến máu</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />

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
                <h5 class="font-bold">{{ Session::get('name') }}</h5>
                <h6 class="text-teal mb-0">{{ '@'.Session::get('username') }}</h6>
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

              <li class="sidebar-item has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Quản lý import</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item">
                    <a href="#">Cơ sở</a>
                  </li>
                  <li class="submenu-item">
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
                  <li class="submenu-item">
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

              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown me-1">
                    <a
                      class="nav-link active dropdown-toggle"
                      href="#"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <i class="bi bi-envelope bi-sub fs-4 text-gray-600"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <li>
                        <h6 class="dropdown-header">Mail</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">No new mail</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown me-3">
                    <a
                      class="nav-link active dropdown-toggle"
                      href="#"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end"
                      aria-labelledby="dropdownMenuButton"
                    >
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
                        <h6 class="mb-0 text-gray-600">{{ Session::get('name') }}</h6>
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
                      <h6 class="dropdown-header">Hello, {{ Session::get('name') }}!</h6>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        ><i class="icon-mid bi bi-person me-2"></i> My Profile</a
                      >
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

        <div id="main-content">
          <div class="page-heading">
            <h3>Thống kê thành viên</h3>
          </div>
          <div class="page-content">
            <section class="row">
              <!-- Cột đầu tiên trong main -->
              <div class="col-12 col-lg-9">
                <!-- Hàng thứ nhất -->
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/7.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Bình</h5>
                              <h6 class="text-muted mb-0">@scrummaster</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/8.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Hiếu</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/5.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Hương</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/1.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Hoàng</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/3.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Thu</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card">
                      <div class="card-body px-3 py-4-5">
                        <div class="row">
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                              <img src="assets/images/faces/4.jpg" alt="Face 1" />
                            </div>
                            <div class="ms-4 name">
                              <h5 class="font-bold">Tấn</h5>
                              <h6 class="text-muted mb-0">@developer</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Hàng thứ hai -->
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header mb-1">
                        <h4>Truy cập</h4>
                      </div>
                      <div class="card-body">
                        <div id="chart-profile-visit"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Hàng thứ ba -->
                <div class="row">
                  <!-- Cột thứ nhất -->
                  <div class="col-12 col-xl-4">
                    <div class="card">
                      <div class="card-header mb-1">
                        <h4>Truy cập</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-6">
                            <div class="d-flex align-items-center">
                              <svg
                                class="bi text-primary"
                                width="32"
                                height="32"
                                fill="blue"
                                style="width: 10px"
                              >
                                <use
                                  xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"
                                />
                              </svg>
                              <h5 class="mb-0 ms-3">Table</h5>
                            </div>
                          </div>
                          <div class="col-6">
                            <h5 class="mb-0">862</h5>
                          </div>
                          <div class="col-12">
                            <div id="chart-europe"></div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="d-flex align-items-center">
                              <svg
                                class="bi text-success"
                                width="32"
                                height="32"
                                fill="blue"
                                style="width: 10px"
                              >
                                <use
                                  xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"
                                />
                              </svg>
                              <h5 class="mb-0 ms-3">Mobile</h5>
                            </div>
                          </div>
                          <div class="col-6">
                            <h5 class="mb-0">375</h5>
                          </div>
                          <div class="col-12">
                            <div id="chart-america"></div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="d-flex align-items-center">
                              <svg
                                class="bi text-danger"
                                width="32"
                                height="32"
                                fill="blue"
                                style="width: 10px"
                              >
                                <use
                                  xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill"
                                />
                              </svg>
                              <h5 class="mb-0 ms-3">Laptop</h5>
                            </div>
                          </div>
                          <div class="col-6">
                            <h5 class="mb-0">1025</h5>
                          </div>
                          <div class="col-12">
                            <div id="chart-indonesia"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Cột thứ hai -->
                  <div class="col-12 col-xl-8">
                    <div class="card">
                      <div class="card-header">
                        <h4>Nhận xét mới nhất</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-lg">
                            <thead>
                              <tr>
                                <th>Tên</th>
                                <th>Nhận xét</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="col-3">
                                  <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                      <img src="assets/images/faces/5.jpg" />
                                    </div>
                                    <p class="font-bold ms-3 mb-0">Hương</p>
                                  </div>
                                </td>
                                <td class="col-auto">
                                  <p class="mb-0">
                                    Thiết kế tuyệt vời! Bạn có thể hướng dẫn thiết kế được không?
                                  </p>
                                </td>
                              </tr>
                              <tr>
                                <td class="col-3">
                                  <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                      <img src="assets/images/faces/7.jpg" />
                                    </div>
                                    <p class="font-bold ms-3 mb-0">Bình</p>
                                  </div>
                                </td>
                                <td class="col-auto">
                                  <p class="mb-0">Giao diện bắt mắt, tươi sáng và đẹp.</p>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Cột thứ hai trong main -->
              <div class="col-12 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-xl">
                        <img src="assets/images/faces/2.jpg" alt="Face 1" />
                      </div>
                      <div class="ms-3 name">
                        <h5 class="font-bold">Vu Son Lam</h5>
                        <h6 class="text-muted mb-0">@productowner</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Tin nhắn gần đây</h4>
                  </div>
                  <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                      <div class="avatar avatar-lg">
                        <img src="assets/images/faces/4.jpg" />
                      </div>
                      <div class="name ms-4">
                        <h5 class="mb-1">Tấn</h5>
                        <h6 class="text-muted mb-0">@developer</h6>
                      </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                      <div class="avatar avatar-lg">
                        <img src="assets/images/faces/5.jpg" />
                      </div>
                      <div class="name ms-4">
                        <h5 class="mb-1">Hương</h5>
                        <h6 class="text-muted mb-0">@developer</h6>
                      </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                      <div class="avatar avatar-lg">
                        <img src="assets/images/faces/1.jpg" />
                      </div>
                      <div class="name ms-4">
                        <h5 class="mb-1">Hoàng</h5>
                        <h6 class="text-muted mb-0">@developer</h6>
                      </div>
                    </div>
                    <div class="px-4">
                      <button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">
                        Bắt đầu trò chuyện
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Thành viên</h4>
                  </div>
                  <div class="card-body">
                    <div id="chart-visitors-profile"></div>
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

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>
