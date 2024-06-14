
@include('partials.notify')
<script src="assets/themes/screaminlizard/js/bootstrap.bundle.min.js"></script>
<script src="assets/themes/screaminlizard/js/jquery-3.6.0.min.js"></script>
<script src="assets/themes/screaminlizard/js/owl.carousel.min.js"></script>
<script src="assets/themes/screaminlizard/js/select2.min.js"></script>
<script src="assets/themes/screaminlizard/js/apexcharts.min.js"></script>
<script src="assets/themes/screaminlizard/js/radialprogressOld.js"></script>


<script src="assets/global/js/notiflix-aio-2.7.0.min.js"></script>
<script src="assets/global/js/pusher.min.js"></script>
<script src="assets/global/js/vue.min.js"></script>
<script src="assets/global/js/axios.min.js"></script>
<!-- custom script -->
<script src="assets/themes/screaminlizard/js/data.js"></script>
<script src="assets/themes/screaminlizard/js/script.js"></script>

<script src="assets/themes/screaminlizard/js/apexcharts.js"></script>

<script>
    "use strict";
    (function ($) {
        $(document).on('click', '.investNow', function () {
            var planModal = new bootstrap.Modal(document.getElementById('investNowModal'))
            planModal.show()
            let data = $(this).data('resource');
            let price = $(this).data('price');
            let symbol = "$";
            let currency = "USD";
            $('.price-range').text(`Invest: ${price}`);

            if (data.fixed_amount == '0') {
                $('.invest-amount').val('');
                $('#amount').attr('readonly', false);
            } else {
                $('.invest-amount').val(data.fixed_amount);
                $('#amount').attr('readonly', true);
            }

            $('.profit-details').html(`Interest: ${(data.profit_type == '1') ? `${data.profit} %` : `${data.profit} ${currency}`}`);
            $('.profit-validity').html(`Per ${data.schedule} hours ,  ${(data.is_lifetime == '0') ? `${data.repeatable} %` : `Lifetime`}`);
            $('.plan-name').text(data.name);
            $('#plan-name').val(data.name);
            $('.plan-id').val(data.id);
            $('#minimum_amount').val(data.minimum_amount);
            $('#maximum_amount').val(data.maximum_amount);
            $('.show-currency').text("USD");
        });
        $('.invest-amount').on('change keyup',function () {
			let str = $(this).val();
			str = str.replace(',','.');
		
           let min =  $('#minimum_amount').val();
           let max =  $('#maximum_amount').val();
			let amount = parseFloat(str);
            if (amount>=min && amount<=max) 
            {
                $(".submit-btn").prop("disabled", false);
                $(".submit-btn").css('cursor','pointer');
                $('.cashback-info-label').html('');
            }
            else
            {

            $(".submit-btn").prop("disabled", true);
            $(".submit-btn").css('cursor','not-allowed');
            $('.cashback-info-label').html("minimum deposit is "+min+" INR and maximum is "+max+" INR !").css('color', 'red');

            }
		
			//console.log(summ_usd);
		});

    })(jQuery);
</script>





<script>
    "use strict";

    var options = {
        theme: {
            mode: 'dark',
        },

        series: [{
                name: "Investment",
                color: 'rgba(247, 147, 26, 1)',
                data: [7348, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                name: "Payout",
                color: 'rgba(240, 16, 16, 1)',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                name: "Deposit",
                color: 'rgba(255, 72, 0, 1)',
                data: [9379.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                name: "Deposit Bonus",
                color: 'rgba(39, 144, 195, 1)',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                name: "Investment Bonus",
                color: 'rgba(136, 203, 245, 1)',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            }
        ],
        chart: {
            type: 'bar',
            // height: ini,
            background: '#000',
            toolbar: {
                show: false
            }

        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"
            ],

        },
        yaxis: {
            title: {
                text: ""
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            colors: ['#000'],
            y: {
                formatter: function(val) {
                    return "$" + val + ""
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#container"), options);
    chart.render();

    function copyFunction() {
        var copyText = document.getElementById("sponsorURL");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        /*For mobile devices*/
        document.execCommand("copy");
        Notiflix.Notify.Success(`Copied: ${copyText.value}`);
    }
</script>
<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js";
    import {
        getMessaging,
        getToken,
        onMessage
    } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-messaging.js";

    const firebaseConfig = {
        apiKey: "AIzaSyDQ6Nqnb3mJ83alr3t_nvFH709GhtLtFV4",
        authDomain: "p2p-test-5f5c6.firebaseapp.com",
        projectId: "p2p-test-5f5c6",
        storageBucket: "p2p-test-5f5c6.appspot.com",
        messagingSenderId: "109168593126",
        appId: "1:109168593126:web:3fcebf6e272b3260e3d327",
        measurementId: "G-FLLWEYC3DL"
    };

    const app = initializeApp(firebaseConfig);
    const messaging = getMessaging(app);
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('' + `/firebase-messaging-sw.js`, {
            scope: './'
        }).then(function(registration) {
            requestPermissionAndGenerateToken(registration);
        }).catch(function(error) {});
    } else {}

    onMessage(messaging, (payload) => {
        if (payload.data.foreground || parseInt(payload.data.foreground) == 1) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        }
    });

    function requestPermissionAndGenerateToken(registration) {
        document.addEventListener("click", function(event) {
            if (event.target.id == 'allow-notification') {
                Notification.requestPermission().then((permission) => {
                    if (permission === 'granted') {
                        getToken(messaging, {
                                serviceWorkerRegistration: registration,
                                vapidKey: "BL4-tqqvkWjU92hz3Us65K1wY5D7m6-kLnXLq_l-mMEIGrBrifMd-Ex_BDCtA5IlpxcMtCk3Tj0-5Ah8qqXlts0"
                            })
                            .then((token) => {
                                $.ajax({
                                    url: "user/save-token",
                                    method: "post",
                                    data: {
                                        token: token,
                                    },
                                    success: function(res) {}
                                });
                                window.newApp.notificationPermission = 'granted';
                            });
                    } else {
                        window.newApp.notificationPermission = 'denied';
                    }
                });
            }
        });
    }
</script>
<script>
    window.newApp = new Vue({
        el: "#firebase-app",
        data: {
            notificationPermission: Notification.permission,
            is_notification_skipped: sessionStorage.getItem('is_notification_skipped') == '1'
        },
        methods: {
            skipNotification() {
                sessionStorage.setItem('is_notification_skipped', '1');
                this.is_notification_skipped = true;
            }
        }
    });
</script>


</body>

</html>
