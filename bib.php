<div class='bib'>
	<form action='index.php' method='post'>
		<fieldset class='bibfield'>
			<legend>Bibliography Info</legend>
			<row><column cols="8"><label>Website<span class='req'>*</span></label>
				<input type="url" name='web' size=54 required></column></row>
			<row><column cols="8"><label>Title<span class='req'>*</span></label>
				<input type="text" name='tit' size=54 required></column></row>
			<row><column cols="4"><label>First Name</label>
				<input type="text" name='fname' size=10></column>
			<column cols="4"><label>Last/Org Name<span class='req'>*</span></label>
				<input type="text" name='lname' size=10 required></column>
			<column cols="4"><label>Year</label>
				<input type="text" name='year' size=10 maxlength=4></column></row>
			<button name='make' type="submit" class='right'>Make Bibliography</button>
			<button name='add' type="submit" class='right'>Add a Bibliography</button>
		</fieldset>
		<input type="hidden" name='cur' value="123">
	</form>
</div>
<script type="text/javascript">     
	function copy(){         
		var content=document.getElementById("contents");         
			content.select();          
			document.execCommand("Copy");
			alert("	Copy OK");
	}
</script> 
	<?php
		class check {
			public function checkem($str) {
				if(!empty($_POST[$str])){
					$$str = $_POST[$str];
					return strtolower(preg_replace("/\s/","",(string)$$str));
				}
			}
			public function checktit($str) {
				if(!empty($_POST[$str])){
					$$str = strtolower(trim((string)$_POST[$str]));
					$tit0= explode(' ',$$str);
					for ($i=0;$i<count($tit0);$i++){
						$tit0[$i][0]=strtoupper($tit0[$i][0]);
					}
					return implode(' ',$tit0);
				}
			}
		}
		$ob= new check();
		$web= $ob->checkem('web');
		$tit= $ob->checktit('tit').'.';
		$fname= strtoupper(substr($ob->checkem('fname'),0,1)).'.';
		$lname_raw= $ob->checkem('lname');
		$lname= strtoupper($lname_raw[0]).substr($lname_raw,1).',';
		$year_raw= (int)$ob->checkem('year');
		$year= '('.$year_raw.').';
		$date= date('d/m/Y');
		$bibinfo=array($lname,$fname,$year,$tit,'[Online]. Available from:',$web,'[Accessed:'.$date.']');
		if (empty($ob->checkem('fname'))) {
			$lname[strlen($lname)-1]='.';
			$bibinfo[0]=strtoupper($lname);
			unset($bibinfo[1]);
		}
		if (empty($ob->checkem('year')) || $year_raw<1000 || $year_raw>date('Y') ) {
			$bibinfo[2]='(-).';
		}
		$bibres= implode(' ',$bibinfo);
		$_SESSION['bibres']=$bibres;
		if(isset($_POST['add'])){
			$_SESSION['bibres'] .= '<br/>'.$bibres;
		}
		if(isset($_POST['make'])){
		echo "<div class='res'><textarea id='contents' name='contents' class='bibres'>{$_SESSION['bibres']}</textarea>";
			echo "<button type='submit' class='copybtn' onClick='copy();'>Copy</button></div>";
		}
	?>
		
		

	
	