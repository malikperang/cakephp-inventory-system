<p>Notifier: <?php echo $sender?><br />
Message  : Dear admin,this is notification on current stock transaction.</p>
<div class="table-title">

</div>
<table class="table-fill">
	<thead>
		<tr>
			<th colspan="2" rowspan="" headers="" scope="" class="heading">
				Stock id #<?php echo $stock['Stock']['id']?>
			</th>
		</tr>
		<tr>
			<th class="text-left">Descriptions</th>
			<th class="text-left">Details</th>
		</tr>
	</thead>
	<tbody class="table-hover">
		<tr>
			<td class="text-left">Transaction ID</td>
			<td class="text-left"><?php echo $stock['Stock']['transID'];?></td>
		</tr>
		<tr>
			<td class="text-left">Item</td>
			<td class="text-left"><?php echo $stock['Stock']['item_name'];?></td>
		</tr>
		<tr>
			<td class="text-left">Stock in</td>
			<td class="text-left"><?php echo $stock['Stock']['stock_in'];?></td>
		</tr>
		<tr>
			<td class="text-left">Stock Out</td>
			<td class="text-left"><?php echo $stock['Stock']['stock_out'];?></td>
		</tr>
		<tr>
			<td class="text-left">Stock Balance</td>
			<td class="text-left"><?php echo $stock['Stock']['stock_balance'];?></td>
		</tr>
		<tr>
			<td class="text-left">Stock Status</td>
			<td class="text-left"><?php echo $stock['Stock']['stock_status'];?></td>
		</tr>
		<tr>
			<td class="text-left">Issuer</td>
			<td class="text-left"><?php echo $stock['Stock']['issuer'];?></td>
		</tr>
		<tr>
			<td class="text-left">Transaction Remarks</td>
			<td class="text-left"><?php echo $stock['Stock']['transaction_remarks'];?></td>
		</tr>
		<tr>
			<td class="text-left">Created at</td>
			<td class="text-left"><?php echo $stock['Stock']['created'];?></td>
		</tr>
	</tbody>
</table>