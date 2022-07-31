   <aside>
       <div class="sidenav position-sticky d-flex flex-column justify-content-between">
           <a class="navbar-brand" href="{{ url('/') }}" class="logo">
               <h1> Mehedi Vlogs </h1>
               <!-- <img  src="{{ asset('/frontend/assets/') }}/images/logo.png" alt=""> -->
           </a>
           <!-- end of navbar-brand -->

           <div class="navbar navbar-dark my-4 p-0 font-primary">
               <ul class="navbar-nav w-100">
                   <li class="nav-item active">
                       <a class="nav-link text-white px-0 pt-0" href="{{ url('/') }}">Home</a>
                   </li>
                   <li class="nav-item ">
                       <a class="nav-link text-white px-0" href="{{ url('/aboutus') }}">About</a>
                   </li>
                   <li class="nav-item ">
                       <a class="nav-link text-white px-0" href="{{ url('/contactus') }}">Contact</a>
                   </li>
                   <li class="nav-item  accordion">
                       <div id="drop-menu" class="drop-menu collapse">
                           <a class="d-block " href="#">Category</a>
                           <a class="d-block " href="#">Privacy &amp; Policy</a>
                       </div>
                       <a class="nav-link text-white" href="#!" role="button" data-toggle="collapse"
                           data-target="#drop-menu" aria-expanded="false" aria-controls="drop-menu">Pages</a>
                   </li>
               </ul>
           </div>
           <!-- end of navbar -->

           <ul class="list-inline nml-2">
               <li class="list-inline-item">
                   <a href="#!" class="text-white text-red-onHover pr-2">
                       <span class="fab fa-twitter"></span>
                   </a>
               </li>
               <li class="list-inline-item">
                   <a href="#!" class="text-white text-red-onHover p-2">
                       <span class="fab fa-facebook-f"></span>
                   </a>
               </li>
               <li class="list-inline-item">
                   <a href="#!" class="text-white text-red-onHover p-2">
                       <span class="fab fa-instagram"></span>
                   </a>
               </li>
               <li class="list-inline-item">
                   <a href="#!" class="text-white text-red-onHover p-2">
                       <span class="fab fa-linkedin-in"></span>
                   </a>
               </li>
           </ul>
           <!-- end of social-links -->
       </div>
   </aside>
