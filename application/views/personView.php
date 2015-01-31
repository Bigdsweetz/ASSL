

		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td valign="top">Name</td>
				<td><?php echo $person->name; ?></td>
			</tr>
            <tr>
				<td valign="top">Username</td>
				<td><?php echo $person->username; ?></td>
			</tr>
			<tr>
				<td valign="top">Gender</td>
				<td><?php echo strtoupper($person->gender)=='M'? 'Male':'Female' ; ?></td>
			</tr>
			<tr>
				<td valign="top">Date of you joined</td>
				<td><?php echo date('d-m-Y',strtotime($person->created)); ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>


