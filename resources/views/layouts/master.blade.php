<!-- start header -->
@include('inc.header')
<!-- End heder -->


 

  <!-- start Header Menu -->
  @include('inc.menu')
  <!-- End Header Menu -->


  @yield("content")


  <!-- start Footer -->
    @include('inc.footer')
  <!-- End Footer -->
{{--   <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sectionLink = document.querySelector('a[href="#contact-us"]');
        sectionLink.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement de lien par défaut

            const targetSection = document.getElementById('contact-us');
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
</script> --}}
@yield('scripts')
</div>
</body>
</html>
