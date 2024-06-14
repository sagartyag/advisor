





<!DOCTYPE html>
<html lang="ru" class="page">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/static/favicon.svg"
      type="image/svg+xml">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <title>Excelsior</title>
    <link rel="preload" href="/static/fonts/Rubik-Regular.woff2"
      as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/static/fonts/Rubik-Medium.woff2" as="font"
      type="font/woff2" crossorigin>
    <link rel="preload" href="/static/fonts/Rubik-SemiBold.woff2"
      as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/static/fonts/Rubik-ExtraBold.woff2"
      as="font" type="font/woff2" crossorigin>
    <script defer src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.3.7/photoswipe.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css">
    <link rel="stylesheet" href="/static/css/vendor.css">
    <link rel="stylesheet" href="/static/css/main.css">
      <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
      (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new Date();
      for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
      k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

      ym(93859314, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
      });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/93859314" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <script defer src="https://api-maps.yandex.ru/2.1/?apikey=2c4f3724-4040-4446-b44b-03a4f2d6c181&lang=ru_RU%22%3E"></script>
    <script type="module">
      import PhotoSwipeLightbox from 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.3.7/photoswipe-lightbox.esm.min.js';
      
      const lightbox = new PhotoSwipeLightbox({
        gallery: '[data-gallery]',
        children: 'a',
        showHideAnimationType: 'none',
        zoomAnimationDuration: false,
        pswpModule: () => import('https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.3.7/photoswipe.esm.min.js'),
        wheelToZoom: true,
        padding: { top: 25, bottom: 25, left: 25, right: 25 }
      });
      lightbox.init();
      $(document).ready(function(){
      
        if (document.querySelector('.cab-support__list')) {
          setInterval(function(){
            if (document.querySelectorAll('.cab-support__item').length > 0) {
              $( ".cab-support__list" ).load(window.location.href + " .cab-support__item" );
            }
          setTimeout(() => {
            lightbox.init();
            
            
          }, 500)
          }, 10000)
        }
        // if (document.querySelector('.cab-profile__notify-wrapper')) {
          
        //   setInterval(function(){
        //     $(".notify-list .simplebar-content").load(window.location.href + ' .notify-list__item' );
        //   }, 5000)
        // }
      })
    </script>
    <script defer src="/static/js/main.js"></script>
</head>

