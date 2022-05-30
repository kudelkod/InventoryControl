<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
                <li><a href="{{route('categories.index')}}" class="nav-link px-2 link-dark">Категории</a></li>
                <li><a href="{{route('manufacturers.index')}}" class="nav-link px-2 link-dark">Производители</a></li>
                <li><a href="{{route('models.index')}}" class="nav-link px-2 link-dark">Модели</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="{{route('logout')}}">Выйти из системы</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
