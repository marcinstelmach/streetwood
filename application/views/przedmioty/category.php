<div class="container przedmiot_container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-2 hidden-sm hidden-xs">
            <p class="wykaz-kategorii">
                <?php
                $str=uri_string();
                $last=substr($str, -1);
                if(is_numeric($last))
                {
                    $n=strrpos($str, '/');
                    $str=substr($str, 0, $n);
                }
                echo ucwords(str_replace('/', ' > ', str_replace('_','',$str)));
                ?>
            </p>
            <div id="category">
                <h2 style="font-weight: bold">Kategorie</h2>
                <hr />
                <ul class="category">
                    <?php
                    $name_kat='';
                    foreach ($drzewko as $cat)
                    {
                        if($cat->nazwa_kategorii!=$name_kat)
                        {
                            echo '<li><span class="bold">' . str_replace('_', '', $cat->nazwa_kategorii) . '</span><ul>';
                            foreach ($drzewko as $kat) {
                                if ($kat->nazwa_kategorii == $cat->nazwa_kategorii)
                                    echo '<li>' . anchor(strtolower(str_replace(' ', '-', $cat->nazwa_kategorii.'/'.$kat->nazwa_pod_kategorii)), $kat->nazwa_pod_kategorii) . '</li>';
                            }
                            echo '</ul></li><br />';
                        }
                        $name_kat=$cat->nazwa_kategorii;
                    }
                    ?>
                </ul>
            </div>
        </div>