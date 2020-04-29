<!-- Highlights -->

<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/dataTables.bootstrap4.min.css'); ?>" />




<header class="masthead" style="background-image: url('<?php echo base_url('assets/img/menubar.png'); ?>');height:50px !important;">
    <div class="overlay"></div>
    <!-- <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
        </div>
        </div>
    </div> -->
</header>
<section class="wrapper">
	<div class="inner">
		<header class="special">
			<h2>Post List</h2>
		</header>
		<div>
		<table id="postlisttable" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Header</th>
					<th>Date</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
				
			<tbody>
				<?php if(isset($post) && count($post) > 0) :?>
					<?php foreach($post AS $key => $value) :?>
						<tr>
							<td><?=$value['bannerHeader']?></td>
							<td><?=$value['dteCreatedDate']?></td>
							<td><a href="<?= route_to('updatePost', $value['id']) ?>" style="color:white !important" class="btn btn-primary postlist">Update</a></td>
							<!-- <td><a href="<?= route_to('deletepost', $value['id']) ?>" style="color:white !important" class="btn btn-danger postlist">Delete</a></td> -->
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
			<tfoot>
				<?php if (isset($post) && count($post) > 0) { ?>
					<?= $pager->simpleLinks('post','simplestyled') ?>
				<?php }?>

			</tfoot>
		</table>
		</div>
	</div>
</section>
<!-- <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script> -->
<!-- <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script> -->
<script>
	$(document).ready(function() {
		// postlist();
		// $('#postlisttable').DataTable();
		$("#postlisttable").on('click','button.postlist',postlistaction);


		function postlistaction(){
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
				var id = $this.attr('data-sys_id')
				var formData = new FormData();
				formData.append('id',id);
				$.ajax({
					type:'POST',
					url: $siteurl + '/Post/updatepost' ,
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
		function postlist(){
			var $siteurl = site_url;
			$.fn.dataTable.ext.errMode = 'none'; 

			console.log('asd')
			$('#postlisttable').DataTable( {
				destroy: true,
				"ajax": {
					"url": $siteurl + '/Post/getAllPost',
					"type":"POST",
					"dataSrc":function(data){
						console.log(data)
						for(var i = 0; i < data.length; i++)
						{
							// <a href="<?= route_to('App\Controllers\Galleries::showUserGallery', 15, 12) ?>">View Gallery</a>

							// data[i]["delete"] = '<a  href="<?=site_url('Register/deleteuser/')?>'+ data[i].id +'"class="btn btn-danger btn-lg delete" data-sys_id="'+ data[i].id +'"  >Delete</a>';
							// data[i]["admin"] = '<a  href="<?=site_url('Register/updaterole/1/')?>'+ data[i].id +'" class="btn btn-info btn-lg confirm" data-sys_id="'+ data[i].id +'" >Confirm as Admin</a>';
							// data[i]["confirm"] = '<a href="<?= route_to('updatepost', 15) ?>">View Gallery</a> class="btn btn-primary btn-lg confirm" data-sys_id="'+ data[i].id +'">Confirm as User</a>';
							data[i]["delete"] = '<button style="color:white !important" class="btn btn-danger postlist" data-sys_id="'+ data[i].id +'" data-action="delete">Delete</button>';
							data[i]["confirm"] = '<a href="<?= route_to('updatepost', 15) ?>/'+ data[i].id +'" style="color:white !important" class="btn btn-primary postlist" data-sys_id="'+ data[i].id +'" data-action="confirm">Update</a>';
							// data[i]["confirm"] = '<a href="<?=site_url('/post')?>/'+ data[i].id +'" style="color:white !important" class="btn btn-primary postlist" data-sys_id="'+ data[i].id +'" data-action="confirm">Update</a>';

							// data[i]["confirm"] = '<button style="color:white !important" class="btn btn-info postlist" data-sys_id="'+ data[i].id +'" data-action="confirm">Update</button>';
						}
						return data;
					} 
				},
				"columns": [
					{ "data": "bannerHeader" },
					{ "data": "dteCreatedDate" },
					{ "data": "confirm"},
					{ "data": "delete"}
				]
			});
		}
		
	} );
</script>