<body class="page__body" data-barba="wrapper">
  <div class="cab-container" data-barba="container" data-barba-namespace="home">
    <aside class="aside" data-menu data-simplebar data-blur>
  <a class="aside__logo" href="/">
    <img class="aside__logo-img" loading="lazy" src="/static/img/aside/aside-logo.svg" width="232" height="65" alt="Логотип проекта Excelsior">
  </a>

  <ul class="list-reset aside__list">
    <li class="aside__item">
      <a class="aside__item-link " href="/cab/profile/" >
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-1"></use>
          </svg>
        </div>
        <div class="aside__item-text">Профиль</div>
      </a>
    
    <li class="aside__item">
        <a class="aside__item-link " href="/cab/balance_up/">
          <div class="aside__item-icon">
            <svg>
              <use xlink:href="/static/img/sprite.svg#aside-icon-balance-up"></use>
            </svg>
          </div>
          <div class="aside__item-text">Пополнить баланс</div>
        </a>
      </li>
    </li>
    
    
    <li class="aside__item">
      <a class="aside__item-link aside__item-link--active " href="/cab/open_dep/">
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-2"></use>
          </svg>
        </div>
        <div class="aside__item-text">Открыть депозит</div>
      </a>
    </li>
    
    <li class="aside__item">
      <a class="aside__item-link " href="/cab/my_deposits/">
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-4"></use>
          </svg>
        </div>
        <div class="aside__item-text">Мои депозиты</div>
      </a>
    </li>
    
    <li class="aside__item">
      <a class="aside__item-link " href="/cab/money_receive/">
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-pay-out"></use>
          </svg>
        </div>
        <div class="aside__item-text">Вывод средств</div>
      </a>
    </li>
    
    <li class="aside__item">
      <a class="aside__item-link " href="/cab/operations/">
        
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-5"></use>
          </svg>
        </div>
        <div class="aside__item-text">Операции</div>
      </a>
    </li>
    <li class="aside__item">
      <a class="aside__item-link " href="/cab/refer/">
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-6"></use>
          </svg>
        </div>
        <div class="aside__item-text">Партнерская программа</div>
      </a>
    </li>
    
    <li class="aside__item aside__item--lock">
      <a class="aside__item-link">
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-7"></use>
          </svg>
        </div>
        <div class="aside__item-text">Поддержка</div>
      </a>
      <button class="btn-reset popup-inf">
        <img class="popup-inf__img" src="/static/img/cab-support/cab-support-lock.svg" width="24" height="24" alt="" aria-hidden="true">
        <div class="popup-inf__text">Для того, чтобы открыть поддержку, необходимо произвести любую транзакцию.</div>
      </button>
    </li>
    
    <li class="aside__item">
      <a class="aside__item-link " href="/cab/settings/">
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-8"></use>
          </svg>
        </div>
        <div class="aside__item-text">Настройки</div>
      </a>
    </li>
    <li class="aside__item">
      <a class="aside__item-link " href="/">
        <div class="aside__item-icon">
          <svg>
            <use xlink:href="/static/img/sprite.svg#aside-icon-9"></use>
          </svg>
        </div>
        <div class="aside__item-text">Выход</div>
      </a>
    </li>
  </ul>

  <div class="aside__copyright">
    <div class="aside__copyright-text">© 2023 Excelsior. Все права защищены</div>
  </div>
  </aside>

  <main class="main cab-container__main" data-blur>
      <section class="cab-profile">
        <div class="container cab-profile__content">
            <div class="cab-profile__header">
                <div class="cab-profile__user">
            rameshk
            <button class="burger cab-profile__burger cab-profile__burger--sm" aria-label="Открыть меню" aria-expanded="false" data-burger>
              <span class="burger__line"></span>
            </button>
            </div>
          <div class="cab-profile__other">  
            

            <div class="cab-profile__notify-wrapper cab-divider">
              <form method="POST" id="notify_button" > <input type="hidden" name="csrfmiddlewaretoken" value="dd7I7L8IQJhVLLsUwF4JytleqlhmXGsWxsdyVKq52lao7rNAesVa6IeGU9Tu4W4j">
                <input type="hidden" name="notify_read" value="1" >

                
                  <button type="button" class="btn-reset cab-profile__notify cab-profile__notify--grey">
                    <svg>
                      <use xlink:href="/static/img/sprite.svg#cab-profile-notify"></use>
                    </svg>
                  </button>
                
              

              <ul class="list-reset notify-list notify-list--cab  notify-list--empty  " data-simplebar data-notify-list>

                
                <h3 class="notify-list__item-descr">Уведомления отсутствуют</h3>
                
              </ul>
              </form>
            </div>
            <div class="cab-profile__balance cab-divider">
                <span class="cab-text">Баланс:</span>
                <span class="cab-text cab-text--bold">
                  0.00 ₽
                </span>
            </div>
            <button class="burger cab-profile__burger" aria-label="Открыть меню" aria-expanded="false" data-burger>
              <span class="burger__line"></span>
            </button>
          </div>
        </div>  
        
        <ul class="list-reset cab-profile__list">
          <li class="cab-profile__item cab-profile__item--1">
            <div class="cab-profile__item-content">
              <div class="cab-text">Всего:</div>
              <div class="cab-text">Сумма:</div>
            </div>
            <div class="cab-profile__item-content">
              <div class="cab-text cab-text--white cab-profile__text">Инвестиций</div>
              <div class="cab-text cab-text--white cab-profile__text">0.00₽</div>
            </div>
          </li>
          <li class="cab-profile__item cab-profile__item--2">
            <div class="cab-profile__item-content">
              <div class="cab-text cab-profile__text">Активных:</div>
              <div class="cab-text cab-profile__text">Сумма:</div>
            </div>
            <div class="cab-profile__item-content">
              <div class="cab-text cab-text--white cab-profile__text">Депозитов</div>
              <div class="cab-text cab-text--white cab-profile__text">0.00₽</div>
            </div>
          </li>
          <li class="cab-profile__item cab-profile__item--3">
            <div class="cab-profile__item-content">
              <div class="cab-text cab-profile__text">Полученная:</div>
              <div class="cab-text cab-profile__text">Сумма:</div>
            </div>
            <div class="cab-profile__item-content">
              <div class="cab-text cab-text--white cab-profile__text">Прибыль</div>
              <div class="cab-text cab-text--white cab-profile__text">0.00₽</div>
            </div>
          </li>
          <li class="cab-profile__item cab-profile__item--4">
            <div class="cab-profile__item-content">
              <div class="cab-text cab-profile__text">Всего:</div>
              <div class="cab-text cab-profile__text">Сумма:</div>
            </div>
            <div class="cab-profile__item-content">
              <div class="cab-text cab-text--white cab-profile__text">Выведено</div>
              <div class="cab-text cab-text--white cab-profile__text">0.00₽</div>
            </div>
          </li>
        </ul>
        
        </div>
      </section>
      
      
