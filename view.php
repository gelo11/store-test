<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="windows-1251">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $result['name']; ?></title>
        <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="/site.css" rel="stylesheet"></head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br><br>
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tovar_id" placeholder="Поиск по артикулю">
                        </div>
                        <button type="submit" class="btn btn-success">Найти</button>
                    </form>
                </div>
            </div>
            <?php if(empty($result)) : ?>
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header text-danger">Артикул товара указан неверно!</h1>
                </div>
            </div>
            <?php else : ?>
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header"><?php echo $result['name']; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">

                    <div id="carousel-tovar" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-tovar" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-tovar" data-slide-to="1"></li>
                            <li data-target="#carousel-tovar" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $items = [
                                ['url' => 'http://kgmart.ru/tovar/tovar_data/big_' . $result['id'] . '.jpg', 'alt' => $result['name'], 'title' => ''],
                                ['url' => 'http://kgmart.ru/tovar/tovar_data/big_' . $result['id'] . '_2.jpg', 'alt' => $result['name'], 'title' => ''],
                                ['url' => 'http://kgmart.ru/tovar/tovar_data/big_' . $result['id'] . '_3.jpg', 'alt' => $result['name'], 'title' => ''],
                                    ]
                            ?>
                            <?php foreach ($items as $k => $item) : ?>
                                <div class="item<?php echo $k == 0 ? ' active' : ''; ?>">
                                    <img src="<?php echo $item['url']; ?>" alt="<?php echo $item['url']; ?>">
                                    <?php if (!empty($item['title'])) : ?>
                                        <div class="carousel-caption">
                                            <?php echo $item['title']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-8">
                    <p>Артикул: <span class="text-muted"><?php echo $result['id']; ?></span></p>
                    <hr>
                    <p><?php echo $result['hide_sost'] == 0 ? 'Нет в наличии' : 'В наличии'; ?> </p>
                    <hr>
                    <p>Цвет: <?php echo implode(', ', $colors); ?>
                    </p>
                    <hr>
                    <p>Количество в ЛР: <span class="text-muted"><?php echo $result['num_lr']; ?> шт.</span></p>
                    <hr>
                    <p>Средний вес в ЛР: <span class="text-muted"><?php echo $result['ves']; ?> гр.</span></p>
                    <hr>
                    <p>Описание: </p>
                    <p><?php echo $result['about']; ?></p>
                    <hr>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>