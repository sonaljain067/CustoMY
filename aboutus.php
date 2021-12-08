<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/banner1.png" alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner2.png" alt="Second slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner3.png" alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		            
	        	
                <div class="col-sm-12">
                    <h1>About Us</h1>
	        		<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias sint atque, impedit earum quisquam dicta, ipsum eveniet inventore saepe deserunt nihil distinctio! Aspernatur ipsam velit qui, optio mollitia architecto corrupti!
                    Expedita eius commodi doloremque repudiandae quibusdam cupiditate dolore laboriosam? Officiis enim omnis dicta molestias blanditiis delectus, cupiditate fuga odit accusamus dolorem minima, architecto consectetur reprehenderit dolore quae suscipit iure incidunt?
                    Neque suscipit quibusdam consectetur repellendus molestias quo? Numquam, possimus magnam. Commodi quis nemo eius quas? Nostrum, dolorem. Est asperiores, libero laboriosam a quaerat aperiam rem id quia illo et hic?
                    Facere molestias doloremque architecto fugit reiciendis asperiores perferendis soluta corrupti nisi deserunt numquam unde nam delectus sunt expedita velit ut, eum placeat pariatur magni molestiae corporis facilis explicabo quidem. Sequi.
                    Dolorem ex odit, doloribus, quo ab veritatis temporibus tenetur ea ipsum repellendus at a modi, autem illum. Unde veniam consequatur veritatis vero ratione! Doloribus suscipit similique quisquam vitae veniam ipsum.
                    </p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias sint atque, impedit earum quisquam dicta, ipsum eveniet inventore saepe deserunt nihil distinctio! Aspernatur ipsam velit qui, optio mollitia architecto corrupti!
                    Expedita eius commodi doloremque repudiandae quibusdam cupiditate dolore laboriosam? Officiis enim omnis dicta molestias blanditiis delectus, cupiditate fuga odit accusamus dolorem minima, architecto consectetur reprehenderit dolore quae suscipit iure incidunt?
                    Neque suscipit quibusdam consectetur repellendus molestias quo? Numquam, possimus magnam. Commodi quis nemo eius quas? Nostrum, dolorem. Est asperiores, libero laboriosam a quaerat aperiam rem id quia illo et hic?
                    Facere molestias doloremque architecto fugit reiciendis asperiores perferendis soluta corrupti nisi deserunt numquam unde nam delectus sunt expedita velit ut, eum placeat pariatur magni molestiae corporis facilis explicabo quidem. Sequi.
                    </p>
	        	</div>
                <br/><br/>
                <div class="col-sm-12">
	        		<div class="row">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b>Become a Subscriber</b></h3>
                            </div>
                            <div class="box-body">
                                <p>Get free updates on the latest products and discounts, straight to your inbox.</p>
                                <form method="POST" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat"><i class="fa fa-envelope"></i> </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class='box box-solid'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'><b>Follow us on Social Media</b></h3>
                            </div>
                            <div class='box-body'>
                                <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                                <a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
                                <a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>