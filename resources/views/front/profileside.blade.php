<div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action " href="{{ url('/user/profile') }}" role="tab"
            aria-controls="list-home">Profile</a>
        <a class="list-group-item list-group-item-action" id="list-logout-list" data-bs-toggle="list"
            href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

{{-- <script>
    const triggerTabList = document.querySelectorAll('#myTab a')
    triggerTabList.forEach(triggerEl => {
    const tabTrigger = new bootstrap.Tab(triggerEl)
    
    triggerEl.addEventListener('click', event => {
    event.preventDefault()
    tabTrigger.show()
    })
    })
</script> --}}