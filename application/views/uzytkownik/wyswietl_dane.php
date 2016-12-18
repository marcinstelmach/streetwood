  <div class="col-md-6">
    <h3>Twoje dane</h3>
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
              <td>login</td>
              <td><?php echo $key->login ?></td>
            </tr>
            <tr>
              <td>email</td>
              <td><?php echo $key->email ?></td>
            </tr>
            <tr>
              <td>Telefon</td>
              <td><?php echo $key->telefon ?></td>
            </tr>
            <tr>
              <td>Data utworzenia</td>
              <td><?php echo date("Y-m-d", $key->data_utowrzenia) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>  
        </div>
  </div>
</div>
</div>