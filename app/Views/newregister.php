<!-- Highlights -->

<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/dataTables.bootstrap4.min.css'); ?>" />




<header class="masthead" style="background-image: url('<?php echo base_url('assets/img/menubar.png'); ?>');height:50px !important;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
        </div>
        </div>
    </div>
</header>
<section class="wrapper">
	<div class="inner">
		<header class="special">
			<h2>New Registration Request</h2>
		</header>
		<div>
		<table id="newrequesttable" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Full Name</th>
					<th>Age</th>
					<th>Username</th>
					<th>Email</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
			<tfoot>
			</tfoot>
		</table>
		</div>
	</div>
</section>
<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="confirmacc-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header" align="center">
			<img class="img-circle" id="img_logo" src="<?php echo base_url('assets/img/logo.jpg'); ?>">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			</button>
		</div>
		
		<!-- Begin # DIV Form -->
		<div id="div-forms" class="">
			<!-- Begin | Register Form -->
			<form id="confirmacc-form" >
				<div class="modal-body">
					<div id="div-confirmacc-msg">
						<div id="icon-confirmacc-msg" class="glyphicon glyphicon-chevron-right"></div>
						<span id="text-confirmacc-msg">Confirm account.</span>
					</div>
					<input id="confirmacc_fullname" class="form-control" type="text" placeholder="Full Name" required>
					<input id="confirmacc_age" class="form-control" type="text" placeholder="Age" required>
					<input id="confirmacc_username" class="form-control" type="text" placeholder="Username" required>
					<input id="confirmacc_email" class="form-control" type="text" placeholder="E-Mail" required>
					<input class="form-check-input" type="radio" name="strRoleName" id="roleAdmin" value="Admin">
					<label class="form-check-label" for="roleAdmin">Admin</label>
					<input class="form-check-input" type="radio" name="strRoleName" id="roleUser" value="User" checked>
					<label class="form-check-label" for="roleUser">User</label>
					<br>
					<input class="form-check-input" type="radio" name="bitActiveFlag" id="activate" value="1">
					<label class="form-check-label" for="activate">Activate</label>
					<input class="form-check-input" type="radio" name="bitActiveFlag" id="deactivate" value="0" checked>
					<label class="form-check-label" for="deactivate">Deactivate</label>
					<br>
					<input class="form-check-input" type="radio" name="bitDeleteFlag" id="deleteaccount" value="1">
					<label class="form-check-label" for="deleteaccount">Delete Account</label>
				</div>
				<div class="modal-footer">
					<div>
						<button type="submit" class="btn btn-primary btn-lg btn-block">Confirm</button>
					</div>
					<div>
						<button id="confirmacc_login_btn" type="button" class="btn btn-link">Log In</button>
						<button id="confirmacc_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
					</div>
				</div>
			</form>
			<!-- End | Register Form -->
			
		</div>
		<!-- End # DIV Form -->
		
	</div>
</div>
</div>
<!-- END # MODAL LOGIN -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
<script>
	$(document).ready(function() {
		newRequest();
		// $('#newrequesttable').DataTable();
		$("#newrequesttable").on('click','button.newregister',NewRequest);


		function NewRequest(){
			var $this = $(this)
			var $siteurl = site_url;

			var action = $this.attr('data-action');

			switch(action) {
			case "delete":
			
				var userID = $this.attr('data-sys_id')
				var formData = new FormData();
				formData.append('user_id',userID);
				$.ajax({
					type:'POST',
					url: $siteurl + '/Register/deleteuser' ,
					dataType:"json",
					data:formData,
					async: true,
					cache: false,
					contentType: false,
					enctype: 'multipart/form-data',
					processData: false,
					success:function(data)
					{
						if(data.errstatus == 'true'){
							// msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", data.msg);
						}else{
							$this.closest('tr').remove();
							
						}   
					}
				});
                return false;
                break;
            case "confirm":
				var userID = $this.attr('data-sys_id')
				var roleID = $this.attr('data-role_id')
				var formData = new FormData();
				formData.append('user_id',userID);
				formData.append('role_id',roleID);
				$.ajax({
					type:'POST',
					url: $siteurl + '/Register/updaterole' ,
					dataType:"json",
					data:formData,
					async: true,
					cache: false,
					contentType: false,
					enctype: 'multipart/form-data',
					processData: false,
					success:function(data)
					{
						if(data.errstatus == 'true'){
							// msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", data.msg);
						}else{
							$this.closest('tr').remove();
							
						}   
					}
				});
                return false;
                break;
            default:
                return false;
        }


		}
		function newRequest(){
			var $siteurl = site_url;
			$.fn.dataTable.ext.errMode = 'none'; 
			$('#newrequesttable').DataTable( {
				destroy: true,
				"ajax": {
					"url": $siteurl + '/Register/getAllRequest',
					"type":"POST",
					"dataSrc":function(data){
						console.log(data)
						for(var i = 0; i < data.length; i++)
						{
							// data[i]["delete"] = '<a  href="<?=site_url('Register/deleteuser/')?>'+ data[i].id +'"class="btn btn-danger btn-lg delete" data-sys_id="'+ data[i].id +'"  >Delete</a>';
							// data[i]["admin"] = '<a  href="<?=site_url('Register/updaterole/1/')?>'+ data[i].id +'" class="btn btn-info btn-lg confirm" data-role_id="1"data-sys_id="'+ data[i].id +'" >Confirm as Admin</a>';
							// data[i]["user"] = '<a  href="<?=site_url('Register/updaterole/2/')?>'+ data[i].id +'"  class="btn btn-primary btn-lg confirm" data-role_id="1"data-sys_id="'+ data[i].id +'">Confirm as User</a>';
							data[i]["delete"] = '<button style="color:white !important" class="btn btn-danger newregister" data-sys_id="'+ data[i].id +'" data-action="delete">Delete</button>';
							data[i]["admin"] = '<button style="color:white !important" class="btn btn-info newregister" data-sys_id="'+ data[i].id +'" data-role_id="1" data-action="confirm">Confirm as Admin</button>';
							data[i]["user"] = '<button style="color:white !important" class="btn btn-primary newregister" data-sys_id="'+ data[i].id +'" data-role_id="2" data-action="confirm">Confirm as User</button>';
						}
						return data;
					} 
				},
				"columns": [
					{ "data": "strFullName" },
					{ "data": "intAge" },
					{ "data": "strUserName" },
					{ "data": "strEmail" },
					{ "data": "admin"},
					{ "data": "user"},
					{ "data": "delete"}
				]
			});
		}
		
	} );
</script>