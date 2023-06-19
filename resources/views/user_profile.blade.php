@extends('layouts.master')

@section('title')
   {{ ($user_profile_data->name) ? $user_profile_data->name : 'Usser Profile' }}
@endsection

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <style>
    /* for card */
.card {
    width: 400px;
    border: none;
    border-radius: 10px;
    background-color: #fff
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

<section>
  <div class="searchResult container">

      <div class="row ">
    <h3 class="text-primary">User Profile Data : </h3> <br>
            <div class="card card-primary col-md-4">
                <div >
                    <div class="image">
                        <img src="{{ Voyager::image($user_profile_data->avatar) }}" class="rounded" width="300">
                        </div>

                </div>
            </div>

            <div class="card card-primary col-md-8">
                <div>
                            <h4 class="mb-0 mt-0">Username : <span class="text-danger"> {{ $user_profile_data->name  }} {{ $user_profile_data->prenom  }} </span></h4>
                               <br>
                               <h4 class="mb-0 mt-0">Email : <span class="text-danger"> {{ $user_profile_data->email  }} </span></h4>
                               <br>
                             <h4 class="mb-0 mt-0">Téléphone: <span class="text-danger"> {{ $user_profile_data->phone_number  }} </span> </h4>
                               <br>
                              <h4 class="mb-0 mt-0">Ville :   <span class="text-danger"> {{ $user_profile_data->City->name  }} </span></h4>
                                 <br>
                                 <h4 class="mb-0 mt-0">BloodGroup : <span class="text-danger"> {{ $user_profile_data->BloodGroup->BloodGroup  }} </span></h4>
                                 <br>
                            <h4>DateDernierDon :  <span class="text-danger"> Le  {{ $user_profile_data->DateDernierDon }}  On ( {{ ($user_profile_data->created_at)->diffForHumans()  }} ) </span></h4>

                </div>
            </div>

     </div>

 </div>
</section>

@endsection
