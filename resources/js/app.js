
import './bootstrap';
import '../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css';
import '../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css';
import '../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css';
import '../assets/vendors/css/vendor.bundle.base.css';
import '../assets/vendors/css/vendor.bundle.addons.css'
import '../assets/css/shared/style.css';
import '../assets/css/demo_1/style.css';

import '../assets/fontawesome/css/fontawesome.css'
import '../assets/fontawesome/css/brands.css'
import '../assets/fontawesome/css/solid.css'
import '../assets/css/custom.css'
import '../assets/css/tecnico.css'
// import '../assets/webfonts/'

// import '../assets/fontawesome.min.css'
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', (event) => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    document.querySelector('#spinner').style.opacity = 0
    document.querySelector('#divLoading').style.opacity = 1
})


