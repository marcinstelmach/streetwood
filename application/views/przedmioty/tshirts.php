<div class="col-md-10 col-sm-12" style="padding-top: 20px;">

    <?php
    foreach ($czapki as $key)
    {
        echo '<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="'.base_url().'odziez/t-shirt/'.$key->id_produktu.'"><img src="'.base_url().'assetss/img/products/odziez/t-shirt/thumbs/'.$key->nazwa_zdjecia.'" alt="Zdjęcie 1" style="width:120px; height:120px;"></a>
                        <div class="caption">
                            <h3>'.$key->nazwa_produktu.'</h3>
                            <p>'.$key->cena.' zł</p>
                            <p><a href="#" class="btn btn-default" role="button">Dodaj do koszyka</a></p>
                        </div>
                    </div>
                </div>';
    }
    ?>
</div>
</div>
</div>