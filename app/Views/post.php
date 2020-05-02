<?php $session = \Config\Services::session();?>
<!-- Highlights -->
<script src="<?php echo base_url('assets/ckeditor4/ckeditor.js'); ?>"></script>


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
			<h2>Create Post</h2>
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
		<!-- Begin # DIV Form -->
			<div id="div-forms" class="">
				<!-- Begin | Register Form -->
				<!-- <form id="newpost-form" > -->
				<?php if (isset($postid)) {?>
					<form id="newpost-form" method="POST" enctype="multipart/form-data" action="<?=route_to('updateEdit',$postid) ?>" >
				<?php } else {?>
					<form id="newpost-form" method="POST" enctype="multipart/form-data" action="<?=route_to('postStore') ?>" >
				<?php }?>

					<div class="modal-body">
						<input name="bannerHeader" value="<?php if(isset($bannerHeader)){echo $bannerHeader;}?>" class="form-control" type="text" placeholder="Banner Header" required>
						<input name="bannerSubHeader" value="<?php if(isset($bannerSubHeader)){echo $bannerSubHeader;}?>"class="form-control" type="text" placeholder="Banner Sub Header" required>
						<input name="bodyFrstHeading" value="<?php if(isset($bodyFrstHeading)){echo $bodyFrstHeading;}?>"class="form-control" type="text" placeholder="First Heading" required>
						<input name="bodyFrstBlockQuote" value="<?php if(isset($bodyFrstBlockQuote)){echo $bodyFrstBlockQuote;}?>"class="form-control" type="text" placeholder="First Block Quote" required>
						<input name="bodyScndHeading" value="<?php if(isset($bodyScndHeading)){echo $bodyScndHeading;}?>"class="form-control" type="text" placeholder="Second Heading" required>
						<input name="bodyImgCaption" value="<?php if(isset($bodyImgCaption)){echo $bodyImgCaption;}?>"class="form-control" type="text" placeholder="Body Image Caption" required>

						<label>First Paragraph</label>
						<textarea name="bodyFrstPara" id="bodyFrstPara" class="paragraph" rows="10" cols="80" placeholder="First Paragraph">
							<?php if(isset($bodyFrstPara)){echo $bodyFrstPara;}?>
						</textarea>
						<label>Second Paragraph</label>
						<textarea name="bodyScndPara" id="bodyScndPara" class="paragraph" rows="10" cols="80" placeholder="Second Paragraph">
							<?php if(isset($bodyScndPara)){echo $bodyScndPara;}?>	
						</textarea>
						<div class="form-group">
							<label for="bannerimage">Banner Image:</label>
							<input type="file" name="bannerimage" class="form-control"  id="bannerimage">
						</div>
						<div class="form-group">
							<label for="bodyimage">Body Image:</label>
							<input type="file" name="bodyimage" class="form-control"  id="bodyimage">
						</div>
					</div>
					<div class="modal-footer">
						<div>
							<button type="submit" data-action="new"class="btn btn-primary btn-lg btn-block confirm">Confirm</button>
						</div>
					</div>
				</form>
				<!-- End | Register Form -->
				
			</div>
		<!-- End # DIV Form -->
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {

		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'bodyFrstPara' );
		CKEDITOR.replace( 'bodyScndPara' );
	} );
</script>