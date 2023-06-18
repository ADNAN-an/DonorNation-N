<footer id="footer">

    <div class="footer-top">
      <div class="container">

        <div class="row">

              <div class="col-lg-4 col-md-6 footer-contact">
                <h3>DONORNATION</h3>
                <p>
                 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>
                 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>
                 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>
                 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br><br>

                </p>
              </div>

               <div class="col-lg-4 col-md-6 footer-links">
                 <h4>Information</h4>
                 <ul>
                 <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Accueil</a></li>
                 <li><i class="bx bx-chevron-right"></i><a class="nav-link {{ Request::route()->getName() === 'donner' ? 'active' : '' }}" href="{{ route('donner') }}">Donner du sang</a></li>
                 <li><i class="bx bx-chevron-right"></i> <a href="{{ route('donorsPage') }}">Rechercher des donneurs</a></li>
                 <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blog') }}">Blog</a></li>
                 <li><i class="bx bx-chevron-right"></i><a class="nav-link {{ Request::route()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}#contact-us">Contact</a></li>
                 </ul>
               </div>

              <div class="col-lg-4 col-md-6 footer-links">
                 <div>
                 <h4>Contact us</h4>
                 <p>Tanger tanger tanger tanger<br>
                   Maroc maroc maroc maroc </p>
                 <p>Phone: +2120000000<br>
                   Email: xxxxxxxxx@gmail.com</p>
              </div>
               <div>
                 <h4>Social media</h4>
                  <p>Visiter nos profiles social medias </p>
                  <div class="social-links text-left text-md-right pt-3 pt-md-0">
                   <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                   <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                   <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                   <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                   <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                 </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>DONORNATION</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="file:///C:/Users/juan/OneDrive/Bureau/PFA/FORMULAIRE-DONOR.html">OUR-TEAM</a>
        </div>
      </div>
    </div>
  </footer>