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
        <div class="flex items-center mb-6">
            <a href="{{ route('home') }}" class="flex items-center text-gray-800 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="ml-2 text-xl font-medium">Ulasan</span>
            </a>
            
            <button id="btnLihatUlasanTertunda" class="ml-auto bg-[#F86F03] text-white px-4 py-2 rounded-full drop-shadow-xl flex items-center font-montserrat hover:bg-orange-600">
                Lihat ulasan tertunda
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Review Section -->
        @foreach ($approvedReviews as $ulasan)
            <div id="ulasanList" class="flex items-start space-x-4 max-w-[1241px] font-montserrat mb-4">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="w-12 h-12 rounded-full">
                </div>

                <div class="flex-grow">
                    <div class="mb-1">
                        <h3 class="font-medium text-gray-800">{{ $ulasan->user->name }}</h3>
                        <span class="text-xs text-gray-500">{{ $ulasan->user->type ?? 'user' }}</span>
                    </div>

                    <div class="bg-white rounded-md shadow-[4px_4px_13px_0px_rgba(0,_0,_0,_0.1)]">
                        <p class="text-gray-600 p-4">{{ $ulasan->content }}</p>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Popup for Pending Review -->
        <div id="pendingReviewPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden font-montserrat">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Status</h3>
                    <span class="bg-[#F86F03] text-white px-3 py-1 rounded">Pending</span>
                </div>
                <p class="text-gray-600 mb-4">Ulasan Anda sedang dalam proses peninjauan dan menunggu persetujuan sebelum ditampilkan</p>
                <button id="closePendingPopup" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md w-full">Close</button>
            </div>
        </div>

        <!-- Popup for Viewing Pending Reviews -->
        <div id="viewPendingReviewsPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden font-montserrat">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl w-full">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Ulasan Tertunda</h3>
                    <button id="closePendingReviewsPopup" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="overflow-y-auto max-h-[300px] space-y-4 pr-2">
                    <!-- Pending review sample -->
                    @foreach ($pendingReviews as $ulasan)
                        <div class="bg-white rounded-lg border border-gray-200 p-4 flex items-start w-full max-w-[782px] font-montserrat">
                            <div class="flex-shrink-0 mr-4">
                                <img src="{{ '/images/user.png' }}" alt="User Avatar" class="w-12 h-12 rounded-full">
                            </div>
                            <div class="flex-grow">
                                <div class="flex items-center mb-1">
                                    <h3 class="font-medium text-gray-800">{{ $ulasan->user->name }}</h3>
                                </div>
                                <span class="text-xs text-gray-500">{{ $ulasan->user->type ?? 'user' }}</span>
                                <p class="text-gray-600 ml-2">{{ $ulasan->content }}</p>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <span class="bg-[#F86F03] text-white px-3 py-1 rounded">Pending</span>
                            </div>
                        </div>
                    @endforeach
                </div>
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
                <button type="submit" class="ml-4 bg-[#F86F03] rounded-full p-2 text-white hover:bg-opacity-90 transition">
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
        const pendingReviewPopup = document.getElementById('pendingReviewPopup');
        const closePendingPopup = document.getElementById('closePendingPopup');
        const btnLihatUlasanTertunda = document.getElementById('btnLihatUlasanTertunda');
        const viewPendingReviewsPopup = document.getElementById('viewPendingReviewsPopup');
        const closePendingReviewsPopup = document.getElementById('closePendingReviewsPopup');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const url = "{{ route('ulasan.store') }}";
        const loggedInUserName = @json(auth()->user()->name);
        const loggedInUserType = @json(Auth::user()->usertype);
        const notifications = document.querySelectorAll('#notification-container .notification-item');
    
        

        // Submit review
        ulasanForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const content = ulasanInput.value.trim();
            
            if (content === '') return;
            
            // Send review to backend
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json', 
                },
                body: JSON.stringify({
                    content: content
                })
            })
            .then(response => response.json())
            .then(data => {
                // Clear input
                ulasanInput.value = '';
                
                // Show pending review popup
                pendingReviewPopup.classList.remove('hidden');

                // Show "Lihat ulasan tertunda" button
                btnLihatUlasanTertunda.classList.remove('hidden');

                // Tambahkan langsung ke popup ulasan tertunda
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
                
                // Sisipkan di paling atas
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

        // Open pending reviews popup
        btnLihatUlasanTertunda.addEventListener('click', function() {
            viewPendingReviewsPopup.classList.remove('hidden');
        });

        // Close pending reviews popup
        closePendingReviewsPopup.addEventListener('click', function() {
            viewPendingReviewsPopup.classList.add('hidden');
        });

            notifications.forEach((notification) => {
        // Fade in animation
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s ease-in-out';
        
        setTimeout(() => {
            notification.style.opacity = '1';
        }, 100);
        
        // Auto dismiss after 3 seconds
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

    tailwind.config = {
        theme: {
            extend: {
            fontFamily: {
                montserrat: ['Montserrat', 'sans-serif'],

            },
            },
        },
        }
</script>
@endpush