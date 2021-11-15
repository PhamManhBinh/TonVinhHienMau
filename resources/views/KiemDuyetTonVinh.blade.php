@extends('layouts.app')

@section('title', 'Kiểm Duyệt Tôn Vinh')

@section('quan-ly-import', 'active')

@section('content')
        <div id="main-content">
          <div class="page-heading">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>Kiểm duyệt tôn vinh</h3>
                  <p class="text-subtitle text-muted">Kiểm duyệt các đề xuất tôn vinh</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Kiểm duyệt tôn vinh
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>

            <!-- Section table -->
            <section class="bootstrap-select">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                          <div class="text-center mt-4 mb-5">
                            <h3>DANH SÁCH KIỂM DUYỆT CÁC ĐỀ XUẤT TÔN VINH</h3>
                          </div>
                          <!-- Button -->
                          <div id="btn-right">
                            <button
                              class="btn btn-primary btn-set"
                              type="button"
                              id="btn-apply-all"
                            >
                              Apply All
                            </button>
                            <button
                              class="btn btn-primary btn-set ms-3"
                              type="button"
                              id="btn-ket-qua"
                            >
                              Kết quả
                            </button>
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
                                  <th>Đề xuất tôn vinh</th>
                                  <th>Đã tôn vinh</th>
                                  <th>Năm tôn vinh</th>
                                  <th></th>
                                </tr>
                              </thead>
                              @for($i = 0; $i < count($data); $i++)
                              <tbody>
                              @for ($j = 0; $j < count($data[$i]); $j++)
                              @if ($j == 0)
                                <tr style="background: rgba(67, 190, 133, 0.25)">
                                  <td>
                                    {{ $i + 1 }}
                                    <img class="icon" src="assets/images/logo/excel.png" />
                                  </td>
                                  <td class="text-bold-500">{{ $data[$i][$j]->HoTen }}</td>
                                  <td>{{ $data[$i][$j]->NgaySinh->format('d/m/Y') }}</td>
                                  <td class="text-bold-500">{{ $data[$i][$j]->NoiLamViec ?? "-" }}</td>
                                  <td>{{ $data[$i][$j]->SDT ?? "-" }}</td>
                                  <td>{{ $data[$i][$j]->DiaChi ?? "-"}}</td>
                                  <td>{{ $data[$i][$j]->MucTonVinh }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_ABO }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_Rh ?? "-"}}</td>
                                  <td>{{ $data[$i][$j]->MucTonVinh }}</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
								                @else
								
                                <tr>
                                  <td>
                                    1
                                    <img class="icon" src="assets/images/logo/database_16px.png" />
                                  </td>
                                  <td class="text-bold-500"></td>
                                  <td></td>
                                  <td class="text-bold-500">{{ $data[$i][$j]->NoiLamViec }}</td>
                                  <td>{{ $data[$i][$j]->SDT }}</td>
                                  <td>{{ $data[$i][$j]->DiaChi }}</td>
                                  <td>{{ $data[$i][$j]->SoLanHien }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_ABO }}</td>
                                  <td>{{ $data[$i][$j]->Nhom_Rh }}</td>
                                  <td>
                                    <select class="select-no-width mb-2 ms-sm-2" id="basicSelect">
                                      <option>Không</option>
                                      <option>Mức 5</option>
                                      <option selected="selected">Mức 10</option>
                                      <option>Mức 15</option>
                                      <option>Mức 20</option>
                                      <option>Mức 30</option>
                                      <option>Mức 40</option>
                                    </select>
                                    <img src="assets/images/logo/green_circle_48px.png" />
                                  </td>
                                  <td><img src="assets/images/logo/5_48px.png" /></td>
                                  <td>2019</td>
                                  <td></td>
                                </tr>
								@endif
								@endfor
                                <tr>
                                  <td colspan="13" style="text-align: right">
                                    <button
                                      class="btn-width btn-primary"
                                      type="button"
                                      id="btn-import"
                                    >
                                      Apply
                                    </button>
                                  </td>
                                </tr>
                              </tbody>
							@endfor
                              
                            </table>
                          </div>
                          <!-- Button -->
                          <div id="btn-right">
                            <button
                              class="btn-width btn-primary btn-set"
                              type="button"
                              id="btn-xu-ly"
                            >
                              Thêm vào danh sách xử lý riêng
                            </button>
                            <button
                              class="btn-width btn-primary btn-set ms-3"
                              type="button"
                              id="btn-tim-tc"
                            >
                              Tìm thủ công
                            </button>
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
@endsection