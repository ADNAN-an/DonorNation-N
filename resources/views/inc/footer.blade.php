<footer id="footer">

    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>DONORNATION</h3>
            <p style="word-wrap: break-word;">
              {{ __('site.footer_paragraph') }}
            </p>
          </div>

               <div class="col-lg-4 col-md-6 footer-links">
                 <h4>{{ __('site.footer_information') }}</h4>
                 <ul>
                 <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">{{ __('site.home') }}</a></li>
                 <li><i class="bx bx-chevron-right"></i><a class="nav-link {{ Request::route()->getName() === 'donner' ? 'active' : '' }}" href="{{ route('donner') }}">{{ __('site.donner') }}</a></li>
                 <li><i class="bx bx-chevron-right"></i> <a href="{{ route('donorsPage') }}">{{ __('site.rechercher_donateurs') }}</a></li>
                 <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blog') }}">{{ __('site.blog') }}</a></li>
                 <li><i class="bx bx-chevron-right"></i><a class="nav-link {{ Request::route()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}#contact-us">{{ __('site.contacts') }}</a></li>
                 </ul>
               </div>

              <div class="col-lg-4 col-md-6 footer-links">
                 <div>
                 <h4>{{ __('site.contacts') }}</h4>
                 <p>Rue moulay mehdi bennani<br>
                   Tanger,Maroc</p>
                 <p>Phone: +212123456789<br>
                   Email: DonorNation@gmail.com</p>
              </div>
               <div>
                 <h4>{{ __('site.footer_social_media') }}</h4>
                  <p>{{ __('site.footer_visit_social_profiles') }} </p>
                  <div class="social-linksz text-left text-md-right pt-3 pt-md-0">
                   
                   <a href="#" class="facebook"><i class="fa-brands fa-facebook fa-2xl" style="color: #284d82;margin-right:7px"></i></i></a>
                   <a href="#" class="whatsapp"><i class="fa-brands fa-whatsapp fa-2xl" style="color: #284d82;margin-right:7px"></i></a>
                   <a href="#" class="instagram"><i class="fa-brands fa-instagram fa-2xl"  style="color: #284d82;margin-right:7px"></i></a>
                   <a href="#" class="linkedin"><i class="fa-brands fa-linkedin fa-2xl" style="color: #284d82;margin-right:7px"></i></a>
                   <a href="#" class="twitter"><i class="fa-brands fa-twitter fa-2xl" style="color: #284d82;margin-right:7px"></i></a>
                 </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    <div class="container d-md-flex py-4 " style="height: 40px;margin-top:-15px">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; 2023 <strong><span>DONORNATION</span></strong> {{ __('site.footer_rights_reserved') }}
        </div>
        <div class="credits">
          {{ __('site.footer_designed_by') }} <a href="file:///C:/Users/juan/OneDrive/Bureau/PFA/FORMULAIRE-DONOR.html">OUR-TEAM</a>
        </div>
      </div>
    </div>
  </footer>