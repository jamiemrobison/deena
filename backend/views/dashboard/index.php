<?php
	$this->title = "Dashboard (ภาพรวมระบบ)";
 ?>
 <div class="dashboard">
 	 <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-rocket"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ยอดตามเป้า</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-heart-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">สายงาน</span>
              <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-gift"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">VIP</span>
              <span class="info-box-number">60</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">สมาชิกใหม่</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
      	<div class="col-lg-12">
      		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>เลขที่กรรมธรรม์</th>
                    <th>สินค้า</th>
                    <th>สถานะ</th>
                    <th>ประเภท</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>ประกันภัยชั้น 1</td>
                    <td><span class="label label-success">Completed</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">ประกันภัยรถยนต์</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>ประกันภัยชั้น 2</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">ประกันภัยรถยนต์</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>ประกันภัยชั้น 1</td>
                    <td><span class="label label-danger">Cancel</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">ประกันภัยรถยนต์</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>ประกันภัยชั้น 2+</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">ประกันภัยรถยนต์</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>ประกันภัยชั้น 3</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">ประกันภัยรถยนต์</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>ประกันภัยชั้น 1</td>
                    <td><span class="label label-danger">Cancel</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">ประกันภัยรถยนต์</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>ประกันภัยชั้น 1</td>
                    <td><span class="label label-success">Completed</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">ประกันภัยรถยนต์</div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          </div>
      	</div>
      </div>
 </div>