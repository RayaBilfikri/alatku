<aside class="w-64 h-screen bg-white shadow-md flex flex-col justify-between sticky top-0">
    <div>
        <!-- Logo -->
        <div class="flex justify-end items-center h-24 border-b px-4">
            <img src="/images/alatku.png" alt="Logo" class="h-17 w-auto object-contain">
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-2 text-sm">
            <a href="/dashboard" class="block py-2 px-3 rounded hover:bg-orange-100">Beranda</a>

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
            <a href="#s" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Kategori</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Artikel</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Sub Kategori</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Produk</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Ulasan</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Carousel</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Kontak</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Cara Membeli</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Profile Website</a>
        </nav>
    </div>
    <!-- Logout button -->
    <div class="p-4 border-t">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <!-- Logout button trigger modal -->
            <button type="button" onclick="showLogoutModal()" class="flex items-center w-full py-2 px-3 rounded text-sm text-red-600 hover:bg-red-100">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>

<!-- Hidden logout form -->
<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

<!-- Logout Modal -->
<div id="logoutModal" class="fixed inset-0 z-[9999] bg-black/40 flex items-center justify-center hidden">
    <div class="relative bg-white p-6 rounded-xl shadow-xl w-full max-w-md mx-auto transform transition-all scale-95">

        <!-- Tombol close -->
        <button onclick="hideLogoutModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-lg">
            &times;
        </button>

        <!-- Icon warning -->
        <div class="flex justify-center mb-4">
            <svg class="w-12 h-12 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M4.93 19h14.14a2 2 0 001.74-3l-7.07-12a2 2 0 00-3.48 0l-7.07 12a2 2 0 001.74 3z"/>
            </svg>
        </div>

        <h2 class="text-xl font-semibold text-center text-gray-800 mb-2">Konfirmasi Logout</h2>
        <p class="text-sm text-center text-gray-600 mb-6">Apakah Anda yakin ingin keluar?</p>

        <div class="flex justify-center">
            <button onclick="document.getElementById('logoutForm').submit()" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm transition">
                Logout
            </button>
        </div>
    </div>
</div>


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

function showLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('hidden');
    setTimeout(() => modal.querySelector('div').classList.replace('scale-95', 'scale-100'), 10);
}

function hideLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.querySelector('div').classList.replace('scale-100', 'scale-95');
    setTimeout(() => modal.classList.add('hidden'), 150);
}

</script>