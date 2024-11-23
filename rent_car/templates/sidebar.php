<div id="sidebar">
                <div id="list-car-class">
                    <h2>Выбор авто:</h2>
                        <div class="btn-classes">
                            <form action="index.php" method="get">
                            <button id="btn-class" type="submit" name="class" value="1">Эконом класс</button>
                            <button id="btn-class">Средний класс</button>
                            <button id="btn-class">Премиум класс</button>
                            </form>
                        </div>
                </div>

                <div id="search-panel">
                    <h2>Поиск:</h2>
                    <div class="search-panel-content">
                        <div class="brand-cell">
                            <p>Марка:</p>
                            <div class="dropdown">
                                <div class="brand-choose">
                                    <button class="dropbtn">Выбрать...</button>
                                    <div class="dropdown-content">
                                        <a href="#">Марка 1</a>
                                        <a href="#">Марка 2</a>
                                        <a href="#">Марка 3</a>
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="search-panel-year">
                            <p>Год:</p>
                            <input class="input-year" type="text" name="year" placeholder="Год">
                        </div>
                        <div class="search-panel-price">
                            <p>Стоимость: </p>
                            <input class="input-price-at" type="text" name="price-at" placeholder="от">
                            <input class="input-price-from" type="text" name="price-from" placeholder="до">
                        </div>
                        <button class="btn-accept">Поиск</button>
                    </div>
                    

                </div>
            </div>