<table></table>

<script>
$(function() {

	var $button = $('#insert');

	$button.on('click' , function() {
		$.ajax({ 
			type : 'post',
			url : '<?php echo base_url();?>index.php/ajax/get_products_list_template' ,
			success: function( htmls) {
				$('#x').append( htmls);
			}
		});
	});

});
</script>

<div id="x"></div>

<div class="row-fluid">
	<div class="box span7">
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							<legend>创建一个模板</legend>
							<div class="control-group">
							  <label class="control-label" for="typeahead">模板标题</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"></p>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">在邮件中插入模板</label>
							  <div class="controls">
								<select name="info">
									<option>课程信息</option>
								</select> <button class="btn btn-primary" id="insert" type="button">插入</button>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="textarea2">内容</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">预览</button>
							  <button type="reset" class="btn">创建</button>
							</div>
						  
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

				<div class="box span5"></div>
	</div>
<div class="row-fluid">
				<div class="box span12">
					<div class="box-content">
					<fieldset>
						<legend>预览</legend>
						<div class="box-content">

							
							<div id="header"><?php include FCPATH . 'data/mail/header.html';?></div>

								Hello world
							<div id="footer"><?php include FCPATH . 'data/mail/footer.html';?></div>
						

						</div>
					</fieldset>
					</div>
				</div>
			</div><!--/row-->
