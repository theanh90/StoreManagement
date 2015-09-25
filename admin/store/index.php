<?php
	include("../../share/commonlib.php");
	generateAdminHeader("Quản lý các Cửa Hàng");

	// Paging
	$sql = "select S_ID, NAME, ADDRESS, PHONE, PRESENTER, EMAIL
			from STORE
			order by S_ID DESC";

	$itemsPerPage = 20;
	$currentPage = 1;
	if (isset($_GET['page']))
	{
		$currentPage = $_GET['page'] ;
	}

	$totalItems = mysql_num_rows(mysql_query($sql));
	$totalPage = ceil($totalItems/$itemsPerPage);
	$start = ($currentPage - 1) * $itemsPerPage;
	$sql_limit = $sql . " limit $start, $itemsPerPage ";
	$result = mysql_query($sql_limit) or die (mysql_error());
?>

	<!-- Content for each page is located within <div class="content"> -->
	<div class="content">
		<div class="funtionButton">
			<button class="btn btn-success" id="addStore" type="button">Thêm C.Hàng</button>
		</div>
		<p class="purpose">Danh sách các cửa hàng hiện tại</p>

		<table class="listNPP">
			<tr>
				<th>Tên</th>
				<th>Địa chỉ</th>
				<th>Số ĐThoại</th>
				<th>Đại diện</th>
				<th>Email</th>
				<th>Sửa</th>
			</tr>
			<?php
				$check = 1;
				if ($result == true){
					while ($row = mysql_fetch_array($result))
					{
						if ($check % 2 == 0)
							$class = "chan";
						else
							$class = "le";

						echo "<tr class='$class mouse_hover_table'>";
						echo "<td>".$row['NAME']."</td>";
						echo "<td>".$row['ADDRESS']."</td>";
						echo "<td>".$row['PHONE']."</td>";
						echo "<td>".$row['PRESENTER']."</td>";
						echo "<td>".$row['EMAIL']."</td>";

						echo '<td class="edit_store">
								<span style="cursor: pointer;" class="edit" id="' . $row['S_ID']. '">
									<img src="../../share/images/common/edit.png" height="30" width="30">
								</span>
                  			  </td>';


						echo '</tr>';

						$check ++;

					}
				}
			?>
		</table>
		<?php
		getCurrentLink();
		pageNavigator($currentPage, $totalPage);
		?>

	</div>

	<script type="application/javascript">
		$('#addStore').click(function(){
			document.location = ("add.php");
		});

		$('.edit').click(function(){
			var store_id = $(this).attr("id");
			document.location = "edit.php?id=" + store_id;
		});
	</script>

<?php
generateFooter();
?>