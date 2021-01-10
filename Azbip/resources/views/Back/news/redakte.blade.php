@extends('Back.Layout.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

      <div class="row">


        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Xəbər redaktə et</h4>

              <form method="POST" action="{{route('news.update', $news->id)}}"  enctype="multipart/form-data">
             @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="exampleInputName1">Kateqoriya seç</label>
                    <select type="text" name="category" class="form-control" id="exampleInputName1" >
                      @foreach ($news_categories as $category)
                      <option @if($news->news_category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label for="exampleInputName1">Başlıq</label>
                  <input type="text" name="title" value="{{$news->title}}" class="form-control" id="exampleInputName1" placeholder="xəbər başlığı ...">
                </div>



                <div class="form-group">
                  <label>Foto</label>
                  <img src="{{asset($news->image)}}" class="img-thumbnail rounded" style="transform: translateX(260px)" max-width:300>
                  <input type="file" name="image"  class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" name="image" class="form-control file-upload-info" disabled placeholder="foto əlavə et">
                    <span  class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Yüklə</button>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleTextarea1">Mətn</label>
                  <textarea class="form-control" name="content" value="{!!$news->content!!}" id="exampleTextarea1" rows="4">{!!$news->content!!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Yenilə</button>

              </form>
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
@section('script')
<script src="{{asset('admin/pages/forms/')}}/../../js/file-upload.js"></script>
  <script src="{{asset('admin/pages/forms/')}}/../../js/typeahead.js"></script>
  <script src="{{asset('admin/pages/forms/')}}/../../js/select2.js"></script>
@endsection
@endsection
