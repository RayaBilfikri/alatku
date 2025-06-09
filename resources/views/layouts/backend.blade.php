<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>CMS - AlatKu</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="shortcut icon" href="{{ asset('image/logonobg.png') }}" type="image/png">

  <!-- <link rel="icon" href="{{ asset('template/dist') }}/assets/images/favicon.svg" type="image/x-icon"> [Google Font] Family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/tabler-icons.min.css">
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/feather.css">
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/fontawesome.css">
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/material.css">
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/style.css" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/style-preset.css">



  <!-- Data table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <!-- [ Sidebar Menu ] start -->
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href=/dashboard" class="b-brand text-primary">
          <!-- ========   Change your logo from here   ============ -->
          <span>
            <h4>CMS - AlatKu</h4>
          </span>
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="/dashboard" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>

          <li class="pc-item pc-caption">
            <label>Menu</label>
            <i class="ti ti-brand-chrome"></i>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Kelola Data</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
            <ul class="pc-submenu">

              <li class="pc-item pc-hasmenu">
                <!-- <a href="#!" class="pc-link">User<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a> -->
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="#!">1</a></li>
                  <li class="pc-item"><a class="pc-link" href="#!">2</a></li>
              </li>
            </ul>
          </li>
          @role('superadmin')
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.admins.index') }}">Admin</a></li>
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.categories.index') }}">Kategori</a></li>
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.subcategories.index') }}">Sub Kategori</a></li>
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.contacts.index') }}">Kontak</a></li>
          @endrole
          <!-- <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.products.index') }}">Produk</a></li> -->
          @if(auth()->user()->hasRole('superadmin'))
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.products.index') }}">Produk</a></li>
          @elseif(auth()->user()->hasRole('admin'))
          <li class="pc-item"><a class="pc-link" href="{{ route('admin.products.index') }}">Produk</a></li>
          @endif
          @role('superadmin')
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.carousel.index') }}">Caraousel</a></li>
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.howtobuys.index') }}">Cara Membeli</a></li>
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.ulasans.index') }}">Ulasan</a></li>
          <li class="pc-item"><a class="pc-link" href="{{ route('superadmin.articles.index') }}">Artikel</a></li>
          @endrole
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
  <header class="pc-header">
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <!-- ======= Menu collapse Icon ===== -->
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
        </ul>
      </div>
      <!-- [Mobile Media Block end] -->
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item header-user-profile">
            <a
              class="pc-head-link dropdown-toggle arrow-none me-0"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              data-bs-auto-close="outside"
              aria-expanded="false">
              <img src="{{ asset('template/dist') }}/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
              <span>{{ ucfirst(auth()->user()->getRoleNames()->first()) }}
              </span>
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <div class="d-flex mb-1">
                  <div class="flex-shrink-0">
                    <img src="{{ asset('template/dist') }}/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar wid-35">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">{{auth()->user()->name}}</h6>
                    <span>{{ auth()->user()->email }}</span>
                  </div>
                  <!-- <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a> -->
                </div>
              </div>
              <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                <!-- <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="drp-t1"
              data-bs-toggle="tab"
              data-bs-target="#drp-tab-1"
              type="button"
              role="tab"
              aria-controls="drp-tab-1"
              aria-selected="true"
              ><i class="ti ti-user"></i> Profile</button
            >
          </li> -->
                <!-- <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="drp-t2"
              data-bs-toggle="tab"
              data-bs-target="#drp-tab-2"
              type="button"
              role="tab"
              aria-controls="drp-tab-2"
              aria-selected="false"
              ><i class="ti ti-settings"></i> Setting</button
            >
          </li> -->
              </ul>
              <div class="tab-content" id="mysrpTabContent">
                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
                  <!-- <a href="#!" class="dropdown-item">
              <i class="ti ti-edit-circle"></i>
              <span>Edit Profile</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>View Profile</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-clipboard-list"></i>
              <span>Social Profile</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-wallet"></i>
              <span>Billing</span>
            </a> -->

                  <!-- Logout Form (disembunyikan) -->
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                  <!-- Link Logout -->
                  <a href="#" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ti ti-power"></i>
                    <span>Logout</span>
                  </a>

                </div>
                <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                  <!-- <a href="#!" class="dropdown-item">

            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
              <i class="ti ti-power"></i>
              <span>Logout</span>
            </a>
            
          </div>
          <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
            <!-- <a href="#!" class="dropdown-item">

              <i class="ti ti-help"></i>
              <span>Support</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>Account Settings</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-lock"></i>
              <span>Privacy Center</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-messages"></i>
              <span>Feedback</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-list"></i>
              <span>History</span>
            </a> -->
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <!-- [ Header ] end -->



  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ Main Content ] start -->
      <div class="row">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <span></span>
        </div>
        <div class="col-sm my-1">

        </div>
        <div class="col-auto my-1">

        </div>
      </div>
    </div>
  </footer>

  <!-- [Page Specific JS] start -->
  <script src="{{ asset('template/dist') }}/assets/js/plugins/apexcharts.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/pages/dashboard-default.js"></script>
  <!-- [Page Specific JS] end -->
  <!-- Required Js -->
  <script src="{{ asset('template/dist') }}/assets/js/plugins/popper.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/plugins/simplebar.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/plugins/bootstrap.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/fonts/custom-font.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/pcoded.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/plugins/feather.min.js"></script>





  <script>
    layout_change('light');
  </script>




  <script>
    change_box_container('false');
  </script>



  <script>
    layout_rtl_change('false');
  </script>


  <script>
    preset_change("preset-1");
  </script>


  <script>
    font_change("Public-Sans");
  </script>

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Delete -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const deleteButtons = document.querySelectorAll(".btn-delete");

      deleteButtons.forEach(button => {
        button.addEventListener("click", function(e) {
          e.preventDefault();
          const form = this.closest("form");

          Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal"
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });
    });
  </script>

  <!-- Success -->
  @if (session('success'))
  <script>
    $(document).ready(function() {
      Swal.fire({
        title: 'Berhasil',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonColor: '#3085d6',
        timer: 2500,
        showConfirmButton: false
      });
    });
  </script>
  @endif


  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Data table -->
  <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      let table = new DataTable('#table')
    })
  </script>

  <!-- Untuk menampilkan gambar -->
  @stack('scripts')


  <!-- jees logout-->  
  <script>
    // Pastikan Bootstrap JS sudah dimuat
    document.getElementById('btn-logout').addEventListener('click', function(event) {
      event.preventDefault();
      var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
      logoutModal.show();
    });

    document.getElementById('confirm-logout').addEventListener('click', function() {
      // Buat form POST logout secara dinamis dan submit
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '{{ route("logout") }}';

      // Tambahkan CSRF token
      var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = '_token';
      input.value = csrfToken;
      form.appendChild(input);

      document.body.appendChild(form);
      form.submit();
    });
  </script>

  <!-- Modal konfirmasi logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Ya, Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
<!-- [Body] end -->

</html>