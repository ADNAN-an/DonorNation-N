@extends('layouts.master')

@section('title')
   {{ ($user_profile_data->name) ? $user_profile_data->name : 'Usser Profile' }}
@endsection

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <style>
    /* for card */
.card {
    width: 750px;
    border: none;
    border-radius: 5px;
    background-color: #ffffff;
    margin-left: 300px;
    padding-bottom: 15px;
    padding-top: 15px;
    border: 1px solid gray;
}

.stats {
    background: #f2f5f8 !important;
    color: #000 !important
}

.articles {
    font-size: 10px;
    color: #a1aab9
}

.number1 {
    font-weight: 500
}

.followers {
    font-size: 10px;
    color: #a1aab9
}

.number2 {
    font-weight: 500
}

.rating {
    font-size: 10px;
    color: #a1aab9
}

.number3 {
    font-weight: 500
}
/* for card end*/
  </style>
@endsection

@section('content')

<section style="background-color: #e5e5e5a4">
  <div class="searchResult container">

      <div class="row ">
    <h3 class="text-primary" style="margin-left:600px;margin-bottom:50px;font-weight:700;"> PROFILE </h3> <br>
            {{-- <div class="card card-primary col-md-4">
                <div >
                    <div class="image">
                        <img src="{{ Voyager::image($user_profile_data->avatar) }}" class="rounded" width="300">
                        </div>

                </div>
            </div> --}}

            <div class="card card-primary col-md-8">
                <div>
                               <h4 class="mb-10 mt-20">Nom    &nbsp;  &emsp; &emsp; &emsp;&emsp; &emsp; &emsp;&emsp; &emsp;  <span class="text-dangerx" style="color: rgb(162, 162, 172)"> {{ $user_profile_data->name  }}  </span></h4>
                               <hr>                         
                               <h4 class="mb-10 mt-10">Prénom  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;  <span class="text-dangerx"> {{ $user_profile_data->prenom  }}</span></h4>
                               <hr>
                               <h4 class="mb-10 mt-10">Email  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <span class="text-dangerx"> {{ $user_profile_data->email  }} </span></h4>
                               <hr>
                               <h4 class="mb-10 mt-10">Numéro de Téléphone   &nbsp; &nbsp;  &emsp;  <span class="text-dangerx"> {{ $user_profile_data->phone_number  }} </span> </h4>
                               <hr>
                                <h4 class="mb-10 mt-10">Ville  &nbsp;  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <span class="text-dangerx"> {{ $user_profile_data->City->name  }} </span></h4>
                                <hr>
                                 <h4 class="mb-10 mt-10">Type De Sang   &nbsp; &nbsp; &emsp; &emsp; &emsp; &emsp; <span class="text-dangerx"> {{ $user_profile_data->BloodGroup->BloodGroup  }} </span></h4>
                                 <hr>
                                <h4 class="mb-20 mt-10">Date Du Dernier Don  &nbsp;  &emsp; &emsp;<span class="text-dangerx"> Le  {{ $user_profile_data->DateDernierDon }}  On ( {{ ($user_profile_data->created_at)->diffForHumans()  }} ) </span></h4>

                </div>
            </div>

     </div>

 </div>
</section>

@endsection
