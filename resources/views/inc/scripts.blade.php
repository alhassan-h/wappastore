<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/core/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>

<script src="{{asset('assets/css/plugins/snackbar.min.js')}}"></script>
<script src="{{asset('assets/css/plugins/custom-snackbar.js')}}"></script>

<script>
  
</script>

@if(Session::has('login'))
    <script>
        Snackbar.show({
            text: "{{Session::get('login')}}",
            actionTextColor: '#fff',
            backgroundColor: '#8dbf42',
            pos: 'top-right',
            duration: 2000,
        });
    </script>
@endif

@if(Session::has('success'))
    <script>
        Snackbar.show({
            text: "{{Session::get('success')}}",
            actionTextColor: '#fff',
            backgroundColor: '#8dbf42',
            pos: 'top-center'
        });
    </script>
@endif

@if(Session::has('warning'))
    <script>
        Snackbar.show({
            text: "{{Session::get('warning')}}",
            actionTextColor: '#fff',
            backgroundColor: '#e2a03f',
            pos: 'top-center'
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        Snackbar.show({
            text: "{{Session::get('error')}}",
            actionTextColor: '#fff',
            backgroundColor: '#e7515a',
            pos: 'top-center'
        });
    </script>
@endif

@if(isset($data['page_name']))
@switch($data['page_name'])
    @case('cart')
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script>
            // var paymentForm = document.getElementById('paymentForm');
            // paymentForm.addEventListener('submit', payWithPaystack, false);
            function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'pk_test_51dff8972956be6712996a750f1a7f2b7115f4fc', // Replace with your public key
                email: "{{Auth::user()->email}}",
                amount: Number("{{$total_discount}}") * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                ref: Math.floor((Math.random() * 1000000000) + 1), // Replace with a reference you generated
                callback: function(response) {
                //this happens after the payment is completed successfully
                var reference = response.reference;
                window.location = "{{route('checkout.cart')}}"
                // setTimeout(() => {window.location = "{{route('orders')}}"}, 10000)
                // alert('Payment complete! Reference: ' + reference);
                // Make an AJAX call to your server with the reference to verify the transaction
                },
                onClose: function() {
                    alert('Transaction was not completed, window closed.');
                },
            });
            handler.openIframe();
            }
        </script>
        @break
    @case('dashboard')
        @if(isset($data['dashboard']) && $data['dashboard'] == 'admin')
        <script>

            var ctx2 = document.getElementById("chart-line").getContext("2d");

            new Chart(ctx2, {
                type: "line",
                data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [{{$montly_sales_data}}],
                    maxBarThickness: 6

                }],
                },
                options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                    display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                        },
                    }
                    },
                    x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                        },
                    }
                    },
                },
                },
            });

            var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

            new Chart(ctx3, {
                type: "line",
                data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Orders",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [{{$montly_orders_data}}],
                    maxBarThickness: 6

                }],
                },
                options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                    display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#f8f9fa',
                        font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                        },
                    }
                    },
                    x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                        },
                    }
                    },
                },
                },
            });
        </script>
        @endif
        @break
@endswitch
@endif
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
        damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
<script>
    $(document).ready(function (e) {
        $('#product-image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#product-image-preview').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    
    });
</script>
