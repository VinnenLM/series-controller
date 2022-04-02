<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between mb-4">
        <a class="navbar-brand" href="/series">Home</a>
        @auth()
            <a class="text-danger" href="/sair">Sair</a>
        @endauth
        @guest()
            <a class="text-base" href="/entrar">Entrar</a>
        @endguest
    </nav>
</header>
