<?php 
// =====================================================
// portfilop.php - публичная страница портфолио пользователя
// Открывается по ссылке: web.218.ymk89.ru/portfilop.php
// =====================================================

require "BD.php";

// Получаем id пользователя из адресной строки
// Например: web.218.ymk89.ru/portfilop.php?id=2 == $_GET['id'] == 2
// (int) - приводим к числу, чтобы защититься от взлома
$userID = (int)($_GET['id']);

if ($userID === 0) {
    header("Location: index.php");
    exit();
}

// =====================================================
// Загружаем данные из таблицы portfolio
// =====================================================
$stmt = $pdo->prepare("SELECT * FROM portfolio WHERE user_id = :zon_uid"); // prepare() - подготавливает запрос к выполнению
$stmt->execute([':zon_uid' => $userID]);// Подставляем реальные знчаение вместо параметров
$portfolio = $stmt->fetch(PDO::FETCH_ASSOC);// fetch() - достает одну строку из результата поиска
if(!$portfolio) $portfolio = []; // если нет записи (первый раз пользователь заходит в ЛК) - пустой массив, чтобы не было ошибок

echo '<pre>' . print_r($portfolio, 1) . '</pre>';


// =====================================================
// Загружаем данные из таблицы skills
// =====================================================
$stmt = $pdo->prepare("SELECT * FROM skills WHERE user_id = :zon_uid"); // prepare() - подготавливает запрос к выполнению
$stmt->execute([':zon_uid' => $userID]);// Подставляем реальные знчаение вместо параметров
$skills = $stmt->fetchAll(PDO::FETCH_ASSOC);// fetchAll() - все строки сразу
if(!$skills) $skills = []; // если нет записи (первый раз пользователь заходит в ЛК) - пустой массив, чтобы не было ошибок
echo '<pre>' . print_r($skills, 1) . '</pre>';

// =====================================================
// Загружаем данные из таблицы users
// =====================================================
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :zon_uid"); // prepare() - подготавливает запрос к выполнению
$stmt->execute([':zon_uid' => $userID]);// Подставляем реальные знчаение вместо параметров
$user = $stmt->fetch(PDO::FETCH_ASSOC);// fetchAll() - все строки сразу
if(!$user) $user = []; // если нет записи (первый раз пользователь заходит в ЛК) - пустой массив, чтобы не было ошибок
echo '<pre>' . print_r($user, 1) . '</pre>';

// =====================================================
// Загружаем данные из таблицы education
// =====================================================
$stmt = $pdo->prepare("SELECT * FROM education WHERE user_id = :zon_uid"); // prepare() - подготавливает запрос к выполнению
$stmt->execute([':zon_uid' => $userID]);// Подставляем реальные знчаение вместо параметров
$education = $stmt->fetch(PDO::FETCH_ASSOC);// fetchAll() - все строки сразу
if(!$education) $education = []; // если нет записи (первый раз пользователь заходит в ЛК) - пустой массив, чтобы не было ошибок
echo '<pre>' . print_r($education, 1) . '</pre>';


// =====================================================
// Загружаем данные из таблицы projects
// =====================================================
$stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = :zon_uid"); // prepare() - подготавливает запрос к выполнению
$stmt->execute([':zon_uid' => $userID]);// Подставляем реальные знчаение вместо параметров
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);// fetchAll() - все строки сразу
if(!$projects) $projects = []; // если нет записи (первый раз пользователь заходит в ЛК) - пустой массив, чтобы не было ошибок
echo '<pre>' . print_r($projects, 1) . '</pre>';




// Короткие переменные для удобства вывода в HTML
// ?? '' - если поле пустое/null, поставим свое значение
$name       = $portfolio['full_name']  ?? 'Неопознаный пользователь';
$profession = $portfolio['profession'] ?? 'Не заполнена';
$city       = $portfolio['city']       ?? 'Не известно';
$phone      = $portfolio['phone']      ?? 'Не известно';
$telegram   = $portfolio['telegram']   ?? '@null';
$Ghub       = $portfolio['github']     ?? 'https://null';
$mail       = $user['email']           ?? 'Отсутствует';
$about      = $portfolio['about']      ?? 'Раздел "О себе не заполнен';


$start      = $education['start_date'] ?? 'Раздел  не заполнен';
$end        = $education['end_date'] ?? 'Раздел  не заполнен';
$faculty    = $education['faculty'] ?? 'Раздел не заполнен';
$speciality = $education['specialty'] ?? 'Раздел не заполнен';
$form_study = $education['study_form'] ?? 'Раздел не заполнен';
$achievments= $education['achievments'] ?? 'Раздел не заполнен';
$additional = $education['additional'] ?? 'Раздел не заполнен';

$name_project=$projects['project_name']?? 'Раздел не заполнен';
$project_link=$projects['project_link']?? 'Раздел не заполнен';
$pr_description=$projects['description']?? 'Раздел не заполнен';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">
    <!-- Шрифты -->
