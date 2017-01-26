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
             <header class="clearbottom paddingleft">DODAJ OFERTĘ</header>
            <div class="col-sm-12">
                <form action=<?= base_url().'dodaj' ?> method="POST">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-title" class="storeLabel">Tytuł oferty:</label>
                                <input type="text" class="form-control" id="offerTitle" placeholder="np. Rękawice Everlast (16oz)" name="offerTitle">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-category" class="storeLabel">Kategoria:</label>
                                <select class="form-control" id="offerCategory" name="offerCategory">
                                    <option value="obrona">Ochrona</option>
                                    <option value="trening">Trening</option>
                                    <option value="obuwie">Obuwie</option>
                                    <option value="ciuchy">Odzież</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                           <div class="col-sm-6">
                                <label for="offer-subcategory" class="storeLabel">Podkategoria:</label>
                                <select class="form-control" id="offerSubCategory" name="offerSubCategory">
                                    <option>====OCHRONA====</option>
                                    <option value="szczęki">Szczęki bokserskie</option>
                                    <option value="suspensory">Suspensory</option>
                                    <option value="piszczele">Ochrona piszczeli</option>
                                    <option value="kolana">Ochrona kolan</option>
                                    <option>====TRENING====</option>
                                    <option value="rękawice">Rękawice bokserskie</option>
                                    <option value="skakanki">Skakanki</option> 
                                    <option>====OBUWIE====</option>
                                    <option value="buty bokserskie">Buty bokserskie</option>
                                    <option value="skarpety bokserskie">Skarpety bokserskie</option> 
                                    <option>====ODZIEŻ====</option>
                                    <option value="bluzy">Bluzy</option>
                                    <option value="czapki">Czapki</option>
                                    <option value="rushguardy">Rushguardy</option>  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-price" class="storeLabel">Cena:</label>
                                <input type="text" class="form-control" id="offerPrice" placeholder="Bez waluty, po prostu liczba" name="offerPrice">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-photo" class="storeLabel">Link do zdjęcia:</label>
                                <input type="text" class="form-control" id="offerPhoto" placeholder="Link z dowolnego hostingu" name="offerPhoto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="offer-photo" class="storeLabel">Ilość produktów w magazynie:</label>
                                <input type="text" class="form-control" id="offerQuantity" placeholder="np. 30" name="offerQuantity">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <label for="offer-description" class="storeLabel">Szczegółowy opis produktu:</label>
                                <textarea id="offerDescription" name="offerDescription"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary marginTop" value="Wystaw ofertę">
                </form>
                <button class="btn btn-primary marginTop" onclick="testVal()">Sprawdź wygląd oferty</button>
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