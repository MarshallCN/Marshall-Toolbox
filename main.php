<div class='main'>
	<form method='post' action='index.php'>
		<label>Key Words</label>
		<div class="btn-append">
			<input type='search' name='text' size='40' placeholder='Input to search...'/>
			<span>
					<button type='primary' >OK</button>
					<button name='all' type="submit" outline>Use All</button>
			</span>
		</div>
	</form>
	<?php
		if (!empty($_POST['text'])){
				$text=$_POST['text'];
			}else{
				$text='';
			}
		if (empty($text)){
			$text1= '?';
		}else{
			$text1= "\"".$text."\"";
		}
		$baidu= 'http://www.baidu.com/s?ie=UTF-8&wd='.$text;
		$bing= 'http://global.bing.com/search?q='.$text;
		$yahoo= 'https://search.yahoo.com/search?p='.$text.'&setmkt=en-us&setlang=en-us';
		$wiki= 'https://en.wikipedia.org/w/index.php?search='.$text;
		$bbc= 'http://www.bbc.co.uk/search?q='.$text;
		$staf= 'https://staffs.summon.serialssolutions.com/#!/search?ho=t&l=en-UK&q='.$text;
		$smr= 'http://www.studymode.com/search_results.php?query='.$text;
		$google= 'https://www.google.com.sg/search?q='.$text;
		$baidutrs= 'http://fanyi.baidu.com/?#en/zh/'.$text;
	?>
	<row centered><column><table>
	<tr>
		<td><a id='link1' href="<?php echo $baidu;?>" target='_blank'>
			<img src='img/baidu.png' class='logo'><samp class='big'>Search <?php echo $text1;?> on Baidu</samp></a>
		</td>
	</tr>
	<tr>
		<td><a id='link2' href="<?php echo $bing;?>" target='_blank'>
			<img src='img/bing.jpg' class='logo'><samp class='big'>Search <?php echo $text1;?> on Bing</samp></a>
		</td>
	</tr>
	<tr>
		<td><a id='link3' href="<?php echo $yahoo;?>" target='_blank'>
			<img src='img/yahoo.jpg' class='logo'><samp class='big'>Search <?php echo $text1;?> on Yahoo</samp></a>
		</td>
	</tr>
	<tr>
		<td><a id='link4' href="<?php echo $google;?>" target='_blank'>
			<img src='img/google.png' class='logo'><samp class='big'>Search <?php echo $text1;?> on Google</samp></a>
		</td>
	</tr>
	<tr>
		<td><a id='link5' href="<?php echo $wiki;?>" target='_blank'>
			<img src='img/wiki.png' class='logo'><samp class='big'>Search <?php echo $text1;?> on Wiki</samp></a>
		</td>
	</tr>
	<tr>
		<td><a id='link6' href="<?php echo $bbc;?>" target='_blank'>
			<img src='img/bbc.png' class='logo'><samp class='big'>Search <?php echo $text1;?> on BBC</samp></a>
		</td>
	</tr>
	<tr>
		<td><a id='link7' href="<?php echo $staf;?>" target='_blank'>
			<img src='img/staf.png' class='logo'><samp class='big'>Search <?php echo $text1;?> on Staffordshire</samp></a>
		</td>
	</tr>
</table></column></row centered>
</div>
<?php
$scp="";
for($i=1;$i<8;$i++){
	$scp=$scp."document.getElementById('link$i').click();";
}
if (isset($_POST['all'])){
	echo "<script language='javascript'>$scp</script>";
}
?>