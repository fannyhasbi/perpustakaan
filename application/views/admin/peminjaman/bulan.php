
			<?php

			function cek_bulan($b){
				switch($b){
					case 1: echo "Januari"; break;
					case 2: echo "Februari"; break;
					case 3: echo "Maret"; break;
					case 4: echo "April"; break;
					case 5: echo "Mei"; break;
					case 6: echo "Juni"; break;
					case 7: echo "Juli"; break;
					case 8: echo "Agustus"; break;
					case 9: echo "September"; break;
					case 10: echo "Oktober"; break;
					case 11: echo "November"; break;
					case 12: echo "Desember"; break;
				}
			}

			?>

			<table class="table table-striped table-bordered">
				<tr>
					<th class="text-center">Bulan</th>
					<th class="text-center">Jumlah Pinjam</th>
				</tr>

				<?php foreach($peminjaman as $items): ?>

				<tr>
					<td><?php cek_bulan($items['bulan']);?></td>
					<td><?php echo $items['jumlah_pinjam'];?></td>
				</tr>

				<?php endforeach; ?>
			</table>
