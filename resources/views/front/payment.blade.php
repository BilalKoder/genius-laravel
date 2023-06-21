

@php
use App\Functions\Helper;
@endphp

@extends('front.app')

@section('styles')
    <style>
        body {
            overflow-x: auto !important;
        }
    </style>
@endsection
@section('content')

<div id="pagepiling">
    <!-- START CONTACT -->
    <section class="section slide5 contact-bg" id="contact">
        <div class="container">
          <div class="row pb-5">
            <div class="col-12 col-md-12 text-center" >
              <h3 class="main-font text-uppercase">
                <span class="text-yellow d-block text-uppercase"> Checkout </span>
            </h3>
            </div>
          </div>
            <div class="row pb-5">
                <div class="col-6 col-md-6 text-center" style="border-right: 1px solid #dcc57c;">
                    {{-- <h3 class="main-font text-uppercase">
                        <span class="text-yellow d-block text-uppercase"> Pay By PayPal </span>
                    </h3> --}}
                    <div id="paypal-button-container"></div>
                </div>

                <div class="col-6 col-md-6 text-center">
                  {{-- <h3 class="main-font text-uppercase">
                      <span class="text-yellow d-block text-uppercase"> Pay By Wallet </span>
                  </h3> --}}
                  <div class="contact-btn text-center">
                    <a href="#"  class="btn btn-medium btn-block btn-rounded btn-yellow text-capitalize" style="border-radius:5px" >Pay By Wallet</a>
                  </div>
              </div>
            </div>
           
            
           
        </div>
    </section>
</div>


@endsection

@section('scripts')
{{-- <script src="https://www.paypal.com/sdk/js?client-id=dNTr4AvMfC1sfl3HiIMzJDGFkzhfy9L5FnCV0SEVPkepfIoXwFcHDkHfbew4VQ4_gbcYmPxRklp8RKM"></script> --}}

<script src="https://www.paypal.com/sdk/js?client-id=AdNTr4AvMfC1sfl3HiIMzJDGFkzhfy9L5FnCV0SEVPkepfIoXwFcHDkHfbew4VQ4_gbcYmPxRklp8RKM&currency=EUR&intent=capture" data-sdk-integration-source="integrationbuilder"></script>

        <script>
          const fundingSources = [
            paypal.FUNDING.PAYPAL,
              paypal.FUNDING.CARD
            ]

          for (const fundingSource of fundingSources) {
            const paypalButtonsComponent = paypal.Buttons({
              fundingSource: fundingSource,

              // optional styling for buttons
              // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
              style: {
                shape: 'rect',
                height: 40,
              },

              // set up the transaction
              createOrder: (data, actions) => {
                // pass in any options from the v2 orders create call:
                // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
                const createOrderPayload = {
                  purchase_units: [
                    {
                      amount: {
                        value: '<?= $amountToCharage ?>',
                      },
                    },
                  ],
                }
                return actions.order.create(createOrderPayload)
              },

              // finalize the transaction
              onApprove: (data, actions) => {
                const captureOrderHandler = (details) => {
                  const payerName = details.payer.name.given_name
                    if(details.status == "COMPLETED"){
                        $('.loader-bg').show();
                        var formData = {
                            payment_details: details,
                            user_details:'<?= $user ?>',
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?= route('payment-submit') ?>",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                data  : JSON.stringify(formData),
                            },
                            dataType: "json",
                            encode: true,
                        }).done(function (response) {
                            // $('.loader-bg').hide();
                            if(response.status == 200){
                                window.location.replace(response.redirect_url)
                            }
                            console.log('response',response);
                        });
                    }
                }

                return actions.order.capture().then(captureOrderHandler)
              },

              // handle unrecoverable errors
              onError: (err) => {
                console.error(
                  'An error prevented the buyer from checking out with PayPal',
                )
              },
            })

            if (paypalButtonsComponent.isEligible()) {
              paypalButtonsComponent
                .render('#paypal-button-container')
                .catch((err) => {
                  console.error('PayPal Buttons failed to render')
                })
            } else {
              console.log('The funding source is ineligible')
            }
          }
        </script>


@endsection