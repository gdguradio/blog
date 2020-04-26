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
		<div>
		<!-- Begin # DIV Form -->
		<div id="div-forms" class="">
			<!-- Begin | Register Form -->
			<form id="newpost-form" >
				<div class="modal-body">
					<div id="div-newpost-msg">
						<div id="icon-newpost-msg" class="glyphicon glyphicon-chevron-right"></div>
						<span id="text-newpost-msg">New Post.</span>
					</div>
					<input id="bannerHeader" value="<?php if(isset($bannerHeader)){echo $bannerHeader;}?>" class="form-control" type="text" placeholder="Banner Header" required>
					<input id="bannerSubHeader" value="<?php if(isset($bannerSubHeader)){echo $bannerSubHeader;}?>"class="form-control" type="text" placeholder="Banner Sub Header" required>
					<input id="bodyFrstHeading" value="<?php if(isset($bodyFrstHeading)){echo $bodyFrstHeading;}?>"class="form-control" type="text" placeholder="First Heading" required>
					<input id="bodyFrstBlockQuote" value="<?php if(isset($bodyFrstBlockQuote)){echo $bodyFrstBlockQuote;}?>"class="form-control" type="text" placeholder="First Block Quote" required>
					<input id="bodyScndHeading" value="<?php if(isset($bodyScndHeading)){echo $bodyScndHeading;}?>"class="form-control" type="text" placeholder="Second Heading" required>
					<input id="bodyImgCaption" value="<?php if(isset($bodyImgCaption)){echo $bodyImgCaption;}?>"class="form-control" type="text" placeholder="Body Image Caption" required>

					<label>First Paragraph</label>
					<textarea name="bodyFrstPara" value="<?php if(isset($bodyFrstPara)){echo $bodyFrstPara;}?>"id="bodyFrstPara" class="paragraph" rows="10" cols="80" placeholder="First Paragraph">
					</textarea>
					<label>Second Paragraph</label>
					<textarea name="bodyScndPara" value="<?php if(isset($bodyScndPara)){echo $bodyScndPara;}?>"id="bodyScndPara" class="paragraph" rows="10" cols="80" placeholder="Second Paragraph">
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
						<?php if (isset($postid)) {?>
							<button type="button" data-id="<?=$postid?>" data-action="update"class="btn btn-primary btn-lg btn-block confirm">Confirm</button>
						<?php } else {?>
							<button type="button" data-action="new"class="btn btn-primary btn-lg btn-block confirm">Confirm</button>
						<?php }?>
					</div>
				</div>
			</form>
			<!-- End | Register Form -->
			
		</div>
		<!-- End # DIV Form -->
		</div>
	</div>
</section>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
<script>
	$(document).ready(function() {

		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'bodyFrstPara' );
		CKEDITOR.replace( 'bodyScndPara' );
		var $msgAnimateTime = 150;
		var $msgShowTime = 5000;
			
		$(".confirm").click(function (e) {
			e.preventDefault();
			var $this = $(this)
			var bodyFrstPara = CKEDITOR.instances['bodyFrstPara'].getData().replace(/[\"&<>]/g, function (a) {
				return { '"': '&quot;', '&': '&amp;', '<': '&lt;', '>': '&gt;' }[a];
			});
			var bodyScndPara = CKEDITOR.instances['bodyScndPara'].getData().replace(/[\"&<>]/g, function (a) {
				return { '"': '&quot;', '&': '&amp;', '<': '&lt;', '>': '&gt;' }[a];
			});
			var $siteurl = site_url;
			var bannerHeader = $("input#bannerHeader").val()
			var bannerSubHeader = $("input#bannerSubHeader").val()
			var bodyFrstHeading = $("input#bodyFrstHeading").val()
			var bodyFrstBlockQuote = $("input#bodyFrstBlockQuote").val()
			var bodyScndHeading = $("input#bodyScndHeading").val()
			var bodyImgCaption = $("input#bodyImgCaption").val()
			var bodyFrstPara = CKEDITOR.instances['bodyFrstPara'].getData();//bodyFrstPara;//$("#bodyFrstPara").val()
			var bodyScndPara = CKEDITOR.instances['bodyScndPara'].getData();//bodyScndPara;//$("#bodyScndPara").val()
			var bannerimage = $('#bannerimage')[0].files[0];
			var bodyimage = $('#bodyimage')[0].files[0];
			var action = $this.attr('data-action');

			var formData = new FormData();
			formData.append('bannerHeader',bannerHeader);
			formData.append('bannerSubHeader',bannerSubHeader);
			formData.append('bodyFrstHeading',bodyFrstHeading);
			formData.append('bodyFrstBlockQuote',bodyFrstBlockQuote);
			formData.append('bannerSubHeader',bannerSubHeader);
			formData.append('bodyScndHeading',bodyScndHeading);
			formData.append('bodyImgCaption',bodyImgCaption);
			formData.append('bodyFrstPara',bodyFrstPara);
			formData.append('bodyScndPara',bodyScndPara);
			formData.append('bannerHeader',bannerHeader);
			formData.append('bannerimage',bannerimage);
			formData.append('bodyimage',bodyimage);

			switch(action) {
				case "new":
					$.ajax({
						type:'POST',
						url: $siteurl + '/Post/newpost' ,
						dataType:"json",
						data:formData,
						async: true,
						cache: false,
						contentType: false,
						enctype: 'multipart/form-data',
						processData: false,
						success:function(data)
						{
							$('html, body').animate({
								scrollTop: $("#div-newpost-msg").offset().top
							}, 1000);
							if(data.errstatus == 'true'){
								
								msgChange($('#div-newpost-msg'), $('#icon-newpost-msg'), $('#text-newpost-msg'), "error", "glyphicon-remove", data.msg);
							}else{
								msgChange($('#div-newpost-msg'), $('#icon-newpost-msg'), $('#text-newpost-msg'), "error", "glyphicon-remove", data.msg);
								
							}   
						}
					});
					
					return false;
					break;
				case "update":
					formData.append('id',$this.attr('data-id'));
					$.ajax({
						type:'POST',
						url: $siteurl + '/Post/editpost' ,
						dataType:"json",
						data:formData,
						async: true,
						cache: false,
						contentType: false,
						enctype: 'multipart/form-data',
						processData: false,
						success:function(data)
						{
							$('html, body').animate({
								scrollTop: $("#div-newpost-msg").offset().top
							}, 1000);
							if(data.errstatus == 'true'){
								msgChange($('#div-newpost-msg'), $('#icon-newpost-msg'), $('#text-newpost-msg'), "error", "glyphicon-remove", data.msg);
							}else{
								msgChange($('#div-newpost-msg'), $('#icon-newpost-msg'), $('#text-newpost-msg'), "error", "glyphicon-remove", data.msg);
								
							}   
						}
					});
					return false;
					break;
				default:
					return false;
        	}	
			
		});
		function msgFade ($msgId, $msgText) {
			$msgId.fadeOut($msgAnimateTime, function() {
				$(this).html($msgText).fadeIn($msgAnimateTime);
			});
		}
		
		function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
			var $msgOld = $divTag.text();
			msgFade($textTag, $msgText);
			$divTag.addClass($divClass);
			$iconTag.removeClass("glyphicon-chevron-right");
			$iconTag.addClass($iconClass + " " + $divClass);
			setTimeout(function() {
				msgFade($textTag, $msgOld);
				$divTag.removeClass($divClass);
				$iconTag.addClass("glyphicon-chevron-right");
				$iconTag.removeClass($iconClass + " " + $divClass);
			}, $msgShowTime);
		}
	} );
</script>