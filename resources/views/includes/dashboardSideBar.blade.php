<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>TechNews</div>
    <div class="list-group list-group-flush my-3">
        <a href="/dashboard"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold @if ($page == 'Dashboard') active @endif"><i
                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>

        <a href="/dashboard/create-blog"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold @if ($page == 'Blog') active @endif"><i
                class="fas fa-plus me-2"></i>Add Blog</a>

        <a href="/dashboard/products"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-table me-2"></i>Products</a>

        <a href="/dashboard/products"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-bullhorn me-2"></i>FAQ</a>

        {{-- <a href="/dashboard/categories" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-table me-2"></i>Categories</a> --}}
        <a href="{{ route('categories.index') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold @if ($page == 'Categories') active @endif"><i
                class="fas fa-table me-2"></i>Categories</a>

        <a href="/dashboard/products"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-tags me-2"></i>Tags</a>

        <a href="{{route('message.index')}}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold @if ($page == 'Messages') active @endif"><i
                class="fas fa-comments me-2"></i>Messages</a>


        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fas fa-power-off me-2"></i>
                Logout
            </a>
        </form>




    </div>
</div>
