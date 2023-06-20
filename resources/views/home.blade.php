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
    

    <section id="QNS" >
{{-- 
        <div class="leftx"  >
           <img class="imagex" src=url("../img/about.jpg") alt="Image">
        </div>
           --}}


           <div class="leftx">
            <img class="imagex" src="{{ asset('/public/img/donner.jpg') }}" alt="Image">
        </div>
        

       <div class="rightx" style="padding-top: 0px;" >

         <h1>Qui nous sommes</h1>
         <hr class="divider-line" style="max-width:100%;width:100px;color: red;margin-left: 0px;margin-top: 15px;margin-bottom: 15px;">

         <h2 style="text-align: justify;">
           Nous sommes une équipe passionnée dédiée à la promotion du don de sang et à la sauvegarde des vies.
           Notre mission est de faciliter la recherche de donneurs de sang pour répondre aux besoins urgents des patients.
           Nous croyons en la générosité et en l'impact positif que chaque personne peut avoir en faisant don de son sang.
           Avec notre plateforme conviviale et sécurisée, vous pouvez trouver rapidement des donneurs compatibles près de chez vous.
           Nous nous engageons à garantir la confidentialité des informations et à assurer une expérience agréable et fiable pour tous les utilisateurs.
           <p>   </p>
          <br> Rejoignez-nous dans notre lutte pour sauver des vies et devenir un héros du don de sang  
         
         </h2>
         
   
         <!-- <a href="#about" class="btn-get-started scrollto"> Learn more </a> -->
         <a href="{{ route('donner') }}" class="btn-get-started1 scrollto">Donner maintenant </a>
       </div>
    </section>
    <!-- ======= CONTACT US Section ======= -->


    {{-- ways to help --}}
    <section id="WTH" >
        <div class="lefty">
          <h1>Ways to help</h1>
          <hr class="divider-line" style="max-width:100%;width:100px;color: red;margin-top: 10px; margin-left: 0px;">

          <h2 style="text-align: justify;">Blood Center is public donation center with blood donation members in the changing health care system. Founded in 1978, Blood Center is one of the nation’s oldest and largest nonprofit transfusion medicine organizations. We provide a blood and volunteer services across the US. With our national footprint, deep community roots and specialized services, we are the thread that connects people and resources together to fuel progress in transfusion medicine. </h2>
          <h3> &nbsp;</h3>
          <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> Inspiring people to give blood</h4>
          <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> Specialist blood donors and clinical supervision.</h4>
          <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> High quality assessment, diagnosis and treatment.</h4>
          <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> Offering specialized patient services and pharmaceuticals</h4>
          <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> Increasing communication with our members.</h4>
          <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> Producing a safe and ready blood supply</h4>

        </div>

        <div class="righty">
            <img class="imagey"  src="{{ asset('/public/img/waystohelp.jpg') }}" alt="Image">
        </div>
      </section>

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


    <section   style="background: url('../public/img/zzzee.jpg');height: 337px;width:99%">

        <h1
            style="margin-left: 150px;
        padding-top: 25px;
        font-weight: 600;
        /* font-style: normal; */
        font-family: 'Poppins', sans-serif;
        color: #000000;
        font-size: 46px;
        letter-spacing: 1px;
      ">
            Devenir Un Donneur Du Sang</h1>
        <hr class="divider-line" style="max-width:100%;width:100px;color: red;margin-left: 150px;margin-top: 0px;">


        <h3
            style="margin-left: 150px;  font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
        font-size: 17px;
        line-height: 1.42857143;
        color: #636a6d;">
            Tous les types de sang sont nécessaires pour aider les patients</h3>

        <!-- ajourer ici le lien du button  -->
        <a href="{{ route('donner') }}"><button   style="
          font-family: Raleway, sans-serif;          
          text-transform: uppercase;
          font-weight: 500;
          font-size: 14px;
          letter-spacing: 1px;
          display: inline-block;
          padding: 12px 0px;
          margin-top: 30px;
          border-radius: 50px;
          transition: 0.5s;
          color: #ffffff;
          background: #ff0000;
          margin-left:145px;
          padding-left: 80px;
          padding-right: 80px;
          border:none;

      
        
        ">
                DONNER</button></a>


    </section>




    <style>




        /*--------------------------------------------------------------
        # qns Section
        --------------------------------------------------------------*/
       
        #QNS     {
          width: 99%;
          height: 90vh;
          background-size: cover;
          margin-bottom: 00px;
          display: flex;
          margin-top: -100px
      
        }
        .imagex {
         width: 120% ;
         height: 550px;
         margin-left: -70px;
         margin-top: 40px;
        } 
      
       .rightx{
      background-color: rgb(255, 255, 255);
      width: 700px;
      height: 400px;
      margin-top: 70px;
      margin-left: 100px;
      padding-left: 30px;
      padding-right: 30px;
      
       }
        #QNS h1 {
          margin: 0;
          font-size: 40px;
          font-weight: 600;
          line-height: 1,3;
          text-transform: uppercase;
          color: rgb(0, 0, 0);
          font-family: 'Poppins', sans-serif;
        }
        
        #QNS h2 {
          color: gray;
          margin: 25px 0 0 0;
          font-size: 20px;
          font-weight: 100;
          font-family: 'Poppins', sans-serif;
        }
      
        
        #QNS .btn-get-started1 {
          font-family: "Raleway", sans-serif;
          text-transform: uppercase;
          font-weight: 500;
          font-size: 14px;
          letter-spacing: 1px;
          display: inline-block;
          padding: 12px 35px;
          margin-top: 30px;
          border-radius: 50px;
          transition: 0.5s;
          color: #ffffff;
          background: #ff0000;
          margin-right: 40px;
          padding-left: 80px;
          padding-right: 80px;
        }
        
        #QNS .btn-get-started1:hover {
          background: #4f4f4f;
          color: #ffffff;
        
        }
        
        @media (min-width: 1024px) {
          #QNS {
            background-attachment: fixed;
          }
        }
        
        @media (max-width: 992px) {
          #QNS {
            margin-bottom: 0;
            height: 100vh;
          }
        
          #QNS .container {
            padding-bottom: 63px;
          }
        
          #QNS h1 {
            font-size: 28px;
            line-height: 36px;
          }
        
          #QNS h2 {
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 30px;
          }
        }
        
        @media (max-height: 600px) {
          #QNS {
            height: 110vh;
          }
        }
        
      
      
        
      /*--------------------------------------------------------------
      # ways to help  
      --------------------------------------------------------------*/
      #WTH     {
          width: 99%;
          height: 90vh;
          background-size: cover;
          margin-bottom: 00px;
          display: flex;
        
        }
        .imagey {
         width: 740px;
         height: 600px;
         margin-left: 60px;
        
        
        } 
      
       .righty{ 
      
      width: 600px;
      height: 400px;
      
      
       }
       .lefty{
          width: 600px;
          margin-left: 120px;
      
      
      
      
       }
        #WTH h1 {
          margin: 0;
          font-size: 40px;
          font-weight: 600;
          line-height: 1,3;
          text-transform: uppercase;
          color: rgb(0, 0, 0);
          font-family: 'Poppins', sans-serif;
        }
        
        #WTH h2 {
          color: gray;
          margin: 25px 0 0 0;
          font-size: 20px;
          font-weight: 100;
          font-family: 'Poppins', sans-serif;
        }
        #WTH h3 {
          color: rgb(85, 85, 85);
          font-size: 20px;
          font-weight: 600;
          font-family: 'Poppins', sans-serif;
          margin-top: 25px;
          margin-bottom: 25px;
        }
        #WTH h4 {
          color: gray;
          margin: 20px 0 0 0;
          font-size: 15px;
          font-weight: 100;
          font-family: 'Poppins', sans-serif;
        }
        
        @media (min-width: 1024px) {
          #WTH {
            background-attachment: fixed;
          }
        }
        
        @media (max-width: 992px) {
          #WTH {
            margin-bottom: 0;
            height: 100vh;
          }
        
          #WTH .container {
            padding-bottom: 63px;
          }
        
          #WTH h1 {
            font-size: 28px;
            line-height: 36px;
          }
        
          #WTH h2 {
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 30px;
          }
        }
        
        @media (max-height: 600px) {
          #WTH {
            height: 110vh;
          }
        }
      </style>
@endsection
