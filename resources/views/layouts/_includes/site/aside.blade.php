<div class="side-menu-wrapper">
    <div class="sm-header">
        <div class="menu-close">
            <i class="ti-arrow-left"></i>
        </div>
        <a href="index.html" class="site-logo">
            <img src="/timeline/img/logo.png" alt="">
        </a>
    </div>
    <nav class="main-menu">
        <ul>
            <li><a href="{{url('/')}}" class="active">Home</a></li>
            <li><a href="about.html">About</a></li>

            <li><a href="contact.html">Contact</a></li>
            @if (null == Auth::user())
                <li><a href="{{ route('inscrever-se') }}">Inscrever-ser</a></li>
               
                    <li><a href="{{route('login')}}">Iniciar sessão</a></li>
            @endif
            @if (null != Auth::user())
            <li><a href="{{ route('timeline.index',['slug'=>Auth::User()->slug]) }}" >Timeline</a></li>
            <li><a href="{{ route('inscrever-se') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        @endif
        </ul>
    </nav>
    <div class="sm-footer">
        <div class="sm-socail">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter-alt"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
            <a href="#"><i class="ti-instagram"></i></a>
        </div>
        <div class="copyright-text">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="ti-heart"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</div>
