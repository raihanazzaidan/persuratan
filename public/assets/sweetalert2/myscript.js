// Mengambil data flashmessage dan flashicon
const flashMessage = $('.flash-data').data('flashmessage');
const flashIcon = $('.flash-data').data('flashicon');

// Mengatur SweetAlert Toast
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

// Menampilkan SweetAlert jika ada flashMessage
if (flashMessage) {
    Toast.fire({
        icon: flashIcon || 'info',  // Default icon jika tidak ada
        title: flashMessage
    });
}
