<div class='baidutrs'>
	<form method="post" action="" class="forms">
	<div class='btn-append'>
		<textarea rows="3" name='trstext' class='width-10' placeholder='Translate to Chinese...'></textarea>
		<label><span class='trs'>
			<button name='trs' type='primary' class='botn'>Translate</button>
		</span></label>
	</div>
	</form>
</div>
	<?php
		if(isset($_POST['trs'])){
			$trsweb=$baidutrs.$_POST['trstext'];
			echo "<script language=\"javascript\">window.open ('$trsweb', 'Translating', 'height=800, width=1200, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes,location=yes, status=yes')</script>";
		}
	?>