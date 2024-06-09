import bootsrap from "bootstrap/dist/js/bootstrap.bundle"
// import "bootstrap/dist/js/bootstrap.bundle";
window.bootstrap=bootsrap;

import Swal from "sweetalert2";

Livewire.on('swal',(params)=> {

    Swal.fire(params[0]);
})

