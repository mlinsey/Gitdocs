{include file="header.tpl"}

		<form id="compare_form" action="compare_2col.php" method="post" style="display:none;">
			<input type="hidden" name="d_id" value="{$d_id}" />
			<input type="hidden" name="u_id" value="{$u_id}" />
			<input type="hidden" id="other_u_id" name="other_u_id" value="{$other_u_id}" />
		</form>

<div class="left_main">
	<div class="box" style="width: 600px;">
	<div class="box_title">Comparing -- {$d_name} <a onclick="$('#compare_form').submit();" style="color: red;">==AB TESTING CLICK HERE==</a> <form id="merge_form" action="compare_post.php" method="post"><input type="submit" value="Save"><input type="hidden" name="v_id" value="{$v_id}" />
<input type="hidden" name="other_v_id" value="{$other_v_id}"/></form></div>
	<div class="box_content" style="font-size: 13px; width: 500px;">
	<div id="column_top">your <span class="v_name">{$v_name}</span> and {$other_u_name}'s <span class="v_name">{$other_v_name}</span></div>
	{$diff}
	</div> <!--box content-->
	</div>
</div> <!-- left_main-->

<div class="box right_side">
  <div class="box_title">
	<ul class = "tabs primary" id ="myversions_selected" style="display:none">
		<li class = "active" id="myversions_tab"><span onclick="DisplayMine()"><a class="active">History</a></span></li>
		<li><span onclick="DisplayOthers()"><a>Classmates</a></span></li>
	</ul>
	<ul class="tabs primary" id="othersversions_selected" style="display:block;">
	 <li id="myversions_tab"><span onclick="DisplayMine()"><a>History</span></a></li>
	 <li class="active"><span onclick="DisplayOthers()"><a class="active">Classmates</span></a></li>
	</ul>
	</div><!-- box_title-->
  <div class="box_content" id="myversionspanel" style="display:none;">
  	<table>
			{section name=i loop=$history}	
				<tr><td><div style="float: {$history[i][0]}; padding-left: 6px; padding-right:6px;"><img src="{$history[i][1]}" /> </div><div class="med_text align_{$history[i][0]}">{$history[i][2]}</div></td></tr>
			{/section}
		</table> 
	</div>
	
	<div class="box_content" id="otherversionspanel" style="display:block;">
		<table style="width:100%">
			{section name=i loop=$others}	
			<tr><td id="td_{$smarty.section.i.index}"
					class="selectable {if $smarty.section.i.index == 0}selected{/if}"
					onclick="change_selection({$smarty.section.i.index})">
					<div style="float: left; padding-right:6px;"><img src="{$others[i][0]}" /> </div>
					<div class="med_text"> 
						<span style="float:left">{$others[i][1]}</span>
						<a class="comparable">compare</a>
					</div>
			</td></tr>
			{/section}
		</table>
	<p>these are awkward line breaks, but makes the like|dislike fit nicely one per line</p>	
	</div>
</div>
	<script type="text/javascript">
	{literal}
	//<![CDATA[
		$(document).ready(function(){
			addLikeDislikeLinks('_inline');	
		});
	//]]>
	{/literal}
	</script>

{include file="footer.tpl"}
