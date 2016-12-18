<div class="col-md-10 col-sm-12" style="padding-top: 20px;">
    <style>
        .thumb
        {
            width:300px;
        }
        .tytul
        {
            font-weight: bold;
            text-align: center;
            font-size:20px;
        }

        .cena
        {
            text-align: center;
            font-size: 16px;
            color:#AAADB0;
        }

        .thumbs
        {
            padding-bottom: 20px;
        }
    </style>
    <?php

    foreach ($case_iphone as $key)
    {
       /* echo '<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="'.base_url().'odziez/czapki/'.$key->id_produktu.'"><img src="'.base_url().'assetss/img/products/odziez/czapki/thumbs/'.$key->nazwa_zdjecia.'" alt="Zdjęcie 1" style="width:120px; height:120px;"></a>
                        <div class="caption">
                            <h3>'.$key->nazwa_produktu.'</h3>
                            <p>'.$key->cena.' zł</p>
                            <p><a href="#" class="btn btn-default" role="button">Dodaj do koszyka</a></p>
                        </div>
                    </div>
                </div>';
*/
        echo '<div class="col-sm-6 col-md-4">
                <a href="'.base_url().'case_/iphone/'.$key->id_produktu.'">
                <img class="thumb" src="'.base_url().'assetss/img/products/case_/iphone/'.$key->nazwa_zdjecia.'" alt="Zdj1"></a>
                <p class="tytul">'.$key->nazwa_produktu.'</p>
                <p class="cena">'.$key->cena.' zł</p>
            </div>';
    }
    ?>


    
</div>
</div>
</div>