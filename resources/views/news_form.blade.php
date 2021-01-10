@extends('Layout.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

      <div class="row">


        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Xəbər əlavə et</h4>

              <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleInputName1">Kateqoriya seç</label>
                    <select type="text" class="form-control" id="exampleInputName1" >
                        <option value="">Ümumi</option>
                        <option value="">Sport</option>
                        <option value="">Biznes</option>
                        <option value="">Gündəm</option>

                    </select>
                  </div>
                <div class="form-group">
                  <label for="exampleInputName1">Başləq</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="xəbər başlığı ...">
                </div>



                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="img[]" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="foto əlavə et">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Yüklə</button>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleTextarea1">Mətn</label>
                  <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Əlavə et</button>

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

@endsection
