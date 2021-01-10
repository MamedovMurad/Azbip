@extends('Back.Layout.master')
@section('content')
@section('css')
<style>
  .toggle{
    width: 80px !important;
    height: 15px !important;
    padding: 0 !important;
  }
  label.btn{
    font-size: 17px;
    padding: 8px 0 !important;
  }
</style>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          Data table
        </h3>
      
        <nav aria-label="breadcrumb">
          <a href="" class="btn btn-warning btn-sm float-right"><i class="fa fa-trash">&nbsp;  
          </i>Silinən Məqalələr</a>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data table</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
          <a href="{{route('news.create')}}"><button class="btn btn-block btn-primary mb-4">Xəbər əlavə et</button></a>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Status</th>
                        <th>Foto</th>
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
                        <td><img src="{{$news->image}}" style="width:120px; height:50px; border-radius:0px" ></td>
                        <td>{{$news->title}}</td>
                        <td>{!!$news->content!!}</td>
                        <td>{{$news->hit}}</td>
                        <td>{{$news->created_at->format('d M Y')}}</td>
                        {{-- <td>
                          <label class="badge badge-info">On hold</label>
                        </td> --}}
                        <td style="display: flex; justify-content:space-around">
                               <a  style=" padding:6px " href="{{route('news.edit', $news->id)}}" title="Redaktə et" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                               <a  style=" ; padding:6px ; " href="{{route('delete.news', $news->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                               <a style="  "  href=""> <button class="btn btn-success" style="height: 30px">View</button></a>
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
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(function() {
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('news-id');
      statu=$(this).prop('checked');
      $.get("", {id:id,statu:statu}, function(data, status){
    console.log(data);
  });
    })
  })
</script>
  <script src="{{asset('admin/')}}/js/data-table.js"></script>
  @endsection
