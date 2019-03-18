<?php require_once 'inc/header.php'; ?>
<?php require_once 'php_files/config.php'; ?>
<!--Form Area Start -->
<div class="container sm-container" id="input_view">
    <div class="form_content">
        <form action="php_files/insert.php" method="post" role="form" id="contactForm"   enctype="multipart/form-data">
            <div class="row">
                 <div class="col-md-12">
                    <div class="top-area">
                         <h2>Multistep Registration Form Wizard - Responsive Multistep form wizard</h2>
                          <p>Multistep Registration Form Wizard is a Multistep Responsive form wizard. It's Bootstrap based PHP form with full Ajax support. It can be easily customized as it is well documented and developed using latest web technologies. This form will be a perfect choice for all registration based websites.</p>
                      </div>
                 </div>
            </div>
            
            <div class="main-form-area" style="background: #fff;"> 
                <ul id="progressbar">
                  <li class="indicator active"><span></span><p>Account Setup</p></li>
                  <li class="indicator "><span></span><p>Personal Details</p></li>
                  <li class="indicator "><span></span><p>Account Details</p></li>
                </ul>
              <!-- Form First Step Start -->
              <div class="tab">
                  
                  <div class="single_top_user_section">
                    <div class="single_top_user">
                      <div class="image_area">
                          <div class="user_image">
                              <img src="assets/images/male.svg" alt="" class="img_sex">
                          </div>
                      </div>
                      <div class="user_details_area">
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <select name="gender" id="input_sex" class="form-control">
                                <option value="1">Mr.</option>
                                <option value="2">Ms.</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                             <input type="text" name="first_name" class="form-control" placeholder="First Name *" required="">
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                             <input type="text" name="last_name" class="form-control" placeholder="Last Name *" required="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
              <!-- Form First Step End -->
              
              <!-- Form Second Step Start -->
              <div class="tab">
                <div class="single_top_user_section">
                  <div class="single_top_user">
                      <div class="image_area">
                          <div class="user_image">
                              <img src="" alt="" class="img_sex">
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="email"><i class="fa fa-envelope-o" ></i>Email <span class="error">*</span></label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="phone"><i class="fa fa-phone" ></i>Phone <span class="error">*</span></label>
                              <input type="tel" name="phone" class="form-control" id="phone" pattern="^[0-9+\(\)#\.\s\/ext-]+$" placeholder="Enter Phone No" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                             <label for="address"><i class="fa fa-address-card-o" ></i>Address</label>
                            <textarea name="address" id="address" class="form-control" cols="5" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div><!-- tab -->
              <!-- Form Second Step Start -->
              
              <!-- Form Third Step Start -->
              <div class="tab">
                <div class="single_top_user_section">
                  <div class="single_top_user">
                      <div class="image_area">
                          <div class="user_image up_user_img">
                              <label class="p_image">
                                <div class="p_img_text">
                                  <p class="fz-20">+</p>
                                  <p >Upload Your Image</p>
                                </div>
                                <img src="" alt="" id="up_img" class="img_sex">
                                <input type="file" id="image" class="imgInp" name="image" style="display: none;"> 
                              </label>
                              <input type="hidden" name="uploaded_image" id="uploaded_img" value=""  >
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                            <label for="">Loan Type <span class="error">*</span></label>
                            <select name="loan_type" id="" class="form-control" required="">
                              <option value="">Select Loan Type</option>
                              <option value="1">Home Loan</option>
                              <option value="2">Auto Loan</option>
                              <option value="3">Educational Loan</option>
                              <option value="4">Educational Loan</option>
                              <option value="5">Business Loan</option>
                              <option value="6">Personal Loan</option>
                            </select>
                          </div>
                        </div> 
                        <div class="col-md-6">
                           <div class="form-group">
                            <label for="">Amount <span class="error">*</span></label>
                              <input type="number" name="amount" class="form-control" placeholder="Amount of loan you need" required="">
                          </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                                <label for="message">Anything else to share?</label>
                                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Message (eg. State, Reason)"></textarea>
                          </div>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
             <!-- Form Third Step End -->
              <input type="hidden" id="csrf_token" value="<?= isset($_SESSION['token'])?$_SESSION['token']:'';?>">
            <!-- Buttons Start -->
              <div class="button-area">
                  <button type="button" id="prevBtn" onclick="nextPrev(-1)"> <i class="fa fa-angle-double-left"></i>Previous</button>

                  <button type="button" id="nextBtn" class="nextbtn btn-success" onclick="nextPrev(1)">Next <i class="fa fa-angle-double-right"></i></button>

                  <button type="button" class="btn-danger" id="form-submit">Submit</button>
              </div>
            <!-- Buttons End -->
            
              <div class="clearfix"></div>

              <!-- Circles which indicates the steps of the form: -->
              <div class="form-step-button">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
              </div>
              
              <div id="msgSubmit" class="h3 text-center"></div>
              	<a href="javascript:;" class="btn btn-success load custom_btn"><i class="fa fa-list"></i> User List</a>
            </div>
        </form>
    </div>
</div>

<div class="container sm-container" id="load_view" style="display: none;">
	<div class="form_content">
		<div class="info_header">
			<h3>User Information</h3>
		</div>
		<div class="info_view">
      <div class="table-responsive">
  			<table class="table table-bordered table-striped">
  				<thead>
  					<tr>
              <th>Sl</th>
  						<th>Image</th>
              <th>Name</th>
  						<th>Gender</th>
  						<th>Email</th>
  						<th>Address</th>
  						<!-- <th>Loan Type</th> -->
  					</tr>
  				</thead>
  				<tbody id="view_data">
            <!-- user list display here from controller -->
  				</tbody>
  			</table>
      </div>
		</div>

		<div class="footer_btn">
			<a href="javascript:;" class="btn btn-success add_new_btn custom_btn" style="display: none;"><i class="fa fa-plus"></i> Add New</a>
		</div>
	</div>
</div>
<!-- Form Area End-->

<?php require_once 'inc/footer.php'; ?>