<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
        </ul>
      </li>
    </ul>
    <br/><br/>
    <!-- Coupon Generation -->
				<div class="row">
					<!-- <div class="col-md-6">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> Generate Coupon</button>
					</div> -->
				
					<div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<form action="save_coupon.php" method="POST">
								<div class="modal-content">
									<div class="modal-body">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Discount</label>
												<input type="number" class="form-control" name="discount" min="10" required="required"/>
											</div>
											<div class="form-group">
												<button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button>
												<br /><br />
												<label>Coupon Code</label>
												<input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
											</div>
										</div>
									</div>
									<div style="clear:both;"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
										<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
									</div>
								</div>
							</form>
						</div>
				</div>
				<!-- Coupon Generation -->
  </section>
  <!-- /.sidebar -->
</aside>