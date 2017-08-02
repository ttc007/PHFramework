<?php
include 'layout.php';
include "../model/data.php";
//include "../model/chuyenmucData.php";
?>
<div class="container">
	<div class="panel panel-info" style="height: 800px;margin-top: 20px;">
		<div class="col-md-3 col-sm-3" style="border: 1px solid #123456; height: 800px;margin-right:30px;padding: 0 ;background: #12acbda;text-align: center;">
			<ul style="list-style-type: none;margin-left:-40px ">
				<?php
					$id=filter_input(INPUT_GET, 'id');
					if ($id=="") $id=5;
					$monhoc=getMonhoc($id);
					$xaydung=getChuyenmuc2();
					$monhocs=getMonhocRef($xaydung[0]);
					foreach ($monhocs as $value) {
				?>
					<li style="padding: .8em;margin: 0"><a href="?id=<?php echo $value[0];?>"><h3><?php echo $value[1];?></h3></a></li>
				<?php
					}
				?>
				
			</ul>
		</div>
		<div style="margin-top: 10px;padding: 1em;color:#01576d;height: 500px;">
			<h1 style="text-align: center;"><?php echo $monhoc[1];?></h1>
			<?php 
				$tt=filter_input(INPUT_GET, 'tt');
				$pm=filter_input(INPUT_GET, 'pm');
				$bg=filter_input(INPUT_GET, 'bg');
				$bt=filter_input(INPUT_GET, 'bt');
				if($tt==1) {
					echo "<h4>Thông tin định mức</h4>".$monhoc[3];
					echo "</div></div></div>";
					include "footer.php";
					exit();
				} else if ($pm==1) {
					echo "<h4>Phần mềm</h4>".$monhoc[4];
					echo "</div></div></div>";
					include "footer.php";
					exit();
				} elseif ($bg==1) {
					$idChuong=filter_input(INPUT_GET, 'idChuong');
					$chuong=getChuong($idChuong);
					echo "<h4>Bài giảng chương $chuong[1]</h4>".$chuong[2];
					echo "</div></div></div>";
					include "footer.php";
					exit();
				} elseif ($bt==1) {
					$idChuong=filter_input(INPUT_GET, 'idChuong');
					$chuong=getChuong($idChuong);
					echo "<h4>Bài tập chương $chuong[1]</h4>".$chuong[3];
					echo "</div></div></div>";
					include "footer.php";
					exit();
				}
			?>
			<ul style="list-style-type: none;">
				<li><h3>Bài giảng</h3>
					<ul style="list-style-type: none">
						<?php
							$chuong=getChuongs($monhoc[0]);
							foreach ($chuong as $value) {
						?>
							<li><a href="?bg=1&idChuong=<?php echo $value[0];?>"><?php echo $value[1];?></a></li>
						<?php
							}
						?>
					</ul>
				</li>
				<li><h3>Bài tập tự kiểm tra</h3>
					<ul style="list-style-type: none;">
						<?php
							$chuong=getChuongs($monhoc[0]);
							foreach ($chuong as $value) {
						?>
							<li><a href="?bt=1&idChuong=<?php echo $value[0];?>"><?php echo $value[1];?></a></li>
						<?php
							}
						?>
					</ul>
				</li>
				<li><a href="?tt=1&id=<?php echo $id;?>"><h3>Thông tin định mức</h3></a></li>
				<li><a href="?pm=1&id=<?php echo $id;?>"><h3>Phần mềm</h3></a></li>
			</ul>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>