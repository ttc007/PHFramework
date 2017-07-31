<?php
include 'layout.php';
include "../model/monhocData.php";
include "../model/chuyenmucData.php";

?>
<?php
	$id=filter_input(INPUT_GET, 'idChuong');
	$chuong=getChuong($id);
?>
<div class="container">
	<div class="panel panel-info" style="height: 800px;margin-top: 20px;">
		<div class="col-md-3" style="border: 1px solid #123456; height: 800px;margin-right:20px ">

			<ul class="nav nav-pills nav-stacked">
				<?php
					$chuyenmucs=getChuyenmuc1();
					foreach ($chuyenmucs as $valueP) {
				?>
				
				<li><h3><?php echo $valueP[1];?></h3>
					<ul style="list-style-type: none;">
						<?php
						$rows=getMonhocRef($valueP[0]);
						foreach ($rows as $value) {
						?>
							
							<h3><a data-toggle="collapse" data-target="#<?php echo $value[0];?>"><?php echo $value[1];?></a></h3>
								<?php
									if($chuong[4]==$value[0]) {
								?>
								<ul id="<?php echo $value[0];?>" class="collapse in">
									<?php
										$chuongs=getChuongs($value[0]);
										foreach ($chuongs as $valueC) {
									?>
										<li><a href="?idChuong=<?php echo $valueC[0]; ?>"><?php echo $valueC[1];?></a></li>
									<?php
										}
									?>
								</ul>
								<?php } else { ?>
								<ul id="<?php echo $value[0];?>" class="collapse">
									<?php
										$chuongs=getChuongs($value[0]);
										foreach ($chuongs as $valueC) {
									?>
										<li><a href="?idChuong=<?php echo $valueC[0]; ?>"><?php echo $valueC[1];?></a></li>
									<?php
										}
									?>
								</ul>
								<?php } ?>
							</li>
						<?php
							}
						?>

					</ul>
				</li>
				<?php
					}
				?>
			</ul>
		</div>
		<div style="height: 800px;overflow: scroll;">
			  
			<a data-toggle="collapse" data-target="#demo"><h3><?php echo $chuong[1]?></h3></a>
			
			<div id="demo" class="collapse in">

				<p><?php echo $chuong[2]?></p>
				<h4>Bài tập</h4>
			</div>
			
			<h5><?php echo $chuong[3]?></h5>
		</div> 
	</div>
</div>
<?php
// include 'footer.php';
?>