<?php
// [Название, Цена, Описание]
$products = [
    [0 => 'Шапка мужская', 1 => 100, 2 => 'Крутая шапка','2.jpg',],
    ['Штаны женские', 100, 'Стильные штаны','3.jpg'],
    ['Мяч волейбольный', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, soluta?','https://pi2.lmcdn.ru/product/H/R/HR001AMSRS39_4790583_3_v1.jpg','https://www.lamoda.ru/p/vi060awkgl64/shoes-vitacci-tufli/'],
    ['Джинсы', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'],
    ['Футболка', 100, 'Lorem ipsum'],
];


//    echo '<pre>';
//    var_dump($products[0]);
//    exit();



/**
 * Возвращает название товара
 *
 * @param $product
 * @return mixed
 */
function getName($product)
{
    return $product[0];
}
/**
 * Возвращает цену товара
 *
 * @param $product
 * @return mixed
 */
function getPrice($product)
{
    return $product[1];
}
/**
 * Возвращает описание товара
 *
 * @param $product
 * @return mixed
 */
function getDescription($product)
{
    return $product[2];
}

/**
 * Возвращает ссылку к картинке
 *
 * @param $product
 * @return mixed
 */

function getimage($product)
{
    return $product [3];

}

function getlink($product)
{
    return $product [4];
}

$products_new =[
    [
    'name' => 'название1',
    'price' => 100 ,
    'description' => 'lorem lorem',
    'image' => '1.png.jpg',
    'link'  => 'https://google.com',
        'colors' => [ 'синий','желтый', 'розовый']
],
    [
    'name' => 'название2',
    'price' => 200,
    'description' => 'lorem lorem',
    'image' => '2.jpg',
    'link'  => 'http://yandex.ru',
        'colors' => [ 'белый','красный', 'черный'],
  ],
];