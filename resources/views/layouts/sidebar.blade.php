<div class="h-full flex flex-col justify-between align-items-center">
    <a href="/" class="row row-p link-body-emphasis text-decoration-none" title="Icon-only" data-bs-toggle="tooltip"
        data-bs-placement="right">
        <img src="{{ asset('logo.png') }}" class="w-full h-auto p-2" alt="">
        <span class="visually-hidden">Icon-only</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item">
            <a href="/" title="Home"
                class="{{ Request::is('/') ? 'nav-link active' : 'nav-link' }} py-4 rounded-0">
                <i class="fa-solid fa-house fa-2xl"></i>
            </a>
        </li>
        <li>
            <a href="/project" title="Project"
                class="{{ Request::is('project') ? 'nav-link active' : 'nav-link' }} py-4 rounded-0">
                <i class="fa-solid fa-hospital-user fa-2xl"></i>
            </a>
        </li>
        <li>
            <a href="/sample" title="Sample"
                class="{{ Request::is('sample') ? 'nav-link active' : 'nav-link' }} py-4 rounded-0">
                <i class="fa-solid fa-file fa-2xl"></i>
            </a>
        </li>
        <li>
            <a href="/setting" title="Setting"
                class="{{ Request::is('setting') ? 'nav-link active' : 'nav-link' }} py-4 rounded-0">
                <i class="fa-solid fa-gear fa-2xl"></i>
            </a>
        </li>
    </ul>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();" id="logout"
            class="nav-link py-4 rounded-0">
            <i class="fa-solid fa-right-from-bracket fa-2xl"></i>
        </a>
    </form>
</div>
