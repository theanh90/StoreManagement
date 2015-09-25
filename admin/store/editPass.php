<?php
include("../../share/commonlib.php");
generateAdminHeader("Thay đổi mật khẩu");

// handle edit Password store
if(isset($_POST['btnStoreSubmit'])){
	function checkCurrentPass(){
		$id = $_POST['id'];
		$acc = $_POST['loginName'];
		$curPass = md5($_POST['txtStorePass00']);
		$sql_check = "select S_ID
					  from STORE
					  where LOGINNAME='$acc' and PASSWORD='$curPass'";
		$result_check = mysql_query($sql_check) or die(mysql_error());
		if (mysql_num_rows($result_check) <= 0){
			echo '<script type="application/javascript">
				var message = "Mật khẩu cũ nhập vào không đúng. Vui lòng nhập lại",
					type = "type-danger",
					title = "Thông Báo Lỗi",
					goto = "../store/editPass.php?id=' . $id . '";
				mess_alert(message, type, title, goto);
			</script>';
		} else {
			updatePass($id);
		}
	}

	function updatePass($id){
		$newPass = md5($_POST['txtStorePass01']);

		$sql = "update STORE
				set PASSWORD = '$newPass'
				where S_ID='$id'";

		$result = mysql_query($sql) or die(mysql_error());;
		if ($result == true)
		{
			echo '<script type="application/javascript">
				var message = "Thay đổi mật khẩu thành công",
					type = "type-success",
					title = "Lưu Thành Công",
					goto = "../store";
				mess_alert(message, type, title, goto);
			</script>';
		}else {
			echo '<script type="application/javascript">
				var message = "Thay đổi mật khẩu thất bại! Vui lòng nhập lại",
					type = "type-danger",
					title = "Thông Báo Lỗi",
					goto = "../store/editPass.php?id=' . $id . '";
				mess_alert(message, type, title, goto);
			</script>';
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

	checkCurrentPass();
}

?>

	<!-- Content for each page is located within <div class="content"> -->
	<div class="content">
		<p class="purpose">Thay đổi mật khẩu đăng nhập</p>


		<?php
		// Put data into form
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$sql_get = "select *
							from STORE
							where S_ID = '$id'";
			$result_get = mysql_query($sql_get) or die (mysql_error());
			$row_get = mysql_fetch_array($result_get);

		}
		?>

		<!-- Form for input Store's info -->
		<form action="" method="post" name="frmAddStore" id="frmAddStore" class="frmAddStore">
			<table class="add_table">
				<tr>
					<td><label>Tên đăng nhập</label></td>
					<td>
						<span ><?php echo $row_get['LOGINNAME']?></span>
					</td>
				</tr>

				<tr>
					<td><label>Mật khẩu cũ</label></td>
					<td>
						<input type="password" name="txtStorePass00" id="txtStorePass00" required="true">
						<span class="required">*</span>
					</td>
				</tr>

				<tr>
					<td><label>Mật khẩu mới: </label></td>
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
					<input name="id" type="hidden" value="<?php echo $id?>">
					<input name="loginName" type="hidden" value="<?php echo $row_get['LOGINNAME']; ?>">
					<td><input type="submit" name="btnStoreSubmit" value="Lưu" onclick="return validateAddStore()"></td>
					<td><button type="button" id="btnStoreCancelSubmit" onclick="location.href='../store'">Hủy</button></td>
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
			var pass01 = $('#txtStorePass01').val();
			var pass02 = $('#txtStorePass02').val();
			var error_message = '';
			var result_validate = true;

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