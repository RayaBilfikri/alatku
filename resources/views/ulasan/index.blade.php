@extends("layouts.ulasan")


@section('content')


@if (session('review_notifications'))
    <div id="notification-container" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 max-w-md">        
        @foreach (session('review_notifications') as $notification)
            <div class="{{ $notification['type'] == 'success' ? 'bg-emerald-50 border-emerald-500 text-emerald-700' : 'bg-rose-50 border-rose-500 text-rose-700' }} border-l-4 px-4 py-3 rounded shadow-sm mb-3 flex items-center justify-between notification-item" data-notification-id="{{ $loop->index }}">
                <div class="flex items-center">
                    @if ($notification['type'] == 'success')
                        <svg class="w-5 h-5 mr-2 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    @else
                        <svg class="w-5 h-5 mr-2 text-rose-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                    @endif
                    <p class="text-sm">{{ $notification['message'] }}</p>
                </div>
                <button type="button" class="text-gray-400 hover:text-gray-600 ml-2 flex-shrink-0" onclick="this.parentElement.remove()">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endforeach
    </div>
@endif

    <div class="container mx-auto px-4 py-6">
        <div class="flex items-center mb-6 flex-wrap gap-2 sm:gap-0 sm:flex-nowrap">
            <a href="{{ route('home') }}" class="group flex items-center text-gray-800 hover:text-orange-600 transition-colors duration-200">
                <div class="p-2 rounded-full group-hover:bg-blue-50 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                <span class="ml-1 text-xl font-medium">Ulasan</span>
            </a>
            
            <button id="btnLihatUlasanTertunda" class="ml-auto bg-[#F86F03] text-white px-4 py-2 rounded-full drop-shadow-xl flex items-center font-montserrat hover:bg-orange-600">
                Lihat ulasan tertunda
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        
        <!-- Review Section -->
        @if($approvedReviews->count() > 0)
            @foreach ($approvedReviews as $ulasan)
                <div id="ulasanList" class="flex items-start space-x-2 sm:space-x-4 max-w-[1241px] font-montserrat mb-4">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="w-12 h-12 rounded-full">
                    </div>

                    <div class="flex-grow">
                        <div class="mb-1">
                            <h3 class="font-medium text-gray-800">{{ $ulasan->user->name }}</h3>
                            <span class="text-xs text-gray-500">{{ $ulasan->user->type ?? 'user' }}</span>
                            <div class="review-meta">
                                <span class="text-xs text-gray-400">{{ $ulasan->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md shadow-[4px_4px_13px_0px_rgba(0,_0,_0,_0.1)]">
                            <p class="text-gray-600 p-3 sm:p-4 text-sm sm:text-base">{{ $ulasan->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else

            <div class="flex flex-col items-center justify-center py-16 px-4 max-w-[1241px] mx-auto font-montserrat">
                <!-- Empty State Illustration -->
                <div class="relative mb-8">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <!-- Floating dots animation -->
                    <div class="absolute -top-2 -right-2 w-4 h-4 bg-yellow-300 rounded-full animate-bounce"></div>
                    <div class="absolute -bottom-1 -left-3 w-3 h-3 bg-pink-300 rounded-full animate-pulse"></div>
                    <div class="absolute top-4 -left-4 w-2 h-2 bg-blue-300 rounded-full animate-ping"></div>
                </div>

                <!-- Main Message -->
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-700 mb-3">
                        Belum Ada Ulasan yang Diterima
                    </h3>
                    <p class="text-gray-500 text-lg leading-relaxed max-w-md mx-auto">
                        Sabar ya! Ulasan sedang dalam proses moderasi. 
                        <span class="inline-block animate-bounce">⏳</span>
                    </p>
                </div>

                <!-- Fun Loading Animation -->
                <div class="flex items-center space-x-2 mb-6">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0s"></div>
                        <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                        <div class="w-2 h-2 bg-pink-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                    </div>
                    <span class="text-sm text-gray-400 font-medium">Tunggu saja!</span>
                </div>

                <!-- Encouraging Message -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 text-center border border-blue-100 shadow-sm">
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <span class="font-semibold text-blue-600">Tips:</span> 
                        Ulasan yang berkualitas akan segera muncul di sini setelah diverifikasi tim kami
                        <span class="inline-block ml-1">✨</span>
                    </p>
                </div>
            </div>
        @endif


        <!--data injection-->
        <div id="user-data"
            data-name="{{ auth()->user()->name }}"
            data-type="{{ Auth::user()->usertype }}">
        </div>

        <!-- Popup for Pending Review -->
        <div id="pendingReviewPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden font-montserrat">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Status</h3>
                    <span class="bg-[#F86F03] text-white px-3 py-1 rounded-full">Pending</span>
                </div>
                <p class="text-gray-600 mb-4">Ulasan Anda sedang dalam proses peninjauan dan menunggu persetujuan sebelum ditampilkan</p>
                <button id="closePendingPopup" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md w-full">Close</button>
            </div>
        </div>

        <!-- Popup for Viewing Pending Reviews -->
        <div id="viewPendingReviewsPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden font-montserrat popup-backdrop">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full popup-content transition-all duration-300 transform scale-95 opacity-0">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Ulasan Tertunda</h3>
                    <button id="closePendingReviewsPopup" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <!-- Content with Reviews -->
                @if(count($pendingReviews) > 0)
                <div id="reviewsContent" class="overflow-y-auto max-h-[300px] space-y-4 pr-2">
                    @foreach ($pendingReviews as $index => $ulasan)
                        <div class="bg-white rounded-lg border border-gray-200 p-4 flex items-start w-full max-w-[782px] font-montserrat review-item">
                            <div class="flex-shrink-0 mr-4">
                                <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full flex-shrink-0">
                            </div>
                            <div class="flex-grow">
                                <div class="flex items-center mb-1">
                                    <h3 class="font-medium text-gray-800">{{ $ulasan->user->name }}</h3>
                                </div>
                                <span class="text-xs text-gray-500">{{ $ulasan->user->type ?? 'user' }}</span>
                                <p class="text-gray-600 ml-2">{{ $ulasan->content }}</p>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <span class="bg-[#F86F03] text-white px-3 py-1 rounded-full">Pending</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                <!-- Empty State -->
                <div id="emptyState" class="text-center py-12 empty-state">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Ulasan Tertunda</h3>
                    <p class="text-gray-500">Semua ulasan telah dimoderasi</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Review Input Field -->
        <div class="fixed bottom-8 left-0 right-0 flex justify-center font-montserrat">
            <form id="ulasanForm" class="flex items-center bg-white w-full max-w-[1380px] h-[75px] rounded-full shadow-md px-6 mx-4">
                <input 
                    type="text" 
                    id="ulasanInput" 
                    name="content" 
                    placeholder="Berikan tanggapan anda mengenai produk dan layanan kami . . . . ." 
                    class="flex-grow border-none focus:ring-0 focus:outline-none text-gray-700"
                >
                <button type="submit" class="ml-2 sm:ml-4 bg-[#F86F03] rounded-full p-1.5 sm:p-2 text-white hover:bg-opacity-90 transition flex-shrink-0">         
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="transform: rotate(90deg);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endsection



@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const ulasanForm = document.getElementById('ulasanForm');
    const ulasanInput = document.getElementById('ulasanInput');
    const userDataDiv = document.getElementById('user-data');
    const loggedInUserName = userDataDiv.dataset.name;
    const loggedInUserType = userDataDiv.dataset.type;
    const viewPendingReviewsPopup = document.getElementById('viewPendingReviewsPopup');
    const popupContent = viewPendingReviewsPopup.querySelector('.popup-content');
    const pendingReviewPopup = document.getElementById('pendingReviewPopup');
    const closePendingPopup = document.getElementById('closePendingPopup');
    const btnLihatUlasanTertunda = document.getElementById('btnLihatUlasanTertunda');
    const closePendingReviewsPopup = document.getElementById('closePendingReviewsPopup');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const url = "{{ route('ulasan.store') }}";
    const notifications = document.querySelectorAll('#notification-container .notification-item');

    // Fungsi buka popup dengan animasi
    function openPendingReviewsPopup() {
        viewPendingReviewsPopup.classList.remove('hidden');
        setTimeout(() => {
            popupContent.classList.remove('scale-95', 'opacity-0');
            popupContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    // Fungsi tutup popup dengan animasi
    function closePendingReviewsPopupFunc() {
        popupContent.classList.remove('scale-100', 'opacity-100');
        popupContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            viewPendingReviewsPopup.classList.add('hidden');
        }, 300);
    }

    // Submit review
    ulasanForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const content = ulasanInput.value.trim();
        if (content === '') return;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json', 
            },
            body: JSON.stringify({ content: content })
        })
        .then(response => response.json())
        .then(data => {
            ulasanInput.value = '';
            pendingReviewPopup.classList.remove('hidden');
            btnLihatUlasanTertunda.classList.remove('hidden');

            const container = viewPendingReviewsPopup.querySelector('.overflow-y-auto');
            const newReview = document.createElement('div');
            newReview.className = "bg-white rounded-lg border border-gray-200 p-4 flex items-start w-full max-w-[782px] font-montserrat";
            newReview.innerHTML = `
                <div class="flex-shrink-0 mr-4">
                    <img src="${window.location.origin}/images/user.png" alt="User Avatar" class="w-12 h-12 rounded-full">
                </div>
                <div class="flex-grow">
                    <div class="flex items-center mb-1">
                    <h3 class="font-medium text-gray-800">${loggedInUserName}</h3>
                    </div>
                    <span class="text-xs text-gray-500">${loggedInUserType}</span>
                    <p class="text-gray-600 ml-2">${content}</p>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <span class="bg-[#F86F03] text-white px-3 py-1 rounded">Pending</span>
                </div>
            `;
            container.prepend(newReview);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Close pending review popup
    closePendingPopup.addEventListener('click', function() {
        pendingReviewPopup.classList.add('hidden');
    });

    // Event buka/tutup popup dengan animasi
    btnLihatUlasanTertunda.addEventListener('click', openPendingReviewsPopup);
    closePendingReviewsPopup.addEventListener('click', closePendingReviewsPopupFunc);

    // Animasi notifikasi (tetap sama)
    notifications.forEach((notification) => {
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s ease-in-out';
        setTimeout(() => {
            notification.style.opacity = '1';
        }, 100);
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-10px)';
            notification.style.transition = 'opacity 0.3s ease-in-out, transform 0.3s ease-in-out';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    });
});

</script>
@endpush
