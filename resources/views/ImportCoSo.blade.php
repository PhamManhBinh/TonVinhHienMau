
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Import từ cơ sở</title>

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

              <li class="sidebar-item active has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Quản lý import</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item active">
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

        <div id="main-content">
          <div class="page-heading">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>Cơ sở</h3>
                  <p class="text-subtitle text-muted">Import file excel từ cơ sở</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Trang chủ</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Cơ sở</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            <section id="custom-file-input">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- Button Import -->
                    <div class="card-header">
                      <h4 class="card-title">IMPORT</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-quynhon">
                                  Quy Nhơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-tuyphuoc">
                                  Tuy Phước
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-anlao">
                                  An Lão
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-annhon">
                                  An Nhơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-hoaian">
                                  Hoài Ân
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-hoainhon">
                                  Hoài Nhơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-phumy">
                                  Phù Mỹ
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-phucat">
                                  Phù Cát
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-vinhthanh">
                                  Vĩnh Thạnh
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-vancanh">
                                  Vân Canh
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="import-tayson">
                                  Tây Sơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Button View -->
                    <div class="card-header">
                      <h4 class="card-title">VIEW</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-quynhon">
                                  Quy Nhơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-tuyphuoc">
                                  Tuy Phước
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-anlao">
                                  An Lão
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-annhon">
                                  An Nhơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-hoaian">
                                  Hoài Ân
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-hoainhon">
                                  Hoài Nhơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-phumy">
                                  Phù Mỹ
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-phucat">
                                  Phù Cát
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-vinhthanh">
                                  Vĩnh Thạnh
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-vancanh">
                                  Vân Canh
                                </button>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-md-6 mb-3">
                            <fieldset>
                              <div class="input-group">
                                <input
                                  type="file"
                                  class="form-control"
                                  id="inputGroupFile04"
                                  aria-describedby="inputGroupFileAddon04"
                                  aria-label="Upload"
                                />
                                <button class="btn btn-primary" type="button" id="view-tayson">
                                  Tây Sơn
                                </button>
                              </div>
                            </fieldset>
                          </div>
                        </div>
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

    <script src="assets/js/main.js"></script>
  </body>
</html>
