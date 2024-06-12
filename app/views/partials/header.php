<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a class="logo" href="/">
            <h1>SupportMercado</h1>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">#</a></li>
            <li><a href="#" class="nav-link px-2 link-body-emphasis">#</a></li>
            <li><a href="#" class="nav-link px-2 link-body-emphasis">#</a></li>
            <li><a href="/produto" class="nav-link px-2 link-body-emphasis">Produtos</a></li>
        </ul>

        <form class="w-30 me-3" role="search" action="/buscar/result" method="GET">
            <input name="palavra-chave" type="search" class="form-control form-control-dark" placeholder="Buscar produto ou marca..."
                aria-label="Search">
        </form>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/assets/images/usuario.png" alt="perfil" width="40" height="40" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="/usuario/criarlista">Nova lista...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="/usuario/perfil">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/auth/logout">Sair</a></li>
            </ul>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>