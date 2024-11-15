<?php 

include('../../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <title>PragueFlow</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel="stylesheet" href="./style.css">

</head>

<body>
  <!-- partial:index.partial.html -->

  <body>

    <nav class="Navbar">
      <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
        data-target="#navbarCollapse"><span></span></a>

      <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

      <div id="navbarCollapse" class="Navbar-menu">

      </div>

      <ul class="Navbar-quickLinks">

      </ul>
    </nav>

    <div id="main">
      <div class="view-container">
        <div class="navigation">
          <div class="arrow_back" style="font-size: 28px; "><i class="uil uil-arrow-left"></i></div>
          <div class="header">Prague Flow 🇨🇿 | Знакомства в Праге <i class="uil uil-check-circle"
              style=" font-size: 20px; "></i></div>
          <div class="subtext">∞ Посты</div>
        </div>
        <div class="wallpaper">
        </div>
        <div class="bio">

          <div class="pre-bio">
            <div class="pfp"></div>

            <div class="btn" onclick="javascript:location.href='https://t.me/pragueflow_chat/'"><i
                class="uil uil-telegram-alt"></i> Telegram</div>
          </div>

          <div>
            <div class="header">Prague Flow 🇨🇿 | Знакомства в Праге <i class="uil uil-check-circle"
                style=" font-size: 20px; "></i></div>
            <div class="subtext">TG: @pragueflow</div>
          </div>

          <div>
            🚀 🇨🇿 Дружба и общение русскоязычных жителей Праги и Чехии
            <br><br>
            Тексты и фото присылать 👉 <a href="https://t.me/Ksenia97_uwu">[Админ]</a> или
            скоро можно будет публиковать прямо на <a href="https://aliev.io/page/services/pragueflow/">сайте</a>.
            <br><br>
            Автор анонимный, ответы и реакции в комментариях 💬
            <br><br>
            Также Вы можете писать в живом чате t.me/pragueflow_chat
            <br><br>
            <i class="uil uil-user-exclamation"></i> Админ <a href="https://t.me/Ksenia97_uwu">@Ksenia97_uwu</a>, <a
              href="https://t.me/emirmain">@emirmain</a>
          </div>
          <div><a href="https://t.me/pragueflow_chat/">t.me/pragueflow_chat/</a>
            <span class="secondary">Подпишитесь!</span></div>

          <div>
            ∞ <span class="secondary">Following</span>
            ∞ <span class="secondary">Followers</span>
          </div>
        </div>

        <div class="tabs">
          <div class="selected">Главное</div>
          <div>Посты и ответы</div>
          <div>Медиа</div>
          <div>Лайки</div>
        </div>

        <button class="post-btn" onclick="javascript:location.href='https://t.me/Ksenia97_uwu'"><i
            class="uil uil-comment"></i> Предложить новость</button>

        <div class="button-container">
          <button class="toggle-button" onclick="toggleContent('content1')">
            <div class="button-content">
              <img src="./rules.png" alt="Button Image" class="button-image">
              <span class="button-text">Правила</span>
            </div>
          </button>
          <button class="toggle-button" onclick="toggleContent('content2')">
            <div class="button-content">
              <img src="./recommendation.png" alt="Button Image" class="button-image">
              <span class="button-text">Рекомендации</span>
            </div>
          </button>
          <button class="toggle-button" onclick="toggleContent('content3')">
            <div class="button-content">
              <img src="./hashtag.png" alt="Button Image" class="button-image">
              <span class="button-text">Хэштеги</span>
            </div>
          </button>
          <button class="toggle-button" onclick="toggleContent('content4')">
            <div class="button-content">
              <img src="./bulb.png" alt="Button Image" class="button-image">
              <span class="button-text">Полезное</span>
            </div>
          </button>
        </div>

        <div class="content-container">
          <div id="content1" class="content">
            <div class="post">
              <div class="post__header">
                <div class="post__autorAvatar"></div>
                <div class="post__meta">
                  <div class="post__autorName">Prague Flow 🇨🇿 | Знакомства в Праге</div>
                  <div class="post__time">час назад</div>
                </div>
              </div>
              <div class="post__content">
                <div class="post__title">
                  <h1>Публикация постов</h1>
                  <p>Посты присылаются через функцию "Предложить новость".</p> <br><br>
                  <p>Мы <strong>НЕ</strong> публикуем ссылки, <strong>НЕ</strong> открываем комментарии и ни при каких
                    обстоятельствах <strong>НЕ</strong> сообщаем третьим лицам имя автора поста. Единственный способ
                    связаться с автором поста - поставить лайк и дождаться, чтобы он написал вам самостоятельно.</p>
                  <br><br>
                  <p><strong>❗ Для публикации вашей записи, ваш пост <strong>ОБЯЗАТЕЛЬНО</strong> должен содержать
                      <strong>ВСЕ ТРИ</strong> пункта:</strong></p>
                  <ul>
                    <li>Как минимум 1 ХЕШТЕГ из этой темы - <a onclick="toggleContent('content3')">Хэштеги</a></li>
                    <li>ТЕКСТ о том кто вы и кого вы ищите</li>
                    <li>Вашу фотографию или хоть какую-то КАРТИНКУ</li>
                  </ul><br><br>

                  <p><strong>❗ Публикация постов осуществляется через 12-36 часов с того момента, как вы прислали вашу
                      запись через функцию "Предложить новость". Если вы предложили свою новость, но через какое-то
                      время она пропала - это еще не значит, что она была удалена и не будет опубликована. Скорее всего
                      она была поставлена на таймер и через определенное время появится в ленте паблика.</strong></p>
                  <br><br>
                  <p><strong>❗ В случае, если вы прислали пост через функцию "Предложить новость", но не прикрепили к
                      нему картинку или фотографию, администрация паблика оставляет за собой право прикрепить к посту
                      ваш аватар Вконтакте (актуальный или один из предыдущих). Если аватар на странице автора
                      отсутствует или модератор сочтет это неуместным, пост будет отклонен.</strong></p><br><br>
                  <p><strong>❗ В нашем паблике <strong>ЗАПРЕЩЕНА</strong> любая реклама. За попытки разместить рекламные
                      посты под видом постов для поиска новых знакомств - бессрочная блокировка.</strong></p><br><br>
                  <br><br> *** <br><br>
                  <p>Модератор оставляет за собой право отклонить вашу новость или заблокировать любого пользователя без
                    указания причины.</p><br><br>
                  <p>Если вы хотите связаться с администрацией паблика, пришлите ваше сообщение через функцию
                    "Предложить новость". Если это будет необходимо, администратор свяжется с вами через личные
                    сообщение (если они, конечно, будут открыты на вашей странице).</p><br><br>

                </div>
                <div class="post__link" style="display: none;">
                  <img class="post__img" src="#">
                  <div class="post__caption caption">
                    <div class="caption__title">1222 рубля для моих друзей!</div>
                    <div class="caption__link">share.flocktory.com</div>
                  </div>
                </div>
              </div>
              <div class="post__share share">
                <div class="share__like">Нравится</div>
                <div class="share__comment">Комментировать</div>
                <div class="share__share"></div>
                <div class="share__view">1</div>
              </div>
            </div>
          </div>
        </div>
        <div id="content2" class="content">
          <div class="post">
            <div class="post__header">
              <div class="post__autorAvatar"></div>
              <div class="post__meta">
                <div class="post__autorName">Prague Flow 🇨🇿 | Знакомства в Праге</div>
                <div class="post__time">час назад</div>
              </div>
            </div>
            <div class="post__content">
              <div class="post__title">
                <p>Уважаемые читатели,</p><br><br>
                <p>Мы рады сообщить, что в настоящее время мы работаем над новым материалом, который скоро будет готов.
                  Пожалуйста, проявите немного терпения, и скоро вы сможете наслаждаться свежим и увлекательным
                  контентом.</p><br><br>
                <p>С уважением, PragueFlow</p>
              </div>
              <div class="post__link" style="display: none;">
                <img class="post__img" src="#">
                <div class="post__caption caption">
                  <div class="caption__title">1222 рубля для моих друзей!</div>
                  <div class="caption__link">share.flocktory.com</div>
                </div>
              </div>
            </div>
            <div class="post__share share">
              <div class="share__like">Нравится</div>
              <div class="share__comment">Комментировать</div>
              <div class="share__share"></div>
              <div class="share__view">1</div>
            </div>
          </div>
        </div>
      </div>
      <div id="content3" class="content">
        <div class="post">
          <div class="post__header">
            <div class="post__autorAvatar"></div>
            <div class="post__meta">
              <div class="post__autorName">Prague Flow 🇨🇿 | Знакомства в Праге</div>
              <div class="post__time">час назад</div>
            </div>
          </div>
          <div class="post__content">
            <div class="post__title">
              <h1>Hashtags Guide</h1>
              <p>Для публикации вашего поста, вы <strong>ОБЯЗАТЕЛЬНО</strong> должны указать в нем один из
                нижепредставленных
                хэштегов.</p>
              <ul>
                <li><span class="hashtag">#познакомлюсь@pragueflow</span> - поиск друзей и новых знакомств</li>
                <li><span class="hashtag">#девушки_only@pragueflow</span> - хэштег только для девушек, которые хотят
                  общаться только с
                  девушками</li>
                <li><span class="hashtag">#идея@pragueflow</span> - хэштег для тех, кто ищет единомышленников для
                  какого-то проекта
                </li>
                <li><span class="hashtag">#учеба@pragueflow</span> - совместное изучение языков, точных наук,
                  безвозмездная помощь в
                  учебе и тд.</li>
                <li><span class="hashtag">#спорт@pragueflow</span> - совместные занятия спортом и активный образ
                  жизни
                </li>
                <li><span class="hashtag">#путешествие@pragueflow</span> - поиск попутчиков, совместные поездки</li>
                <li><span class="hashtag">#мероприятие@pragueflow</span> - походы в клубы, бары, рестораны и тд.
                </li>
                <li><span class="hashtag">#кино@pragueflow</span> - для тех, кто ищет компанию для походов в кино
                </li>
                <li><span class="hashtag">#музыка@pragueflow</span> - посты, посвященные музыке</li>
                <li><span class="hashtag">#танцы@pragueflow</span> - совместные занятия танцами</li>
                <li><span class="hashtag">#фото@pragueflow</span> - бесплатная фото-видео съемка</li>
                <li><span class="hashtag">#тату@pragueflow</span> - объявление о татуировках бесплатно, free price
                  или
                  за расходники
                </li>
                <li><span class="hashtag">#летсплэй@pragueflow</span> - поиск тиммейтов для онлайн игр</li>
                <li><span class="hashtag">#игры@pragueflow</span> - квесты и настольные игры</li>
                <li><span class="hashtag">#соседи@pragueflow</span> - поиск соседей для совместной аренды квартиры
                  (обязательное
                  условие - подробно рассказать о себе и о требованиях к будущим соседям)</li>
                <li><span class="hashtag">#поиск@pragueflow</span> - поиск кого либо</li>
                <li><span class="hashtag">#остальное@pragueflow</span> - всё не из вышеупомянутого (выгуливание псов
                  -
                  всё сюда)</li>
              </ul>
            </div>
            <div class="post__link" style="display: none;">
              <img class="post__img" src="#">
              <div class="post__caption caption">
                <div class="caption__title">1222 рубля для моих друзей!</div>
                <div class="caption__link">share.flocktory.com</div>
              </div>
            </div>
          </div>
          <div class="post__share share">
            <div class="share__like">Нравится</div>
            <div class="share__comment">Комментировать</div>
            <div class="share__share"></div>
            <div class="share__view">1</div>
          </div>
        </div>
      </div>
      <div id="content4" class="content">
        <div class="post">
          <div class="post__header">
            <div class="post__autorAvatar"></div>
            <div class="post__meta">
              <div class="post__autorName">Prague Flow 🇨🇿 | Знакомства в Праге</div>
              <div class="post__time">час назад</div>
            </div>
          </div>
          <div class="post__content">
            <div class="post__title">
              <p>Уважаемые читатели,</p><br><br>
              <p>Мы рады сообщить, что в настоящее время мы работаем над новым материалом, который скоро будет готов.
                Пожалуйста, проявите немного терпения, и скоро вы сможете наслаждаться свежим и увлекательным контентом.
              </p><br><br>
              <p>С уважением, PragueFlow</p>
            </div>
            <div class="post__link" style="display: none;">
              <img class="post__img" src="#">
              <div class="post__caption caption">
                <div class="caption__title">1222 рубля для моих друзей!</div>
                <div class="caption__link">share.flocktory.com</div>
              </div>
            </div>
          </div>
          <div class="post__share share">
            <div class="share__like">Нравится</div>
            <div class="share__comment">Комментировать</div>
            <div class="share__share"></div>
            <div class="share__view">1</div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    </main>

  </body>
  <!-- partial -->
  <script src="./script.js"></script>

</body>

</html>