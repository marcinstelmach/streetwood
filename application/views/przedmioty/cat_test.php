<div class="container przedmiot_container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-2 hidden-sm hidden-xs">
            <p class="wykaz-kategorii">
                sklep &gt;
                case &gt;
                Case rolki
            </p>
            <h2 style="font-weight: bold">Kategorie</h2>
            <hr />
            <ul>
                <?php
                $name_kat='';
                    foreach ($drzewko as $cat)
                    {
                        if($cat->nazwa_kategorii!=$name_kat)
                        {
                            echo '<li><span class="bold">' . $cat->nazwa_kategorii . '</span><ul>';
                            foreach ($drzewko as $kat) {
                                if ($kat->nazwa_kategorii == $cat->nazwa_kategorii)
                                    echo '<li>' . anchor('bransoletki/'.strtolower(str_replace(' ', '-',$kat->nazwa_pod_kategorii)), $kat->nazwa_pod_kategorii) . '</li>';
                            }
                            echo '</ul></li><br />';
                        }
                        $name_kat=$cat->nazwa_kategorii;
                    }
                ?>
            </ul>
        </div>