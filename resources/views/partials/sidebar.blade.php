<aside class="w-64 h-screen bg-white shadow-md flex flex-col justify-between sticky top-0">
    <div>
        <!-- Logo -->
        <div class="flex justify-end items-center h-24 border-b px-4">
            <img src="/images/alatku.png" alt="Logo" class="h-17 w-auto object-contain">
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-2 text-sm">
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Beranda</a>

            <!-- Submenu Kelola Akses dengan dropdown -->
            <div class="relative submenu-container">
                <button onclick="toggleSubmenu(this)" class="w-full text-left py-2 px-3 rounded hover:bg-orange-100 focus:outline-none text-base">
                    <div class="flex items-center">
                        <span class="text-sm mr-20">Kelola Akses</span>
                        <svg class="w-4 h-4 transition-transform duration-200 ease-in-out transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </button>
                <div class="pl-3 ml-2 space-y-1 submenu hidden text-sm border-l border-orange-300">
                    <a href="/users" class="block py-2 px-3 rounded hover:bg-orange-100 {{ request()->is('users') ? 'bg-orange-200 text-orange-800 font-semibold' : '' }}">Kelola User</a>
                    <a href="/roles" class="block py-2 px-3 rounded hover:bg-orange-100 {{ request()->is('roles') ? 'bg-orange-200 text-orange-800 font-semibold' : '' }}">Kelola Role</a>
                </div>
                <script>
                    function toggleSubmenu(button) {
                        const submenu = button.nextElementSibling;
                        const icon = button.querySelector('svg');
                        submenu.classList.toggle('hidden');
                        icon.classList.toggle('rotate-180');
                    }
                </script>
            </div> 
            <a href="/categories" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Kategori</a>
            <a href="/articles" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Artikel</a>
            <a href="/subcategories" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Sub Kategori</a>
            <a href="/products" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Produk</a>
            <a href="/ulasans" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Ulasan</a>
            <a href="/carousel" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Carousel</a>
            <a href="/contacts" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Kontak</a>
            <a href="/howtobuys" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Cara Membeli</a>
            <a href="/websiteprofiles" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Profile Website</a>
        </nav>
    </div>
    <!-- Logout button -->
    <div class="p-4 border-t">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center w-full py-2 px-3 rounded text-sm text-red-600 hover:bg-red-100">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>

<script>
function toggleSubmenu(button) {
    const submenu = button.nextElementSibling;
    const icon = button.querySelector('svg');
    submenu.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}

document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    
    if (currentPath.includes('/users') || currentPath.includes('/roles')) {
        const submenuContainer = document.querySelector('.submenu-container');
        const submenu = submenuContainer.querySelector('.submenu');
        const icon = submenuContainer.querySelector('svg');
        
        submenu.classList.remove('hidden');
        icon.classList.add('rotate-180');
    }
});
</script>