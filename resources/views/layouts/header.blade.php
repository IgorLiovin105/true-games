<header class="header">
    <div class="header__container">
        <a href="{{ route('main') }}" class="header__logo">True Games</a>
        <button id="menu-icon" class="header__icon"><span></span><span></span><span></span></button>
        <nav id="menu" class="header__menu menu">
            <ul class="menu__list">
                @guest
                    <li><a href="{{ route('register') }}" class="menu__link">Регистрация</a></li>
                    <li><a href="{{ route('login') }}" class="menu__link">Вход</a></li>
                @endguest
                @auth
                    @if (auth()->user()->login == 'admin')
                        <li><a href="{{ route('repairsPage') }}" class="menu__link">Посмотреть заказы</a></li>
                        <li><a href="{{ route('createProduct') }}" class="menu__link">Создать товар</a></li>
                    @endif
                    <li><a href="{{ route('cart') }}" class="menu__link">Коризна <span style="color: #fff"
                        id="cart-quantity">{{ App\Models\Cart::where('user_id', auth()->user()->id)->where('status', 'added')->count() }}</span></a>
                    </li>
                    <li><a href="{{ route('profile') }}" class="menu__link">{{ auth()->user()->name }}</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="menu__link">Выход</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
