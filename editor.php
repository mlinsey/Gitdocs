<? include('header.php'); ?>

<div class="box left_main">
        <div class="box_title">Editing "Twilight Fanfic:Edward and Jacob!! Version:forest2 (by mlinsey)</div>
        <div class="box_content">
		<div id="loader"><img src="images/ajax-loader.gif"></div>
		<div>
	<form method="post">
		<p>
			<textarea name="editor1" id="editor1">
				<p>“Coming out with us Masen?”</p>

				<p>“No thanks,” Edward replied, barely taking a glimpse at Newton<span class="your_changes" id="text_change1">, who was standing way too close to him for his liking</span>.</p>

				<p>“Two nights in a row? This aint like you.”</p>

				<p>Shaking his head, Edward rolled his eyes at the Cubs’ first baseman and then turned to finish towel-drying his hair. He’d spend tonight just as he had spent last night; lying in his hotel room, reading one of the books Bella let him borrow. And he planned to call Bella first because he wanted to hear her voice, even though she’d most likely pick on him again for losing another game – their fourth straight.</p>

				<p>Last night, when he’d called her, she was hanging out with her friends and she started going over every mistake he had made on the field. It honestly didn’t bother him at first because it was Bella and he had started to just accept her as the fan that she was. She was actually quite cute as she discussed baseball with him – it was the first time she had openly spoke about it so passionately – probably because she had been drinking. It was when Emmett grabbed the phone from her and started giving him a pep talk that he decided to end the call.</p>

				<p>It still bothered Edward that Bella hung out with her ex-boyfriend, but he didn’t understand why exactly. He knew it was an irrational feeling, as they were obviously just friends, yet it still upset him. Emmett had been her first in everything, she had told him, and Edward would never be with her in that way. Maybe that was why it upset him so much – he’d never be as close to her as Emmett was because they shared a special bond. Besides, on top of that, it was plain to Edward that she didn’t look at him as he looked at her.</p>

				<p>When he took care of her while she was sick, it had been as if she were trying to get rid of him. Most people – girls – he knew loved being taken care of by their men. Edward thought of the time Esme boasted to him about how Carlisle cared for her when she had the flu. You would think Carlisle could walk on water the way she spoke of him. But Bella didn’t want him caring for her. Bella didn’t want him at her townhome – it was painfully obvious. It didn’t deter him though because she was his friend.</p>

				<p>Keep telling yourself that, Masen! His inner monologue argued.</p>

				<p>“I heard you’re going out with Newton,” Jazz said, startling Edward as he put on his deodorant.</p>

				<p>“No, I’m heading back. You?”</p>
			</textarea>
		</p>
		<p>
		<!--	<input type="submit" /> -->
		</p>
	</form>
	</div>
	</div> <!--box content-->
</div> <!--box left_main-->
<div class="box right_side">
        <div class="box_title">
	<ul class = "tabs primary" id ="myversions_selected">
		<li class = "active" id="myversions_tab"><span onclick="DisplayMine()"><a class="active">My Versions</a></span></li>
		<li><span onclick="DisplayOthers()">Others' Versions</span></li>
	</ul>
	<ul class="tabs primary" id="othersversions_selected" style="display:none;">
	 <li id="myversions_tab"><span onclick="DisplayMine()">My Versions</span></li>
  <li class="active"><span onclick="DisplayOthers()"><a class="active">Others' Versions</span></a></li>
	</ul>

	</div><!-- box_title-->
        <div class="box_content" id="myversionspanel" style="display:block;">
       <table class="table_document">
<tr><td><div style="float: left;"><img src="images/mlinsey.jpg" /> </div>forest2<i> editing now</i><br />by mlinsey 5m ago</td></tr>
<tr><td><div style="float: left;"><img src="images/dtran.jpg" /> </div>forest<br />saved by dtran 1d ago, branched 5m ago</td></tr>
</table> 
	</div>
	<diff class="box_content" id="otherversionspanel" style="display:none;">
	<table class="table_document">
<tr><td><div style="float: left;"><img src="images/mlee.jpg" /> </div><a href="compare.php">new desc. of Edward</a><br />by mlee 8h ago</td></tr>
<tr><td><div style="float: left;"><img src="images/dtran.jpg" /> </div>forest<br />by dtran 1d ago</td></tr>
	<tr><td><div style="float: left;"><img src="images/bella8.jpg" /> </div>forest<br />by bella8 2d ago</td></tr>

	</div>
	
	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function(){
			$("#editor1").ckeditor(hideLoader("loader"));
		});
	//]]>
	</script>
<? include('footer.php'); ?>
