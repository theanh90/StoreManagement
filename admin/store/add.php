<?php
include("../../share/commonlib.php");
generateAdminHeader("Thêm Cửa Hàng mới");

// handle add store
if(isset($_POST['btnStoreSubmit'])) {
	// Insert new Store to database
	function insertStore(){
		$acc = addslashes($_POST['txtStoreLogin']);
		$name = addslashes($_POST['txtStoreName']);
		$tel = $_POST['txtStoreTel'];
		$add = addslashes($_POST['txtStoreAdd']);
		$pre = addslashes($_POST['txtStorePre']);
		$mail = $_POST['txtStoreEmail'];
		$pass = md5($_POST['txtStorePass01']);
		$note = addslashes($_POST['txtStoreNote']);

		$sql = "insert into
			STORE(NAME, LOGINNAME, PASSWORD, STATUS, ADDRESS, PHONE, PRESENTER, NOTE, EMAIL)
			values('$name', '$acc', '$pass', 'ACTIVE', '$add', '$tel', '$pre', '$note', '$mail')";
		$result = mysql_query($sql) or die(mysql_error());;
		if ($result == true)
		{
			echo '<script type="application/javascript">
				var message = "Thêm mới Cửa Hàng thành công",
					type = "type-success",
					title = "Lưu Thành Công",
					goto = "../store";
				mess_alert(message, type, title, goto);
			</script>';
		}else {
			echo '<script type="application/javascript">
				var message = "Thêm mới Cửa Hàng thất bại! Vui lòng nhập lại",
					type = "type-danger",
					title = "Thông Báo Lỗi",
					goto = "../store/add.php";
				mess_alert(message, type, title, goto);
			</script>';
			echo mysql_error();
		}
	}

	// check duplicate login name
	function checkAccExist(){
		$acc = addslashes($_POST['txtStoreLogin']);
		$sql_checkExist = "select s_id
						from STORE
						where LOGINNAME='$acc'";
		$result_checkExist = mysql_query($sql_checkExist) or die(mysql_error());;
		if (mysql_num_rows($result_checkExist) > 0){
			return false;
		} else {
			return true;
		}
	}

	insertStore();
}
?>

	<!-- Content for each page is located within <div class="content"> -->
	<div class="content">
		<p class="purpose">Nhập các thông tin để thêm một Cửa Hàng mới</p>

		<!-- Form for input Store's info -->
		<form action="" method="post" name="frmAddStore" id="frmAddStore" class="frmAddStore">
				<table class="add_table">
					<tr>
						<td><label>Tên hiển thị</label></td>
						<td>
							<input type="text" name="txtStoreName" id="txtStoreName" required="true">
							<span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label>Số điện thoại: </label></td>
						<td>
							<input type="tel" name="txtStoreTel" id="txtStoreTel" required="true">
							<span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label>Địa Chỉ: </label></td>
						<td>
							<input type="text" name="txtStoreAdd" id="txtStoreAdd" required="true">
							<span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label>Người đại diện: </label></td>
						<td>
							<input type="text" name="txtStorePre" id="txtStorePre" required="true">
							<span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label>Email: </label></td>
						<td>
							<input type="email" name="txtStoreEmail" id="txtStoreEmail">
						</td>
					</tr>

					<tr>
						<td><label>Tên đăng nhập: </label></td>
						<td>
							<input type="text" name="txtStoreLogin" id="txtStoreLogin" required="true">
							<span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label>Mật khẩu: </label></td>
						<td>
							<input type="password" name="txtStorePass01" id="txtStorePass01" required="true">
							<span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label>Xác nhận mật khẩu: </label></td>
						<td>
							<input type="password" name="txtStorePass02" id="txtStorePass02" required="true">
							<span class="required">*</span>
						</td>
					</tr>

					<tr>
						<td><label>Ghi chú: </label></td>
						<td>
							<textarea name="txtStoreNote" rows="5" cols="35"></textarea>
						</td>
					</tr>

					<tr>
						<td><input type="submit" name="btnStoreSubmit" value="Lưu" onclick="return validateAddStore()"></td>
						<td><button id="btnStoreCancelSubmit" onclick="location.href='../store'">Hủy</button></td>
					</tr>
				</table>
				<p style="color: red; text-align: left; font-size: 80%;"> * là trường bắt buộc</p>
		</form>

	</div>

	<script type="application/javascript">
		$('#addStore').click(function() {
			alert("da click");
			document.location = ("add.php");
		});

//		validate for add new Store
		function validateAddStore() {
			var phone = $('#txtStoreTel').val();
			var pass01 = $('#txtStorePass01').val();
			var pass02 = $('#txtStorePass02').val();
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

	<!--	var check_acc_exist = --><?php //checkAccExist(); ?><!--;-->
			if (!result_validate) {
				mess_alert(error_message, 'type-danger', 'Thông Báo Lỗi');
			}

			return result_validate;
		}
	</script>

<?php
generateFooter();
?>