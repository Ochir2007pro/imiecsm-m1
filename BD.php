<?php
// ==========================================
// это файл подключения к базе данных MYsql
// файл юудем подчключать в другие файлы через reauire
// ==========================================

//настройки
$host='localhost';
$dbname='drxaevbj_m1';
$username='drxaevbj';
$password='Rb73D4';


//пробуем подчключиться к базе данных через PDO
//PDO - это удобный способ работы с БД в PHP

try{
    //создаем подключение к PDO
    $pdo=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
    //включаем режим ошибок - PDO будет кидать исключения при ошибках
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //сообщение об успешном подключении
    //echo '<div class="alert alert-success">Подключение к базе данных успешно установлено</div>';

}catch(PDOException $e){
    die('<div class="alert alert-danger">Ошибка подлкючения к БД:'. $e->geyMessege() .'</div>');
}