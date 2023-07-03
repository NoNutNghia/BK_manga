<header class="flex flex-row items-center justify-between header_admin">
    <a href="{{ route('admin.manga.manage') }}">
        <img width="150px" src="{{ asset('storage/logo/Bkmanga.svg') }}" alt="">
    </a>
    <div id="admin_nick_name">
        <span class="text-[#566FEF]">
            {{ \Illuminate\Support\Facades\Auth::user()->nick_name }}
        </span>
    </div>
</header>

<script type="text/javascript">
    function getCSRFToken() {
        return '{{ csrf_token() }}'
    }
</script>
