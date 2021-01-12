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
             
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data table</li>
              </ol>
            </nav>
          </div>
          
      <div class="row" >
          
        <div class="col-4 ">
          <div class="card"  style="height:210px !important; position:fixed;top:158px;left:295px; width:23%  ">
              
            
            <div class="card-body" >
                
              <h4 class="card-title">Kateqoriya əlavə et</h4>
         
              <form method="post" action="{{route('category.create')}}"  enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                  <label for="exampleInputName1">Adı</label>
                  <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Kateqoriya adı">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Əlavə et</button>

              </form>
           
          </div>
        </div>


      </div>
      <div class="col-8">
      <div class="card">
        <div class="card-body">
         
            
              <div class="table-responsive">
                <table id="order-listing" class="table">
                    
                  <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Status</th>
                        <th>Adı</th>
                        <th>Hazırlanma vaxtı</th>
                        <th>Yenilənmə vaxtı</th>
                        <th>Əməliyyatlar</th>
                  
                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($news_categories as $key=>$category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                      
                          <input  class="switch" category-id="{{$category->id}}" type="checkbox" data-on="Aktiv"  data-onstyle="success" data-off="Passiv" data-offstyle="danger" @if ($category->status==1) checked @endif  data-toggle="toggle">
                       
                        </td>
                      
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        

                     
                        <td style="display: flex; justify-content:space-around">
                               <a  style=" padding:6px " category-id={{$category->id}} title="Redaktə et" class="btn btn-sm btn-primary edit-click"><i style="color:white;" class="fa fa-pen"></i></a>
                               <a  style=" ; padding:6px ; "  href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                              
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
   
    <!-- partial -->
  </div>


 
      
      <!-- Dummy Modal Starts -->
     
      <!-- Dummy Modal Ends -->
      <!-- Modal starts -->
      
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel-2">Kateqoriyannı redaktə et </h5>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{route('category.update')}}">
                @csrf
                <div class="form-group">
                <label >Kateqoriya adı</label>
                    <input class="form-control" type="text" name="name" id="name">
                    <input type="hidden" name="id" id="category_id">
                </div>
                <div class="form-group">
                    <label >Kateqoriya slug</label>
                        <input class="form-control" type="text" name="slug" id="slug">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                      </div>
            </form>

            </div>
           
          </div>
        </div>
      </div>
      <!-- Modal Ends -->
   






  @section('script')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(function() {
    $('.edit-click').click(function() {
    id = $(this)[0].getAttribute('category-id');
    $.ajax({
        type:'GET',
        url:'{{route('category.getdata')}}',
        data:{id:id},
        success:function(data){
            console.log(data);
         $('#name').val(data.name);
         $('#slug').val(data.slug);
         $('#category_id').val(data.id);
            $('#editModal').modal();
        }

    })

    
    });
    $('.switch').change(function() {
      id = $(this)[0].getAttribute('category-id');
      statu=$(this).prop('checked');
      $.get("{{route('switch1')}}", {id:id,statu:statu}, function(data, status){
    console.log(data);
  });
    })
  })
</script>
<script src="{{asset('admin/')}}/js/data-table.js"></script>
  @endsection
  @endsection
