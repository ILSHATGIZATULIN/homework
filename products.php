<?php
// [Название, Цена, Описание]
$products = [
    [0 => 'Шапка мужская', 1 => 100, 2 => 'Крутая шапка'],
    ['Штаны женские', 100, 'Стильные штаны'],
    ['Мяч волейбольный', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, soluta?'],
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
