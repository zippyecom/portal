<footer class="footer @if(url()->current() == route('footer-dark')) footer-dark @endif @if(url()->current() == route('footer-fixed')) footer-fix @endif">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 footer-copyright">
            <p class="mb-0">Copyright {{date('Y')}} © Xolo All rights reserved.</p>
         </div>
         <div class="col-md-6">
            <p class="pull-right mb-0">Hand crafted & made with &nbsp;<i class="fa fa-heart"></i></p>
         </div>
      </div>
   </div>
</footer>