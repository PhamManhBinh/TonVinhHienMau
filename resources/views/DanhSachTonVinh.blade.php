@extends('layouts.app')

@section('title', 'Danh Sách Tôn Vinh')

@section('lich-su-ton-vinh', 'active')

@section('content')

      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Danh sách tôn vinh</h3>
                <p class="text-subtitle text-muted">Danh sách các đợt tôn vinh.</p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách tôn vinh</li>
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
                      <div class="row">
                        <div class="text-center mt-4 mb-5">
                          <h3>DANH SÁCH ĐỢT TÔN VINH</h3>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered mb-0">
                            <thead>
                              <tr>
                                <th>Số thứ tự</th>
                                <th>Đợt tôn vinh</th>
                                <th>Ngày tạo</th>
                                <th>Xóa</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td class="text-bold-500">03/2020</td>
                                <td>28/03/2020</td>
                                <td>
                                  <a href="#" class="btn btn-danger btn-size">Xóa</a>
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
            </div>
          </section>
          <!-- Bootstrap Select end -->
        </div>
      </div>
@endsection