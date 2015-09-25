<?php
include("../../share/commonlib.php");
generateAdminHeader("Thêm Sản Phẩm mới");

// handle add product
if(isset($_POST['btnProductSubmit'])) {
	// Check duplicate Product Code
	function checkDuplicateCode(){
		$code = addslashes($_POST['txtProductCode']);
		$sql_check = "select P_ID
					  from PRODUCT
					  where CODE='$code'";
		$result_check = mysql_query($sql_check) or die(mysql_error());
		if (mysql_num_rows($result_check) > 0){
			echo '<script type="application/javascript">
				var message = "Sãn Phẩm có MÃ bị trùng. Vui lòng nhập lại",
					type = "type-danger",
					title = "Thông Báo Lỗi",
					goto = "../product/add.php";
				mess_alert(message, type, title, goto);
			</script>';
		} else{
			insertProduct($code);
		}

	}

	// Insert new Product to database
	function insertProduct($code){
		$name = addslashes($_POST['txtProductName']);
		$type = addslashes($_POST['txtProductType']);
		$status = addslashes($_POST['txtProductStatus']);
		$note = addslashes($_POST['txtProductNote']);

		$sql = "insert into
				PRODUCT(NAME, CODE, NOTE, TYPE, STATUS)
				values('$name', '$code', '$note', '$type', '$status')";
		$result = mysql_query($sql) or die(mysql_error());;
		if ($result == true)
		{
			echo '<script type="application/javascript">
			var message = "Thêm mới Sản Phẩm thành công",
				type = "type-success",
				title = "Lưu Thành Công",
				goto = "../product";
			mess_alert(message, type, title, goto);
		</script>';
		}else {
			echo '<script type="application/javascript">
			var message = "Thêm mới Sản Phẩm thất bại! Vui lòng nhập lại",
				type = "type-danger",
				title = "Thông Báo Lỗi",
				goto = "../product/add.php";
			mess_alert(message, type, title, goto);
		</script>';
			echo mysql_error();
		}

	}

	checkDuplicateCode();
}
?>

	<!-- Content for each page is located within <div class="content"> -->
	<div class="content">
		<p class="purpose">Nhập các thông tin để thêm một Sản Phẩm mới</p>

		<!-- Form for input Product's info -->
		<form action="" method="post" name="frmAddProduct" id="frmAddProduct" class="frmAddProduct">
			<table class="add_table">
				<tr>
					<td><label>Tên Sản Phẩm</label></td>
					<td>
						<input type="text" name="txtProductName" id="txtProductName" required="true">
						<span class="required">*</span>
					</td>
				</tr>

				<tr>
					<td><label>Mã Sản Phẩm: </label></td>
					<td>
						<input type="text" name="txtProductCode" id="txtProductCode" required="true">
						<span class="required">*</span>
					</td>
				</tr>

				<tr>
					<td><label>Nhóm: </label></td>
					<td>
						<input type="text" name="txtProductType" id="txtProductType">
					</td>
				</tr>

				<tr>
					<td><label>Trạng Thái: </label></td>
					<td>
						<input type="text" name="txtProductStatus" id="txtProductStatus" required="true">
						<span class="required">*</span>
					</td>
				</tr>

				<tr>
					<td><label>Ghi Chú: </label></td>
					<td>
						<input type="text" name="txtProductNote" id="txtProductNote">
					</td>
				</tr>

				<tr>
					<td><input type="submit" name="btnProductSubmit" value="Lưu"></td>
					<td><button id="btnProductCancelSubmit" onclick="location.href='../product'">Hủy</button></td>
				</tr>
			</table>
			<p style="color: red; text-align: left; font-size: 80%;"> * là trường bắt buộc</p>
		</form>

	</div>

	<script type="application/javascript">
		$('#addProduct').click(function() {
			alert("da click");
			document.location = ("add.php");
		});

		//		validate for add new Product
		function validateAddProduct() {
			var phone = $('#txtProductTel').val();
			var pass01 = $('#txtProductPass01').val();
			var pass02 = $('#txtProductPass02').val();
			var error_message = '';
			var result_validate = true;

			if (phone.search(/(^\d{6,11}$)|(^\s*$)/g) == -1){
				error_message += '<p style="text-align: left"> SĐT phải là số, SĐT có từ 6 đến 11 con số \n </p>';
				result_validate = false;
			}
			if (pass01 != pass02) {
				error_message += '<p style="text-align: left"> Password không trùng nhau </p>';
				result_validate = false;
			}

			if (!result_validate) {
				mess_alert(error_message, 'type-danger', 'Thông Báo Lỗi');
			}

			return result_validate;
		}
	</script>

<?php
generateFooter();
?>