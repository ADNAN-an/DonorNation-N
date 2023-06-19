@extends('layouts.master')

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>{{ __('site.welcome_title') }}</h1>
            <h2>{{ __('site.welcome_subtitle') }}</h2>
            <h3>{{ __('site.welcome_tagline') }}</h3>

            <a href="{{ route('donner_sang') }}" class="btn-get-started scrollto">{{ __('site.donate_blood') }} </a>
            <a href="{{ url('/blood-donation-process') }}" class="btn-get-started1 scrollto">{{ __('site.learn_more') }}</a>
        </div>
    </section><!-- End Hero -->

    <section class="RRR">

        <div style="align-content: center" class="flex-container flex text-center">

            <div class="flex-box1">
                <div>
                    <h1 style="white-space: nowrap;"> {{ __('site.donation_location_title') }} </h1>
                </div>

                <div> <button>{{ __('site.learn_more_button') }}</button></div>
            </div>

            <div class="flex-box2">
                <div>
                    <h1 style="white-space: nowrap;">{{ __('site.donation_criteria_title') }}</h1>
                </div>
                <div> <button>{{ __('site.learn_more_button') }}</button> </div>
            </div>

            <div class="flex-box3">
                <div>
                    <h1 style="white-space: nowrap;"> {{ __('site.donation_process_title') }}</h1>
                </div>
                <div><button>{{ __('site.learn_more_button') }}</button></div>
            </div>

        </div>
    </section>
    
    <!-- ======= CONTACT US Section ======= -->


    <section id="contact-us" class="contact-us section-bg">
        <div class="container">
            @if (session('success'))
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <div class="alert alert-success">{{ __('site.contact_success') }}</div>
                    </div>
                </div>
            @endif
            <div class="section-title">
                <h2>{{ __('site.contact_title') }}</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
            </div>

            <form role="form" class="php-email-form" action="{{ url('/contact') }}" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 13px;">
                    <div class="col-md-5 form-group" style="margin-right: 87px;margin-left: 11px; ">
                        <input type="text" name="Name" class="form-control" id="Name"
                            placeholder="{{ __('site.contact_name_placeholder') }}" data-rule="minlen:4"
                            data-msg="Please enter at least 4 chars">
                        <!-- <div class="validate"></div> -->
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="Email" id="Email"
                            placeholder="{{ __('site.contact_email_placeholder') }}" data-rule="email"
                            data-msg="Please enter a valid email">
                        <!-- <div class="validate"></div> -->
                    </div>
                </div>

                <div class="col-md-12 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="Object" id="Object"
                        placeholder="{{ __('site.contact_subject_placeholder') }}" data-rule="minlen:4"
                        data-msg="Please enter at least 4 chars">
                    <!-- <div class="validate"></div> -->
                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="Message" rows="5"
                        placeholder="{{ __('site.contact_message_placeholder') }}"></textarea>
                    <div class="validate"></div>
                </div>
                <!-- <div class="mb-3">
                          <div class="loading">Loading</div>
                          <div class="error-message"></div>
                          <div class="sent-message">Your Message has been sent successfully. Thank you!</div>
                        </div> -->
                <div class="text-center"><button type="submit">{{ __('site.contact_send_button') }}</button></div>
            </form>

        </div>
    </section>
    <!-- End CONTACT US Section -->


    <section style="background: url('../public/img/zzzee.jpg');height: 337px;">

        <h1
            style="margin-left: 150px;
        padding-top: 100px;
        font-weight: 600;
        /* font-style: normal; */
        font-family: 'Poppins', sans-serif;
        color: #000000;
        font-size: 46px;
        letter-spacing: 1px;
      ">
            Devenir Un Donneur Du Sang</h1>
        <hr class="divider-line" style="max-width:100%;width:100px;color: red;margin-left: 150px;margin-top: -20px;">


        <h3
            style="margin-left: 150px;  font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
        font-size: 17px;
        line-height: 1.42857143;
        color: #636a6d;">
            Tous les types de sang sont nécessaires pour aider les patients</h3>

        <!-- ajourer ici le lien du button  -->
        <a href="#about"><button
                style="font-family: Raleway, sans-serif;  
    
        text-transform: uppercase;
        font-weight: 500;
        font-size: 14px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 12px 35px;
        margin-top: 20px;
        border-radius: 10px;
        transition: 0.5s;
        color: #000000;
        background: #ff0000;
        margin-left: 150px;
        cursor: pointer;
        ">
                DONNER</button></a>


    </section>

@endsection
