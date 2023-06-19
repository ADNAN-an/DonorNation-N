@extends('layouts.master')

@section('title')
  {{ ($post->title) ?? 'Blog' }}
@stop

@section('styles')
@stop

@section("content")
    <section id="doctors" class="doctors">
      <div class="container my-5">

        <div class="section-title">
          <h2>{{ ($post->title) ?? '' }}</h2>
        </div>

        <div class="row">
         <div class="col-lg-12">
            <div class="member">
              <div class="d-flex justify-content-center"><img src="{{ ($post) ?  Voyager::image( $post->image ) : '' }}" style="width: 80%;height: 500px"  class="image" alt="{{ ($post->title) ?? '' }}"></div>
              <div class="my-5 d-flex justify-content-center">
                <h1>{{ ($post->title) ?? ''  }}</h1><br>

              </div>
              <p>
                    {!! ($post->body) ?? ''  !!}
                </p>
            </div>
          </div>

          <div class="member my-5">
            <h6>Comments</h6>
            <div id="disqus_thread"></div>
          </div>


        </div>



      </div>
    </section>
@endsection

@section('scripts')
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://http-donornation-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection
