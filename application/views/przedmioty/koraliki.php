<div class="col-md-10 col-sm-12" style="padding-top: 20px;">
    <?php

    foreach ($koraliki as $key)
    {
        echo '<div class="col-sm-6 col-md-4">
                <a href="'.base_url().'bransoletki/koraliki/'.$key->id_produktu.'-'.str_replace(' ', '-', $key->nazwa_produktu).'">
                <img class="thumbki" src="'.base_url().'assetss/img/products/bransoletki/koraliki/'.$key->nazwa_zdjecia.'" alt="Zdj1"></a>
                <p class="thumb-tytul">'.$key->nazwa_produktu.'</p>
                <p class="thumb-cena">'.$key->cena.' zł</p>
            </div>';
    }
    if($koraliki==null)
    {
        echo '<h1 class="text-center">Brak produktów w tej kategorii</h1>';
    }
    ?>
</div>
</div>
</div>