<div class="row">
  <div class="col-md-8">
  <h1>Podsumowanie</h1>
  <div class="table-responsive">
    <table class="table">
      <tr>
        <th>#</th>
        <th>Ilość</th>
        <th>Nazwa</th>
        <th>Cena produktu</th>
        <th>Suma</th>
      </tr>
    <?php echo form_open(base_url().'koszyk/update'); 
    $i = 1; 
    foreach ($this->cart->contents() as $items):
    echo form_hidden($i.'[rowid]', $items['rowid']);  ?>
        <tr>
            <td><?php  echo $i?></td>
            <td><?php echo $items['qty']; ?></td>
            <td><?php echo $items['name']; ?></td>
            <td><?php echo $this->cart->format_number($items['price']).' zł'; ?></td>
            <td><?php echo $this->cart->format_number($items['subtotal']).' zł'; ?></td>
        </tr>

<?php $i++; ?>
<?php endforeach; ?>

      <tr>
        <td colspan="3"></td>
        <td><strong><h3>Do zapłaty</h3></strong></td>
        <td><strong><h3><?php echo $this->cart->format_number($this->cart->total()).' zł'; ?></h3></strong></td>
        <td colspan="1"></td>
      </tr>

</table>  
  </div>

</div>
</div>
<p class="text-right" style=" position: relative; right: 50px; bottom: 0px"><a href="<?php echo base_url().'zamowienie/krok-2'; ?>" class="btn btn-primary btn-lg">Przejdz dalej</a></p>
</div>