<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đổi mật khẩu</title>

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
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
                <a href="index.html">
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
                <a href="index.html" class="sidebar-link">
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
                    <a href="kiem-duyet-ton-vinh.html">Kiểm duyệt tôn vinh</a>
                  </li>
                  <li class="submenu-item ">
                    <a href="tim-kiem-thong-tin.html"> Tìm kiếm thông tin </a>
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
                    <a href="form-element-input.html">Tạo mới tôn vinh</a>
                  </li>
                  <li class="submenu-item">
                    <a href="xem-lich-su.html">Xem kết quả</a>
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
                    <a href="import-co-so.html">Cơ sở</a>
                  </li>
                  <li class="submenu-item">
                    <a href="import-benh-vien.html">Bệnh viện</a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item active has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-person-badge-fill"></i>
                  <span>Quản lý tài khoản</span>
                </a>
                <ul class="submenu active">
                  <li class="submenu-item">
                    <a href="auth-register.html">Tạo tài khoản</a>
                  </li>
                  <li class="submenu-item active">
                    <a href="doi-mat-khau.html">Đổi mật khẩu</a>
                  </li>
                  <li class="submenu-item ">
                    <a href="sua-xoa-thong-tin.html">Sửa/Xóa tài khoản</a>
                  </li>
                </ul>
              </li>

              <li class="sidebar-item">
                <a href="auth-login.html" class="sidebar-link">
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
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>Đổi mật khẩu</h3>
                  <p class="text-subtitle text-muted">Thay đổi mật khẩu của cán bộ.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
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
                        <div class="row justify-content-center">
                          <div class="text-center mt-4 mb-4">
                            <h3>THAY ĐỔI MẬT KHẨU</h3>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form border border-secondary" method="#">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="password-vertical">Mật khẩu hiện tại</label>
                                                    <input type="password" id="password-vertical"
                                                        class="form-control mt-2 py-2" name="contact"
                                                        placeholder="********">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password-vertical">Mật khẩu mới</label>
                                                    <input type="password" id="password-vertical"
                                                        class="form-control mt-2 py-2" name="contact"
                                                        placeholder="********">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password-vertical">Xác nhận mật khẩu</label>
                                                    <input type="password" id="password-vertical"
                                                        class="form-control mt-2 py-2" name="contact"
                                                        placeholder="********">
                                                </div>
                                            </div>
                                            <div class="form-actions d-flex justify-content-end mt-4">
                                                <button type="reset" class="btn btn-light-primary me-2">Hủy bỏ</button>
                                                <button type="submit" class="btn btn-primary ">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Bootstrap Select end -->
          </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Include Choices JavaScript -->
    <script src="assets/vendors/choices.js/choices.min.js"></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>