{include file="header.tpl"}

<div class="box left_main">
	<form id="doc_title" class="doc_title">
	<div class="box_title">
		<div style="float: left;">Editing -- 
			<input type="text" id="change_d_name" name="change_d_name" value="{$d_name}" /> -- <input type="text" id="change_v_name" name="change_v_name" class="v_name" value="{$v_name}" /></span> -- <span class="u_name">{$displayName}</span> </div>
	</form>
	<form id="compare_form" action="{if $u_id % 2 == 0}compare_2col.php {else}compare_2col.php{/if}" method="post" style="display:none;">
		<input type="hidden" name="d_id" value="{$d_id}" />
		<input type="hidden" name="u_id" value="{$u_id}" />
		<input type="hidden" id="other_u_id" name="other_u_id" value="" />
	</form>
	
	<form id="save_form" class="big_form" action="actions/saveshare.php" method="post" style="float:right;">
		<!-- <input type="hidden" name="action" value="save" /> -->
		<input type="hidden" name="d_id" value="{$d_id}" />
		<input type="hidden" name="u_id" value="{$u_id}" />
		<!--<input type="submit" name="action" value="Save" onclick="updateElement();"/>-->
		<input type="submit" name="action" value="Save and Publish" onclick="updateElement();"/>

	</div><!-- end box_title -->

		<div id="save_status" class="status"></div>
	<div class="clear_fix"></div>

	<div class="box_content">
			<div id="loader"><img src="images/ajax-loader.gif"></div>
			<div>
				<textarea name="editor1" id="editor1">
				{$v_text}
				</textarea>
			</form>
			</div>
	</div> <!--box content-->
</div> <!--box left_main-->

{include file="sidebar.tpl"}

	<script type="text/javascript">
	{literal}
	//<![CDATA[
		CKEDITOR.config.toolbar = [
				// for full toolbar: look at http://docs.cksource.com/CKEditor_3.x/Developers_Guide/Toolbar
				['Cut','Copy','Paste', '-', 'Undo','Redo'],
				['Bold','Italic','Underline'],
				['Font','FontSize'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Maximize']
		];
		CKEDITOR.config.height = 	$(window).height() - 200;
		$(document).ready(function(){
			$("#editor1").ckeditor(hideLoader("loader"));	
			// bind form using 'ajaxForm' 
		    $('#save_form').ajaxForm({ 
		        beforeSubmit:  preSaveVersion,  // pre-submit callback 
		        success:       postSaveVersion  // post-submit callback 
		    });
		});

			//bind document and version names
			$('#change_d_name').mouseenter(function() {
				$('#change_d_name').addClass('highlighted'); 
				}).mouseleave(function() {
					$('#change_d_name').removeClass('highlighted');
				}).click(function() {
					changeDName('#change_d_name', '{/literal}{$d_id}{literal}');
				});
				
			$('#change_v_name').mouseenter(function() {
				$('#change_v_name').addClass('highlighted'); 
				}).mouseleave(function() {
					$('#change_v_name').removeClass('highlighted');
				}).click(function() {
					changeVName('#change_v_name', '{/literal}{$d_id}{literal}','{/literal}{$u_id}{literal}');
				});
				$(".time").prettyDate();
				

	//]]>
	{/literal}
	</script>
{include file="footer.tpl"}
