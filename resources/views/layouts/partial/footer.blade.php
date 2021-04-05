<footer class="footer">
    <div class="container">
    <div class="row">
        <div class="col-md-4 mt-4">
        <img src="{{asset('assets/images/white.png')}}" width="240px" height="180px"/>
        <p>
          Your Number One trusted source of bike information website.
        </p>
        Copyright © {{date('Y')}} AjkerBikeBazar
        </div>
        <div class="col-md-4  mt-4">
        <h5 class="mt-4">Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="footer-link" href="#">Cool stuff</a></li>
          <li><a class="footer-link" href="#">Random feature</a></li>
          <li><a class="footer-link" href="#">Team feature</a></li>
          <li><a class="footer-link" href="#">Stuff for developers</a></li>
          <li><a class="footer-link" href="#">Another one</a></li>
          <li><a class="footer-link" href="#">Last time</a></li>
        </ul>
        </div>
        <div class="col-md-4  mt-4">
        <h5 class="mt-4">Useful link</h5>
        <ul class="list-unstyled text-small">
          <li><a class="footer-link" href="#">About Us</a></li>
          <li><a class="footer-link" href="{{route('site.contact')}}">Contact Us</a></li>
          <li><a class="footer-link" href="{{route('site.privacy-policy')}}">Privacy Policies</a></li>
          <li><a class="footer-link" href="{{route('site.terms-and-conditions')}}">Terms and Conditions</a></li>
          <li><a class="footer-link" href="{{route('site.disclaimer')}}">Disclaimer</a></li>
        </ul>
        </div>
    </div></div>
  </footer>