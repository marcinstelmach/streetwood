<div class="row">
  <div class="col-md-6">
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
    <?php 
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

      <?php $i++; 
      endforeach;
        
       ?>

      <tr>
        <td colspan="3"></td>
        <td><strong><h3>Do zapłaty</h3></strong></td>
        <td><strong><h3><?php echo $this->cart->format_number($this->cart->total()).' zł'; ?></h3></strong></td>
        <td colspan="1"></td>
      </tr>

    </table>  
    </div>
    </div>
    <div class="col-md-6">
      <h2>Adres</h2>
      <div class="table-responsive">
        <table class="table table-striped">
        <?php
            foreach ($dane as $key):?>
            <tr>
              <td>Imie</td>
              <td><?php echo $key->imie ?></td>
            </tr>
            <tr>
              <td>Nazwisko</td>
              <td><?php echo $key->nazwisko ?></td>
            </tr>
            <tr>
              <td>email</td>
              <td><?php echo $key->email ?></td>
            </tr>
            <tr>
              <td>Telefon</td>
              <td><?php echo $key->telefon ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td>Ulica</td>
              <td><?php echo $this->session->userdata('ulica'); ?></td>
            </tr>
            <tr>
              <td>Nr domu</td>
              <td><?php echo $this->session->userdata('nr_domu'); ?></td>
            </tr>
            <tr>
              <td>Miasto</td>
              <td><?php echo $this->session->userdata('miasto'); ?></td>
            </tr>
            <tr>
              <td>Kod pocztowy</td>
              <td><?php echo $this->session->userdata('kod_pocztowy'); ?></td>
            </tr>
        </table>  
        </div>

    </div>

</div>

<p class="text-right" style=" position: relative; right: 50px; bottom: 0px"><a href="<?php echo base_url().'zamowienie/potwierdzenie'; ?>" class="btn btn-primary btn-lg">Zamawiam</a></p>
</div>