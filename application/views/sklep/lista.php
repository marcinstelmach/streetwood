<div class="row">
<h1 class="sub-header tytul"><em>Sklep z matami</em></h1>
  <div class="col-md-2 tlo">
    <h2 class="sub-header">Kategorie</h2>
    <table class="table">
    <?php foreach($kategorie as $key){ ?>
    <tr><td><?php echo '<a href="'.base_url().'sklep/produkty/'.url_title($key->nazwa_kategorii, 'dash', TRUE).'">'.$key->nazwa_kategorii.'</a>'; ?></td></tr>
  <?php } ?>
</table>
  </div>
	<div class="col-md-offset-1 col-md-8 tlo">
   <?php 
      if(empty($produkty))
      {
        echo '<h2>Brak produktów w danej kategorii</h2>';
      }
      else
      {
     ?>
		<h2 class="sub-header"></h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Zdjęcie</th>
                  <th>Nazwa</th>         
                  <th>Cena</th>
                  <th>Stan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody> 
                <?php 
                $i=1;
                foreach($produkty as $key){ ?>
                  <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><a href="<?php echo base_url().'o/produkcie'; ?>"><img src="<?php 
                      $thumb= substr($key->zdjecie, 0, -4);
                      $thumb=$thumb.'_thumb.jpg';
                    echo base_url().'assets/uploads/'.$thumb; ?>" class="img-responsive" alt="Responsive image" width="100"></a></td>
                    <td><a href="<?php echo base_url().'o/produkcie'; ?>"><?php echo $key->nazwa.' '.$key->dlugosc.'cm / '.$key->szerokosc; ?></a></td>                     
                    <td><span class="cena"><?php echo $key->cena." PLN"; ?></span></td>
                    <td>
                      <?php 
                        if ($key->stan==1) {
                          echo '<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:#1CFC1C"></span>';
                        }
                        elseif($key->stan==0)
                        {
                          echo '<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color:#FC1C1C"></span>';
                        }
                       ?>
                    </td>
                    <td><a class="btn btn-success" href="<?php echo base_url().'koszyk/dodaj/'.$key->id_produktu;?>" <?php if($key->stan==0) echo 'disabled="disabled"' ?>role="button">Dodaj do koszyka</a></td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
      <?php } ?>
       </div>
</div>
</div>

