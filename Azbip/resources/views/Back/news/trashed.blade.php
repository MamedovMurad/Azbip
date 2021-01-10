@extends('Back.Layout.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          Data table
        </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data table</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
          <a href="elave-et-xeber"><button class="btn btn-block btn-primary mb-4">Xəbər əlavə et</button></a>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Başlıq</th>
                        <th>Ətraflı</th>
                        <th>Baxılma sayı</th>
                        <th>Yaranma vaxtı</th>
                        <th>Əməliyyatlar</th>
                     
                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($news as $key=>$news)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                      
                          <input  class="switch" disease-id="{{$news->id}}" type="checkbox" data-on="Aktiv"  data-onstyle="success" data-off="Passiv" data-offstyle="danger" @if ($news->status==1) checked @endif  data-toggle="toggle">
                       
                        </td>
                        <td>{{$news->title}}</td>
                        <td>{!!$news->content!!}</td>
                        <td>{{$news->created_at->diffForHumans()}}</td>
                        <td>
                          <label class="badge badge-info">On hold</label>
                        </td>
                        <td>
                          <button class="btn btn-primary">View</button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
      </div>
    </footer>
    <!-- partial -->
  </div>
@endsection

  @section('script')
 
  <script src="{{asset('admin/')}}/js/data-table.js"></script>
  @endsection
