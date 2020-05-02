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
			<h2>Post List</h2>
		</header>
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
			</tfoot>
		</table>
		<?php if (isset($post) && count($post) > 0) { ?>
			<?= $pager->simpleLinks('post','simplestyled') ?>
		<?php }?>
		</div>
	</div>
</section>