<section class="cab-deposit cab-section">
  <form method="POST" id="open_deposit_form"><input type="hidden" name="csrfmiddlewaretoken" value="dd7I7L8IQJhVLLsUwF4JytleqlhmXGsWxsdyVKq52lao7rNAesVa6IeGU9Tu4W4j">
    <div class="container">
      <h2 class="cab-title cab-deposit__title">
        <span class="cab-title__divider"></span>
        <span class="cab-title__text">Открыть депозит</span>
        <span class="cab-title__divider cab-title__divider--reverse"></span>
      </h2>
      
      <div class="cab-wrapper cab-deposit__payment-wrapper">
        <h3 class="cab-subtitle cab-deposit__subtitle">Выберите тарифный план</h3>

        <div class="slider-wrapper slider-wrapper--mb">
          <div class="swiper swiper-cab">

            <div class="swiper-wrapper">

              
                
                <div class="swiper-slide">
                  <label class="cab-deposit__label">
                    <input class="cab-deposit__radio" type="hidden" data-color="rgb(58,217,111)">
                    <input class="cab-deposit__radio" type="radio" name="tariff_id" value="12">
                    <div class="cab-deposit__item cab-deposit__item" style="--tariff-color: 58,217,111">
                      <div class="cab-deposit__item-val" data-percent="30">30%</div>
                      <h4 class="cab-deposit__item-title">BAMBOO</h4>
                      <div class="cab-deposit__item-wrapper">
                        <div class="cab-deposit__item-content">
                          <div class="cab-text">Депозит:</div>
                          <div class="cab-text">Срок:</div>
                        </div>
                        <div class="cab-deposit__item-content">
                          <div class="cab-text cab-text--white" data-sum="1000" data-daily-add-sum="10">1000 ₽</div>
                          <div class="cab-text cab-text--white" data-date="5" data-final-profit="1050">5 дней</div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
                
              
                
                <div class="swiper-slide">
                  <label class="cab-deposit__label">
                    <input class="cab-deposit__radio" type="hidden" data-color="rgb(72,218,59)">
                    <input class="cab-deposit__radio" type="radio" name="tariff_id" value="1">
                    <div class="cab-deposit__item cab-deposit__item" style="--tariff-color: 72,218,59">
                      <div class="cab-deposit__item-val" data-percent="10">10%</div>
                      <h4 class="cab-deposit__item-title">ASPEN</h4>
                      <div class="cab-deposit__item-wrapper">
                        <div class="cab-deposit__item-content">
                          <div class="cab-text">Депозит:</div>
                          <div class="cab-text">Срок:</div>
                        </div>
                        <div class="cab-deposit__item-content">
                          <div class="cab-text cab-text--white" data-sum="10000" data-daily-add-sum="33">10000 ₽</div>
                          <div class="cab-text cab-text--white" data-date="30" data-final-profit="11000">30 дней</div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
                
              
                
                <div class="swiper-slide">
                  <label class="cab-deposit__label">
                    <input class="cab-deposit__radio" type="hidden" data-color="rgb(58,217,164)">
                    <input class="cab-deposit__radio" type="radio" name="tariff_id" value="2">
                    <div class="cab-deposit__item cab-deposit__item" style="--tariff-color: 58,217,164">
                      <div class="cab-deposit__item-val" data-percent="10">10%</div>
                      <h4 class="cab-deposit__item-title">BIRCH</h4>
                      <div class="cab-deposit__item-wrapper">
                        <div class="cab-deposit__item-content">
                          <div class="cab-text">Депозит:</div>
                          <div class="cab-text">Срок:</div>
                        </div>
                        <div class="cab-deposit__item-content">
                          <div class="cab-text cab-text--white" data-sum="25000" data-daily-add-sum="83">25000 ₽</div>
                          <div class="cab-text cab-text--white" data-date="30" data-final-profit="27500">30 дней</div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
                
              
                
                <div class="swiper-slide">
                  <label class="cab-deposit__label">
                    <input class="cab-deposit__radio" type="hidden" data-color="rgb(58,199,217)">
                    <input class="cab-deposit__radio" type="radio" name="tariff_id" value="3">
                    <div class="cab-deposit__item cab-deposit__item" style="--tariff-color: 58,199,217">
                      <div class="cab-deposit__item-val" data-percent="15">15%</div>
                      <h4 class="cab-deposit__item-title">PINE</h4>
                      <div class="cab-deposit__item-wrapper">
                        <div class="cab-deposit__item-content">
                          <div class="cab-text">Депозит:</div>
                          <div class="cab-text">Срок:</div>
                        </div>
                        <div class="cab-deposit__item-content">
                          <div class="cab-text cab-text--white" data-sum="50000" data-daily-add-sum="250">50000 ₽</div>
                          <div class="cab-text cab-text--white" data-date="30" data-final-profit="57500">30 дней</div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
                
              
                
                <div class="swiper-slide">
                  <label class="cab-deposit__label">
                    <input class="cab-deposit__radio" type="hidden" data-color="rgb(58,63,217)">
                    <input class="cab-deposit__radio" type="radio" name="tariff_id" value="4">
                    <div class="cab-deposit__item cab-deposit__item" style="--tariff-color: 58,63,217">
                      <div class="cab-deposit__item-val" data-percent="20">20%</div>
                      <h4 class="cab-deposit__item-title">SPRUCE</h4>
                      <div class="cab-deposit__item-wrapper">
                        <div class="cab-deposit__item-content">
                          <div class="cab-text">Депозит:</div>
                          <div class="cab-text">Срок:</div>
                        </div>
                        <div class="cab-deposit__item-content">
                          <div class="cab-text cab-text--white" data-sum="100000" data-daily-add-sum="666">100000 ₽</div>
                          <div class="cab-text cab-text--white" data-date="30" data-final-profit="120000">30 дней</div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
                
              
                
                <div class="swiper-slide">
                  <label class="cab-deposit__label">
                    <input class="cab-deposit__radio" type="hidden" data-color="rgb(167,59,218)">
                    <input class="cab-deposit__radio" type="radio" name="tariff_id" value="7">
                    <div class="cab-deposit__item cab-deposit__item" style="--tariff-color: 167,59,218">
                      <div class="cab-deposit__item-val" data-percent="25">25%</div>
                      <h4 class="cab-deposit__item-title">LARCH</h4>
                      <div class="cab-deposit__item-wrapper">
                        <div class="cab-deposit__item-content">
                          <div class="cab-text">Депозит:</div>
                          <div class="cab-text">Срок:</div>
                        </div>
                        <div class="cab-deposit__item-content">
                          <div class="cab-text cab-text--white" data-sum="250000" data-daily-add-sum="2083">250000 ₽</div>
                          <div class="cab-text cab-text--white" data-date="30" data-final-profit="312500">30 дней</div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
                
              
                
                <div class="swiper-slide">
                  <label class="cab-deposit__label">
                    <input class="cab-deposit__radio" type="hidden" data-color="rgb(247,26,185)">
                    <input class="cab-deposit__radio" type="radio" name="tariff_id" value="8">
                    <div class="cab-deposit__item cab-deposit__item" style="--tariff-color: 247,26,185">
                      <div class="cab-deposit__item-val" data-percent="30">30%</div>
                      <h4 class="cab-deposit__item-title">OAK</h4>
                      <div class="cab-deposit__item-wrapper">
                        <div class="cab-deposit__item-content">
                          <div class="cab-text">Депозит:</div>
                          <div class="cab-text">Срок:</div>
                        </div>
                        <div class="cab-deposit__item-content">
                          <div class="cab-text cab-text--white" data-sum="500000" data-daily-add-sum="5000">500000 ₽</div>
                          <div class="cab-text cab-text--white" data-date="30" data-final-profit="650000">30 дней</div>
                        </div>
                      </div>
                    </div>
                  </label>
                </div>
                
              

            </div>
          </div>
          <div class="swiper-pagination swiper-pagination--cab"></div>

          <div class="cab-button-prev"></div>
          <div class="cab-button-next"></div>
        </div>

      </div>
      
      <div class="cab-deposit__content">
        
        
      </div>
    </div>
  </form>
  </section>

      
      <footer class="cab-footer">
        <div class="container">
          <ul class="list-reset cab-footer__list">
            <li class="cab-footer__item">
              <a class="cab-footer__link" href="/">Главная</a>
            </li>
            <li class="cab-footer__item">
              <a class="cab-footer__link" href="/about/">О нас</a>
            </li>
            <li class="cab-footer__item">
              <a class="cab-footer__link" href="/stats/">Статистика</a>
            </li>
            <li class="cab-footer__item">
              <a class="cab-footer__link" href="/reviews/">Отзывы</a>
            </li>
            <li class="cab-footer__item">
              <a class="cab-footer__link" href="/faq/">FAQ</a>
            </li>
            <li class="cab-footer__item">
              <a class="cab-footer__link" href="/contacts/">Контакты</a>
            </li>
            <li class="cab-footer__item">
              <a class="cab-footer__link" href="/policy/">Политика конфиденциальности</a>
            </li>
          </ul>
        </div>
      </footer>
    

  </main>


  <div class="graph-modal">
  <div class="graph-modal__overlay"></div>
  
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="auth">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Вход в личный кабинет</h2>

      <form class="form" action="#">
        <div class="form__text-wrapper">
          <div class="form__text">Введите ваш E-mail:</div>
          <button class="btn-reset form__btn-modal form__text" type="button" data-graph-path="registration">Регистрация</button>
        </div>
        <label class="form__label form__label--email">
          <input type="email" name="Почта" class="input-reset form__input" placeholder="E-mail">
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Введите ваш пароль:</div>
          <button class="btn-reset form__btn-modal form__text" type="button" data-graph-path="password-reset">Забыли пароль?</button>
        </div>
        <label class="form__label form__label--password">
          <input type="password" name="Пароль" class="input-reset form__input" placeholder="Введите пароль">
        </label>
        <button class="btn-reset btn btn--bg form__btn">Войти</button>
      </form>
    </div>
  </div>
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="registration">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Регистрация</h2>

      <form class="form" action="#">
        <div class="form__text-wrapper">
          <div class="form__text">Ваше ФИО латинскими буквами:</div>
        </div>
        <label class="form__label form__label--user">
          <input type="text" name="ФИО" class="input-reset form__input" placeholder="Ivanov Ivan Ivanovich">
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Ваш E-mail:</div>
        </div>
        <label class="form__label form__label--email">
          <input type="email" name="Почта" class="input-reset form__input" placeholder="E-mail">
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Ваш логин:</div>
        </div>
        <label class="form__label form__label--login">
          <input type="text" name="Логин" class="input-reset form__input" placeholder="Логин">
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Придумайте пароль:</div>
        </div>
        <label class="form__label form__label--password">
          <input type="password" name="Пароль" class="input-reset form__input" placeholder="Введите пароль">
          <div class="form__label-inf">
            Пароль должен быть минимум 10 символов и содержать заглавную букву.
          </div>
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Повторите ввод пароля</div>
        </div>
        <label class="form__label form__label--password">
          <input type="password" name="Подтверждение-пароль" class="input-reset form__input" placeholder="Введите пароль">
        </label>
        <label class="form__label form__label--checkbox">
          <div class="form__checkbox-wrapper">
            <input class="form__checkbox" type="checkbox" name="Согласие">
            <div class="form__label-checkbox"></div>
          </div>
          <div class="form__text">
            Нажимая на кнопку «Зарегистрироваться» вы даете согласие на обработку <span class="form__text form__text--green">персональных данных</span> и соглашаетесь с <span class="form__text form__text--green">политикой конфиденциальности</span>
          </div>
        </label>
        <button class="btn-reset btn btn--bg form__btn">Зарегистрироваться</button>
      </form>
    </div>
  </div>
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="password-reset">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Востановление пароля</h2>

      <form class="form" action="#">
        <div class="form__text-wrapper">
          <div class="form__text">Ваш E-mail:</div>
        </div>
        <label class="form__label form__label--email">
          <input type="email" name="Почта" class="input-reset form__input" placeholder="E-mail">
        </label>
        <button class="btn-reset btn btn--bg form__btn">Восстановить</button>
      </form>
    </div>
  </div>
  <div class="graph-modal__container graph-modal__container--password-reset" role="dialog" aria-modal="true" data-graph-target="success-password-reset">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Востановление пароля</h2>
      <div class="graph-modal__text-wrapper">
        <p class="graph-modal__text">
          На указанную вами почту выслано письмо с дальнейшими инструкциями.
        </p>
        <p class="graph-modal__text">
          Для завершения восстановления пароля перейдите по ссылке, указанной в письме.
        </p>
      </div>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="success-password">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Спасибо!</h2>
      <p class="graph-modal__descr">Отзыв будет рассмотрен модератором, после чего опубликован!</p>
    </div>
  </div>
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="cab-balance-up">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Пополнить баланс</h2>


      <form class="form adm-settings__correct-form" action="#" data-cab-balance-form method="POST">
      <div class="cab-balance-up__inputs-wrapper" data-cab-balance-inputs></div>

        <input type="hidden" data-cab-balance-currency>
        <div class="form__text-wrapper">
          <div class="form__text">Платежная система:</div>
        </div>
        <label class="form__label">
          <input class="input-reset form__input" type="text" data-cab-balance-input-name readonly>
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Сумма:</div>
        </div>
        <label class="form__label">
          <input class="input-reset form__input" type="text" data-cab-balance-input-sum readonly>
        </label>
        <button class="btn-reset btn btn--bg form__btn js-modal-close" type="submit" data-cab-balance-btn>Перейти к оплате</button>
      </form>
    </div>
  </div>
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="cab-settings-verif">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Верификация</h2>

      <form class="form form--verif manager__form" method="POST" enctype="multipart/form-data"> <input type="hidden" name="csrfmiddlewaretoken" value="dd7I7L8IQJhVLLsUwF4JytleqlhmXGsWxsdyVKq52lao7rNAesVa6IeGU9Tu4W4j">
        <input type="hidden" name="send_user_verification">
        <div class="form__text-wrapper">
          <div class="form__text">Ф.И.О:</div>
        </div>
        <label class="form__label form__label--user">
          <input type="text" name="ФИО" value="Rameshk" class="input-reset form__input" placeholder="Берется значение из ЛК" readonly>
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">E-mail:</div>
        </div>
        <label class="form__label form__label--email">
          <input type="email" name="Почта" value="rameshkashyap8801@gmail.com" class="input-reset form__input" placeholder="Берется значение из ЛК" readonly>
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Мобильный телефон:</div>
        </div>
        <label class="form__label form__label--phone">
          <input type="text" name="Телефон" value="None" class="input-reset form__input" placeholder="Берется значение из ЛК" data-mask-tel readonly>
        </label>
        <div class="form__text-wrapper">
          <div class="form__text">Город:</div>
        </div>
        <label class="form__label form__label--city">
          <input type="text" name="Город" value="Prolisky" class="input-reset form__input" placeholder="Берется значение из ЛК" readonly>
        </label>
        <div class="manager__reg-verif">
          <div class="cab-settings__modal-text">Вам необходимо прикрепить фотографии/сканы:</div>

          <ul class="cab-settings__modal-list">
            <li class="cab-settings__modal-item cab-settings__modal-text">Паспорт: 1 разворот</li>
            <li class="cab-settings__modal-item cab-settings__modal-text">Паспорт: 2 разворот с регистрацией</li>
            <li class="cab-settings__modal-item cab-settings__modal-text">Ваше фото с паспортом в руках</li>
          </ul>

          <label class="cab-support__label cab-support__label--file
            cab-settings__modal-custom-file manager__file">
          <input class="input-reset cab-support__input-file
            cab-settings__file-verif" id="cab-support-file"
            type="file" name="file" accept="image/png, image/jpeg"
            multiple>
          Прикрепить
          </label>
        </div>

        <div class="cab-settings__text-preview">Прикрепленные файлы:</div>

        <div class="cab-support__form-preview" id="cab-support-preview" data-gallery></div>

        <button class="btn-reset btn btn--bg form__btn">Отправить</button>
      </form>
    </div>
  </div>
  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="password-change">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Успешно!</h2>
      <p class="graph-modal__descr">Ваш пароль был изменен.</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="deposit-open">
    <div class="graph-modal__content graph-modal__content--flex-center">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Открытие депозита</h2>
      <p class="graph-modal__descr">Вы открыли депозит <span class="graph-modal__tariff" data-tariff-name>Aspen</span>.</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="successful-reg">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Успешная регистрация!</h2>
      <p class="graph-modal__descr">Вы успешно зарегистрированы!</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews adm-tariffs__delete-modal" role="dialog" aria-modal="true" data-graph-target="two-factor-auth-confirm">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Вы уверены?</h2>
        <div class="adm-tariffs__delete-wrapper">
          <form method="POST"  id="two_factor_auth_form"><input type="hidden" name="csrfmiddlewaretoken" value="dd7I7L8IQJhVLLsUwF4JytleqlhmXGsWxsdyVKq52lao7rNAesVa6IeGU9Tu4W4j">
            <input type="hidden" name="on_tf_auth" >

            <button class="btn-reset btn btn--bg">Да</button>
          </form>
          <button class="btn-reset btn btn--bg btn--bg-red js-modal-close">Нет</button>
        </div>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="profile-protect">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Защита аккаунта</h2>
      <p class="graph-modal__descr">Вы успешно подключили двухфакторную аутентификацию!</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="telegram-bot">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Telegram-Бот</h2>
      <p class="graph-modal__descr">Вы подключили Telegram-Бота к своему аккаунту! Теперь вы будете получать уведомления на аккаунт.</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews adm-tariffs__delete-modal" role="dialog" aria-modal="true" data-graph-target="early-close-confirm">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title graph-modal__red">Предупреждение</h2>
      <p class="graph-modal__descr graph-modal__descr--grey graph-modal__descr--space-bottom">
        При досрочном закрытии депозита мы <span class="graph-modal__red">взимаем комиссию</span> в размере <span class="graph-modal__red">10%</span> от тела депозита, а также <span class="graph-modal__red">все</span> начисления по нему.
      </p>
        <div class="adm-tariffs__delete-wrapper">
          <form method="POST" id="early_close_confirm_form" style="width: 100%;"><input type="hidden" name="csrfmiddlewaretoken" value="dd7I7L8IQJhVLLsUwF4JytleqlhmXGsWxsdyVKq52lao7rNAesVa6IeGU9Tu4W4j">
            <input type="hidden" name="early_close">
            <input type="hidden" name="id" data-dep-id-modal>
            <button class="btn-reset btn btn--bg btn--full">Продолжить</button>
          </form>
        </div>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="deposit-close-before">
    <div class="graph-modal__content graph-modal__content--flex-center">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Досрочное закрытие</h2>
      <p class="graph-modal__descr graph-modal__descr--space-bottom">Вы досрочно закрыли депозит <span class="graph-modal__tariff" early-close-modal-tariff-name>Aspen</span>.</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="not-enough-balance">
    <div class="graph-modal__content graph-modal__content--flex-center">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Недостаточно средств</h2>
      <a class="btn-reset btn btn--bg graph-modal__link" href="/cab/balance_up/">Пополнить баланс</a>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="incorrect-verification">
    <div class="graph-modal__content graph-modal__content--flex-center">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Ошибка</h2>
      <p class="graph-modal__descr cab-mb">Для продолжения вам необходимо пройти верификацию!</p>
      <a class="btn-reset btn btn--bg graph-modal__link" href="/cab/settings/">Настройки</a>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="time-limit">
    <div class="graph-modal__content graph-modal__content--flex-center">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Ошибка</h2>
      <p class="graph-modal__descr">Вы можете отправлять заявку на вывод раз в 24 часа.</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="withdrawal">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Вывод средств</h2>
      <p class="graph-modal__descr">Заявка на вывод средств была отправлена!</p>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="missing-wallet">
    <div class="graph-modal__content graph-modal__content--flex-center">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Отсутствует кошёлек</h2>
      <a class="btn-reset btn btn--bg graph-modal__link" href="/cab/settings/">Перейти в настройки</a>
    </div>
  </div>
  
  

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="incorrect-form">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Ошибка</h2>
      <p class="graph-modal__descr">Некорректные данные формы</p>
    </div>
  </div>
  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="incorrect-amount">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Ошибка</h2>
      <p class="graph-modal__descr">Указанная сумма не отвечает требованиям для данной платёжной системы</p>
    </div>
  </div>
  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="too-many-attempts">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Ошибка</h2>
      <p class="graph-modal__descr">Слишком много попыток<br>Попробуйте через несколько минут</p>
    </div>
  </div>
  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="tech-works">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Ошибка</h2>
      <p class="graph-modal__descr">Попробуйте позже</p>
    </div>
  </div>

  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="early-close-check-code"> 
    <div class="graph-modal__content"> 
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно"> 
        <svg> 
          <use xlink:href="/static/img/sprite.svg#close"></use> 
        </svg> 
      </button> 
 
      <h2 class="graph-modal__title">Введите код с почты:</h2> 
 
      <form class="form adm-settings__correct-form" id="early_close_code_check_form" method="POST"> <input type="hidden" name="csrfmiddlewaretoken" value="dd7I7L8IQJhVLLsUwF4JytleqlhmXGsWxsdyVKq52lao7rNAesVa6IeGU9Tu4W4j"> 
        <input type="hidden" name="early_close_code_check">
        <label class="form__label"> 
          <input class="input-reset form__input form__input--phone-message" type="text" placeholder="_ _ _  _ _ _" name="email_code" data-mask-message> 
        </label> 
        <div class="alert_text d-none d-none-last form__text " id="d-none_email_check"></div>
        <button class="btn-reset btn btn--bg form__btn">Подтвердить</button> 
      </form> 
    </div> 
  </div>
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="adm-settings-btn-correct">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Изменить кошелек</h2>

      <form class="form adm-settings__correct-form" action="#">
        <div class="form__text-wrapper">
          <div class="form__text">Введите кошелек:</div>
        </div>
        <label class="cab-settings__label cab-settings__label--3" style="position: relative;">
          <div class="cab-settings__label-icon"></div>

          <input type="text" name="Значение" class="input-reset form__input form__input--dark form__input--modal" data-adm-settings-correct-input>
        </label>
        <button class="btn-reset btn btn--bg form__btn js-modal-close" type="button" data-adm-settings-correct-btn>Сохранить</button>
      </form>
    </div>
  </div>
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="adm-settings-btn-correct-mask">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Изменить значение</h2>

      <form class="form adm-settings__correct-form adm-settings__correct-form--mask" action="#">
        <div class="form__text-wrapper">
          <div class="form__text">Введите значение:</div>
        </div>
        <label class="cab-settings__label cab-settings__label--mir cab-settings__label--6 cab-settings__label--modal">
          <input class="cab-settings__input cab-settings__input-mask cab-settings__input-mask--mir" type="text" name="Номер MasterCard" data-adm-settings-correct-input-mask>
          <div class="cab-settings__label-text">Номер МИР:</div>
        </label>
        <button class="btn-reset btn btn--bg form__btn js-modal-close" type="button" data-adm-settings-correct-btn>Сохранить</button>
      </form>
    </div>
  </div>

  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="adm-settings-btn-correct-tel">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Изменить значение</h2>

      <form class="form adm-settings__correct-form adm-settings__correct-form--mask" action="#">
        <div class="form__text-wrapper">
          <div class="form__text">Введите значение:</div>
        </div>
        <label class="cab-settings__label form__label--phone cab-settings__label--modal">
          <input class="cab-settings__input cab-settings__input--not-title" type="text" name="Телефон" placeholder="+7 921 000 00 00" data-adm-settings-correct-input-tel data-mask-tel>
        </label>
        <button class="btn-reset btn btn--bg form__btn js-modal-close" type="button" data-adm-settings-correct-btn>Сохранить</button>
      </form>
    </div>
  </div>

  <div class="graph-modal__container graph-modal__container--reviews" role="dialog" aria-modal="true" data-graph-target="input-file-err">
    <div class="graph-modal__content">
      <button class="btn-reset js-modal-close graph-modal__close" aria-label="Закрыть модальное окно">
        <svg>
          <use xlink:href="/static/img/sprite.svg#close"></use>
        </svg>
      </button>

      <h2 class="graph-modal__title">Ошибка</h2>
      <p class="graph-modal__descr manager__reg-descr" data-input-file-err></p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
<div class="loader loader--transaction fixed-block">
  <svg class="pl" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke-linecap="round" stroke-width="16" transform="rotate(-90,64,64)">
      <circle class="pl__ring" r="56" cx="64" cy="64" stroke="#ddd" />
      <circle class="pl__worm pl__worm--moving" r="56" cx="64" cy="64" stroke="currentColor" stroke-dasharray="22 307.86 22" data-worm />
    </g>
    <g data-particles></g>
  </svg>
</div>
</body>

</html>