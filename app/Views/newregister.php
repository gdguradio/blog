<?php $session = \Config\Services::session();?>

<!-- Highlights -->
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
			<h2>New Registration Request</h2>
		</header>
		<div>
			<!-- error message start -->
                        
			<?php if( $session->getFlashdata('error') !== NULL && $session->getFlashdata('error') == 'false' && $session->getFlashdata('showError') == 'true' ): ?>
				<div id="div-login-msg" class="success">
					<div id="icon-login-msg" class="glyphicon glyphicon-chevron-ok"></div>
					<span id="text-login-msg">
						<?=$session->getFlashdata('Errormsg');?>
					</span>
				</div>
				<?php elseif( $session->getFlashdata('error') !== NULL && $session->getFlashdata('error') == 'true' && $session->getFlashdata('showError') == 'true' ): ?>
				<div id="div-login-msg" class="error">
					<div id="icon-login-msg" class="glyphicon glyphicon-chevron-remove"></div>
					<span id="text-login-msg">
						<?=$session->getFlashdata('Errormsg');?>
					</span>
				</div>
			<?php else :?>
				<div id="div-login-msg ">
					<div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
					<span id="text-login-msg">
					</span>
				</div>
			<?php endif ?>
			<!-- error message end -->
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
					<?php if(isset($users) && count($users) > 0) :?>
						<?php foreach($users AS $key => $value) :?>
							<tr>
								<td> <?=$value['strFullName']?> </td>
								<td> <?=$value['intAge']?> </td>
								<td> <?=$value['strUserName']?> </td>
								<td> <?=$value['strEmail']?> </td>
								<td><a href="<?= route_to('usersUpdate', 1 ,$value['id']) ?>" style="color:white !important" class="btn btn-success" >Confirm as Admin</a></td>
								<td><a href="<?= route_to('usersUpdate', 2 ,$value['id']) ?>" style="color:white !important" class="btn btn-primary" >Confirm as User</a></td>
								<td><a href="<?= route_to('usersdelete', $value['id']) ?>"style="color:white !important" class="btn btn-danger newregister" data-sys_id="'+ data[i].id +'" data-action="delete">Delete</a></td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>
			<?php if (isset($users) && count($users) > 0) { ?>
				<?= $pager->simpleLinks('users','simplestyled') ?>
			<?php }?>
		</div>
	</div>
</section>