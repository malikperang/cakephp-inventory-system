<?php //debug($Item);?>
<p>Notifier: <?php echo $sender?><br />
Message  : Dear admin,this is notification and details about new item.</p>
<div class="table-title">

</div>
<table class="table-fill">
	<thead>
		<tr>
			<th colspan="2" rowspan="" headers="" scope="" class="heading">
				Item id - <?php echo $item['Item']['id']?>
			</th>
		</tr>
		<tr>
			<th class="text-left">Descriptions</th>
			<th class="text-left">Details</th>
		</tr>
	</thead>
	<tbody class="table-hover">
		<tr>
			<td class="text-left">ID</td>
			<td class="text-left"><?php echo $item['Item']['id'];?></td>
		</tr>
		<tr>
			<td class="text-left">Item Code</td>
			<td class="text-left"><?php echo $item['Item']['itemCode'];?></td>
		</tr>
		<tr>
			<td class="text-left">Name</td>
			<td class="text-left"><?php echo $item['Item']['name'];?></td>
		</tr>
		<tr>
			<td class="text-left">Minimum Quantity</td>
			<td class="text-left"><?php echo $item['Item']['minimum_qty'];?></td>
		</tr>
		<tr>
			<td class="text-left">Maximum Quantity</td>
			<td class="text-left"><?php echo $item['Item']['maximum_qty'];?></td>
		</tr>
		<tr>
			<td class="text-left">Unit Measurement</td>
			<td class="text-left"><?php echo $item['Item']['unitMeasurement'];?></td>
		</tr>
		<tr>
			<td class="text-left">Created at</td>
			<td class="text-left"><?php echo $item['Item']['created'];?></td>
		</tr>
		<tr>
			<td class="text-left">Created by</td>
			<td class="text-left"><?php echo $item['Item']['created_by'];?></td>
		</tr>
		<tr>
			<td class="text-left">Last updated</td>
			<td class="text-left"><?php echo $item['Item']['modified'];?></td>
		</tr>
		<tr>
			<td class="text-left">Modified by</td>
			<td class="text-left"><?php echo $item['Item']['modified_by'];?></td>
		</tr>
	</tbody>
</table>