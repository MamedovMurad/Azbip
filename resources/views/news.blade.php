@extends('Layout.master')
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
                        <th>Order #</th>
                        <th>Purchased On</th>
                        <th>Customer</th>
                        <th>Ship to</th>
                        <th>Base Price</th>
                        <th>Purchased Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>2012/08/03</td>
                        <td>Edinburgh</td>
                        <td>New York</td>
                        <td>$1500</td>
                        <td>$3200</td>
                        <td>
                          <label class="badge badge-info">On hold</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2015/04/01</td>
                        <td>Doe</td>
                        <td>Brazil</td>
                        <td>$4500</td>
                        <td>$7500</td>
                        <td>
                          <label class="badge badge-danger">Pending</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2010/11/21</td>
                        <td>Sam</td>
                        <td>Tokyo</td>
                        <td>$2100</td>
                        <td>$6300</td>
                        <td>
                          <label class="badge badge-success">Closed</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2016/01/12</td>
                        <td>Sam</td>
                        <td>Tokyo</td>
                        <td>$2100</td>
                        <td>$6300</td>
                        <td>
                          <label class="badge badge-success">Closed</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>2017/12/28</td>
                        <td>Sam</td>
                        <td>Tokyo</td>
                        <td>$2100</td>
                        <td>$6300</td>
                        <td>
                          <label class="badge badge-success">Closed</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>2000/10/30</td>
                        <td>Sam</td>
                        <td>Tokyo</td>
                        <td>$2100</td>
                        <td>$6300</td>
                        <td>
                          <label class="badge badge-info">On-hold</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>2011/03/11</td>
                        <td>Cris</td>
                        <td>Tokyo</td>
                        <td>$2100</td>
                        <td>$6300</td>
                        <td>
                          <label class="badge badge-success">Closed</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>2015/06/25</td>
                        <td>Tim</td>
                        <td>Italy</td>
                        <td>$6300</td>
                        <td>$2100</td>
                        <td>
                          <label class="badge badge-info">On-hold</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>2016/11/12</td>
                        <td>John</td>
                        <td>Tokyo</td>
                        <td>$2100</td>
                        <td>$6300</td>
                        <td>
                          <label class="badge badge-success">Closed</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>2003/12/26</td>
                        <td>Tom</td>
                        <td>Germany</td>
                        <td>$1100</td>
                        <td>$2300</td>
                        <td>
                          <label class="badge badge-danger">Pending</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
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
