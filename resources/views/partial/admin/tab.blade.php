<div class="flex flex-col tab_admin">
    @php($currentUrl = \Illuminate\Support\Facades\URL::current())
    <a href="{{ route('admin.manga.manage') }}" class="{{ str_contains($currentUrl, 'manga') ? 'active_tab' : '' }}">
        <span>
            Manga Management
        </span>
    </a>
    <a href="{{ route('admin.user.manage') }}" class="{{ str_contains($currentUrl, 'user') ? 'active_tab' : '' }}">
        <span>
            User Management
        </span>
    </a>
    <a href="{{ route('logout') }}">
        <span>
            Logout
        </span>
    </a>
</div>
