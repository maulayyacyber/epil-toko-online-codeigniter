<div class="tab-content default-tab" id="tab1">
	<?=form_open("admin/pegawai/change_password/".$this->uri->segment('4'))?>
		<center>
		<table id="tabel1" width="450px">
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="password" size="30px" name="Password_lama"><?=form_error('Password_lama');?></td>
			</tr>
			<tr>
				<td>New Password</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="password" size="30px" name="Password_baru"><?=form_error('Password_baru');?></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="password" size="30px" name="Password_konfirm"><?=form_error('Password_konfirm');?></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center"><input type="button" class="button" style="width:80px" name="button" value="Cancel" onClick="javascript:history.back()">&nbsp; 
				<input type="submit" class="button" style="width:100px" name="submit" value="Edit Password"></td>
			</tr>
		</table>
		</center>
	</form>
</div>