<html>
    <head>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <body>
        <div class="container">
            <?php if($this->session->has_userdata('addOffer')){ ?>
                <div class="alert alert-danger">
                    <?= $this->session->addOffer; ?>
                </div>
            <?php } ?>
            <div class="col-sm-12">
                <div class="row">
                <header class="clearbottom" style="margin-left: 0 !important;">EDYTUJ OFERTĘ</header>
                <form action=<?= base_url().'edytuj' ?> method="POST">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-title" class="storeLabel">Tytuł oferty:</label>
                                <input type="text" class="form-control" id="offerTitle" placeholder="np. Rękawice Everlast (16oz)" name="offerTitle" value='<?= $offer->title ?>' >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-subcategory" class="storeLabel">Podkategoria:</label>
                                <select class="form-control" id="offerSubCategory" name="offerSubCategory">
                                    <?php foreach($subcategories->result() as $subcategory){ ?>
                                    <?php if($offer->subcategory == $subcategory->subcategory){ ?>
                                        <option selected value=<?= $subcategory->subcategory ?>><?= $subcategory->subcategory ?></option>
                                    <?php }else{ ?>
                                        <option value=<?= $subcategory->subcategory ?>><?= $subcategory->subcategory ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-price" class="storeLabel">Cena:</label>
                                <input type="text" class="form-control" id="offerPrice" placeholder="Bez waluty, po prostu liczba" name="offerPrice" value=<?= $offer->current_price ?>>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-photo" class="storeLabel">Link do zdjęcia:</label>
                                <input type="text" class="form-control" id="offerPhoto" placeholder="Link z dowolnego hostingu" name="offerPhoto" value='<?= $offer->photo ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-photo" class="storeLabel">Ilość produktów w magazynie:</label>
                                <input type="text" class="form-control" id="offerQuantity" placeholder="np. 30" name="offerQuantity" value='<?= $quantity ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <label for="offer-description" class="storeLabel">Szczegółowy opis produktu:</label>
                                <textarea id="offerDescription" name="offerDescription" value=<?= $offer->description ?> ></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="offer_id" value=<?= $offer_id ?>>
                    <input type="submit" class="btn btn-primary marginTop" value="Zapisz zmiany">
                </form>
                <button class="btn btn-primary marginTop" onclick="testVal()">Sprawdź wygląd oferty</button>
                </div>
            </div>
                <div class="showOfferView">
                <header style="border-bottom: none; padding-left: 10px;" id="offerTitleEx">Tytuł</header>
                <div class="col-sm-5 product-photo">
                    <div class="offerPhoto">
                        <img src="http://image.ceneo.pl/data/products/31635712/i-everlast-profesjonalne-rekawice-bokserskie-141-black.jpg" width="100%" alt="Example photo">
                    </div>
                    <div class="product-photo-list">
                        <div class="product-photo-list-element paddingright">
                            <img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
                        </div>
                        <div class="product-photo-list-element paddingright">
                            <img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
                        </div>
                        <div class="product-photo-list-element paddingright">
                            <img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
                        </div>
                        <div class="product-photo-list-element paddingright">
                            <img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
                        </div>
                        <div class="product-photo-list-element paddingleft">
                            <img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                <div class="col-sm-7 product-data">
                    <div class="well">
                        <center><h2><div class="offerPrice">0 PLN</div></h2></center>
 
                                <div class="cart-flex">
                                    <i class="material-icons icon-large">add_shopping_cart</i>
                                    <form>
                                        <input type="text" name="quantity" class="cart-quantity form-control" value="1"></input><br><br>
                                        <input type="submit" class="btn btn-primary" value="+"></input>
                                   </form>
                                <div style="clear: both;"></div>
                         </div>

                         <div class="offerDescription"></div>   
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>