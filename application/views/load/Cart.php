
    <?php if(isset($cart) && $cart->num_rows()>0){ ?>
    <table class="table">
                    <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cart->result() as $row): ?>
                    <tr>
                        <td><?= $row->title ?></td>
                        <td><?= $row->current_price ?>PLN</td>
                        <td><?= $row->quantity ?></td>
                        <td>
                           <input type="checkbox" value=<?= $row->offer_id ?>>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Suma:</th>
                        <th>200PLN</th>
                    </tr>
                    </thead>
    </table>
    <?php }else{ ?>
    <i>Nie znaleziono żadnych produktów w Twoim koszyku</i>
    <?php } ?>
                    

