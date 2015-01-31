

		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table>
		    <tr>
				<td valign="top">First Name<span style="color:red;">*</span></td>
				<td><input type="text" name="name" class="text" value="<?php echo set_value('name',$this->form_data->name); ?>"/>
<?php echo form_error('name'); ?>
				</td>
			</tr>
            <tr>
				<td valign="top">Last Name<span style="color:red;">*</span></td>
				<td><input type="text" name="surname" class="text" value="<?php echo set_value('surname',$this->form_data->surname); ?>"/>
<?php echo form_error('surname'); ?>
				</td>
			</tr>
            <tr>
				<td valign="top">Username<span style="color:red;">*</span></td>
				<td><input type="text" name="name" class="text" value="<?php echo set_value('username',$this->form_data->username); ?>"/>
<?php echo form_error('username'); ?>
				</td>
			</tr>
            <tr>
				<td valign="top">Gender<span style="color:red;">*</span></td>
				<td><input type="radio" name="gender" value="M" <?php echo set_radio('gender', 'M', $this->form_data->gender == 'M'); ?>/> M
					<input type="radio" name="gender" value="F" <?php echo set_radio('gender', 'F', $this->form_data->gender == 'F'); ?>/> F
<?php echo form_error('gender'); ?>
					</td>
			</tr>
			 <tr>
				<td valign="top">Date you joined<span style="color:red;">*</span></td>
				<td><input type="text" name="name" class="text" value="<?php echo set_value('date',$this->form_data->created); ?>"/>
<?php echo form_error('date'); ?>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
			</tr>
		</table>
		</div>
		</form>
		<br />
		<?php echo $link_back; ?>