</head>
<body>
    
    <section class="hero">
        <!-- Аватар -->
        <div class="avatar"><?php echo mb_substr($name, 0, 1) ?></div>
        <!-- Имя пользователя -->
        <h1><span><?php echo $name ?></span></h1>
        <!-- Профессия -->
        <div class="profession"><?php echo $profession ?></div>
        <!-- Город -->
        <div class="location"><?php echo $city ?></div>
    </section>

    <div class="container">
        <!-- Левая колонка -->
        <div class="main-content">

            <!-- КАРТОЧКА: О СЕБЕ -->
            <div class="card">
                <div class="section-label" style='font-size:15px'>О себе</div>
                <p class="about-text"><?php echo $about ?></p>
                <!-- <p class="empty">Раздел "О себе не заполнен"</p> -->
            </div>

            <!-- КАРТОЧКА НАВЫКИ -->
            <div class="card">
                <div class="section-label" style='font-size:15px'>Навыки</div>
                <!-- сам навык -->

                <?php if (empty($skills)): ?>
                      <p class="empty">Навыков не нашлось!</p>
                <?php else: ?>
                        <?php foreach ($skills as $el): ?>
                                <div class="skill-item">
                                    <div class="skill-header">
                                        <span><?= $el['skill_name'] ?></span>
                                        <span><?= $el['level'] ?></span>
                                    </div>
                                    <div class="skill-bar-bg">
                                        <div class="skill-bar-fill" style="width: <?= $el['level'] ?>%"></div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                <?php endif; ?>

                
            </div>
            <div class="card">
                <div class="section-label" style='font-size:15px'>Мои проекты</div>
            <?php if (empty($projects)): ?>
                <div class="section-label" style='font-size:15px'>Проектов нет</div>
            <?php else: ?>
                <?php foreach ($projects as $el_project):?>
                    <span class="section-label">Проект:</span><span class="about-text"><?= $el_project['project_name'] ?></span>
                    <div></div>
                    <span class="section-label">Ссылка на проект:</span><a class="about-text" href='<?= $el_project['project_link']?>'><?= $el_project['project_link']?></a>
                    <div></div>
                    <span class="section-label">Описание проекта:</span><span class="about-text"><?= $el_project['description'] ?></span>
                    <hr>     
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
        
        <!-- Правая колонка -->
        <div class="sidebar">
            <div class="card">
                <div class="section-label" style='font-size:15px'>Контакты</div>
                <!-- Телефон -->
                <div class="contact-item">
                    <div class="contact-icon">📞</div>
                    <div>
                        <div class="contact-label">Телефон</div>
                        <div class="contact-value">
                            <a href=""><?php echo $phone ?></a>
                        </div>
                    </div>
                </div>
                <!-- Телеграмм -->
                <div class="contact-item">
                    <div class="contact-icon">✈️</div>
                    <div>
                        <div class="contact-label">Telegram</div>
                        <div class="contact-value">
                            <a href=""><?php echo $telegram ?></a>
                        </div>
                    </div>
                </div>
                <!-- Ссылка GitHub -->
                <div class="contact-item">
                    <div class="contact-icon">🐙</div>
                    <div>
                        <div class="contact-label">GitHub</div>
                        <div class="contact-value">
                            <a href=""><?php echo $Ghub ?></a>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="contact-item">
                    <div class="contact-icon">📧</div>
                    <div>
                        <div class="contact-label">Email</div>
                        <div class="contact-value">
                            <a href=""><?php echo $mail ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="section-label" style='font-size:15px'>Образование</div>
                <div class="contact-label">Дата начала обучения</div>
                <p class="about-text"><?php echo $start; ?></p>
                <div class="contact-label">Дата конца оубчения</div>
                <p class="about-text"><?php echo $end ?></p>
                <div class="contact-label">Факультет</div>
                <p class="about-text"><?php echo $faculty ?></p>
                <div class="contact-label">Специальность</div>
                <p class="about-text"><?php echo $speciality ?></p>
                <div class="contact-label">Форма обучения</div>
                <p class="about-text"><?php echo $form_study ?></p>
                <div class="contact-label">Достижения</div>
                <p class="about-text"><?php echo $achievments ?></p>
                <div class="contact-label">Дополнительно</div>
                <p class="about-text"><?php echo $additional ?></p>
                <!-- <p class="empty">Раздел "О себе не заполнен"</p> -->
            </div>
            

            <button id="sb" class="share-btn" onclick="copyLink()">
                🔗 Скопировать ссылку на портфолио
            </button>
        </div> <!-- /sidebar (правая колонка) -->   
    </div> <!-- /container -->
    

    <div class="footer">
        Портфолио создано с помощью Porfolio System. При поддержки группы 23ИСиП
    </div>



    <script>
        function copyLink() {
            navigator.clipboard.writeText(window.location.href);
            let btn = document.getElementById('sb');
            btn.textContent = "Скопировано!";
            btn.classList.add('success');
            setTimeout(()=>{
                btn.textContent = "🔗 Скопировать ссылку на портфолио";
                btn.classList.remove('success');
            }, 2000)
        }
    </script>
</body>
</html>