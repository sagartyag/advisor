
      
      
<section class="cab-money cab-section">
    <div class="container">
      <h2 class="cab-title cab-money__title">
        <span class="cab-title__divider"></span>
        <span class="cab-title__text">Вывод средств</span>
        <span class="cab-title__divider cab-title__divider--reverse"></span>
      </h2>
      
      <form action="" method="POST" id="user_withdraw_form"> <input type="hidden" name="csrfmiddlewaretoken" value="VK2EDP2B5FX2I4jU6nhZFGd0hfSHxC6kfZ8urOkYhhQv4KEAOa8qdV6sL3uPESIH">
        <input type="hidden" name="withdraw_form">
        


<div class="cab-wrapper cab-money__payment-wrapper">
    <h3 class="cab-subtitle cab-money__subtitle">Выберите платежную
      систему</h3>
    <ul class="list-reset cab-payment cab-deposit__payment">
        
            
                
                <li class="cab-payment__item">
                    <label class="cab-payment__label">
                        
                            <input class="cab-payment__radio" type="radio" name="billing_method" value="1" data-payment-radio data-min-sum="500" data-max-sum="500000" >
                        
                        <div class="cab-payment__item-content cab-payment__item-content" style="background-image: url('/media/billing/billing_methods/ton_symbol_2QotA0R.svg')">
                        <div class="cab-payment__item-text">TON</div>
                        <div class="cab-payment__checkbox">
                            <svg>
                            <use xlink:href="/static/img/sprite.svg#cab-payment-checkbox"></use>
                            </svg>
                        </div>
                        </div>
                    </label>
                </li>
                
            
        
    </ul>
  </div>


  
        <div class="cab-wrapper">
          <div class="cab-transaction__title-wrapper">
            <h3 class="cab-subtitle">Сумма вывода:</h3>
            <div class="cab-transaction__text"></div>
          </div>
          <div class="cab-money__content">
            <div class="cab-money__wrapper">
              <div class="cab-text cab-money__balance">Баланс:</div>
              <div class="cab-text cab-text--white">0.00 ₽</div>
            </div>
            <label class="cab-money__label">
              <input class="cab-money__input" type="number" name="amount" placeholder="0.00" data-balance-up-input value="1000">
            </label>
            <button class="btn-reset btn cab-money__btn btn--bg cab-money__btn--out" data-balance-up-btn disabled>Вывести</button>
          </div>
        </div>
      </form>
    </div>
  </section>

      
     