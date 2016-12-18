<div class="row">
<?php 
		if ($this->session->userdata('updated')==true)
		{
			echo '<div class="col-md-8">
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <p class="text-center">Zawartość koszyka została zaaktualizowana</p>
				</div>
			</div>';
			$this->session->unset_userdata('updated');
		}

		if ($this->session->userdata('deleted')==true)
		{
			echo '<div class="col-md-8">
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <p class="text-center">Produkt został usunięty</p>
				</div>
			</div>';
			$this->session->unset_userdata('deleted');
		}

		if ($this->session->userdata('destroyed')==true)
		{
			echo '<div class="col-md-8">
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <p class="text-center">Zawartość koszyka została wymazana</p>
				</div>
			</div>';
			$this->session->unset_userdata('destroyed');
		}

 ?>

	<div class="col-md-8">
        <h1 style="font-weight: bold">Koszyk</h1>
	<?php if ($this->cart->total_items()>0){ ?>
	<div class="table-responsive">
		<table class="table">
		<tr>
			<th>#</th>
	        <th>Ilość</th>
	        <th>Nazwa</th>
	        <th>Cena produktu</th>
	        <th>Suma</th>
	        <th>Usuń</th>
		</tr>
		<?php echo form_open(base_url().'koszyk/update'); 
		$i = 1; 
		foreach ($this->cart->contents() as $items):
		echo form_hidden($i.'[rowid]', $items['rowid']);  ?>
        <tr>
        		<td><?php  echo $i?></td>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'style'=>'text-align:center;')); ?></td>
                <td>
                        <?php echo $items['name']; ?>
                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                        <p>
                            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                            <?php endforeach; ?>
                        </p>

                    <?php endif; ?>
                </td>
                <td><?php echo $this->cart->format_number($items['price']).' zł'; ?></td>
                <td><?php echo $this->cart->format_number($items['subtotal']).' zł'; ?></td>
                <td><a href="<?php echo base_url().'koszyk/usun/'.$items['rowid']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="3"> </td>
        <td><strong>Do zapłaty</strong></td>
        <td><?php echo $this->cart->format_number($this->cart->total()).' zł'; ?></td>
        <td colspan="1"></td>
</tr>

</table>
	<input type="submit" class="btn btn-danger koszyk-buttons"  name="update_cart" value="Aktualizuj" />
	<a href="<?php echo base_url().'koszyk/destroy'; ?>" class="btn btn-danger koszyk-buttons">Wyczyść koszyk</a>
	
	</div>


</div>
</div>
<p class="text-right"><a href="<?php echo base_url().'zamowienie/krok-1'; ?>" class="btn przejdz-dalej">Przejdz dalej</a></p>
<?php 
	}
	else
	{ 
		echo "<h1>Brak produktów w koszyku</h1></div>";
	}
	?>
</div>
</div>