<?php
    //подчклюение к базе данных
    require "BD.php";
    //переменная для хранения сообщения об ошибке
    $error='';
    $msg='';

    //Проверяем была ли отправлена форма(нажати ли кнопка войти)
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $login = $_POST['loginget'];
        $password = $_POST['getpassword'];


        //готовим sql запрос для поиска пользовтеля пол логину и паролю
        //:login и password - именовыванные параметры(защита от sql иньекции)
        $sql="SELECT * FROM users WHERE login= :login AND password=:password";

        //prepare()-подготавливает запрос к выполнению
        $stmt=$pdo->prepare($sql);

        //подастваляем реальные значения вместо парамтеров
        $stmt->execute([':login'=>$login,':password'=>$password]);
        //fetch - дсотает одну строку из результата поиска
        //если пользователь найден в переменной $user будет массив с его данными
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
            $msg='вы успешно авторизованы';
            //делаем пауза на 2 секунлы что бы пользователь увидел это
            //sleep(2);

            session_start();
            $_SESSION['user_login']=$user['login'];
            $_SESSION['user_id']=$user['id'];
            // перенеаправляем пользователя на страницу админ панели
            header('Location:adminpanel.php');
            //останавливаем вполнение скрипта после редирект
            exit();
        }else{
            $error='не верный логин или пароль';
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel='stylesheet' href='Bootstrap\bootstrap.css'>
</head>
<body class='bg-light container d-flex justify-content-center align-items-center flex-column' style='min-height 100vh;'>
    <div class='card p-4 shadow' style='width:400px'>
        <!-- Заголовок формы -->
        <h3 class='text-center mb-4'>Вход в систему</h3>
        <?php  if($error):?>
            <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
        <?php  endif;?>


        <?php  if($msg):?>
            <div class="alert alert-success" role="alert"><?php echo $msg;?></div>
        <?php  endif;?>

        <!-- форма авторизации -->
        <form method='POST' action='index.php'>
            <!-- поле для логина -->
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" placeholder='Введите логин' name="loginget">
            </div>
            <!-- поле для пароля -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder='Введите пароль' name="getpassword">
            </div>
            <!-- кнопка отправки формы -->
            <button type="submit" class="btn btn-primary w-100">Введите</button>
        </form>
        <a href='adminpanel.php'>Страница админ-панели</a>
    </div>
    <form>
    <script scr='Bootstrap\bootsctrap.js'></script>
</body>
</html>