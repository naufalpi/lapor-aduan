import "./bootstrap";
import Swal from "sweetalert2";

// Listening event dari Livewire untuk tampilkan alert
window.addEventListener("swal:success", (event) => {
    Swal.fire({
        icon: "success",
        title: event.detail.title || "Success!",
        text: event.detail.message || "",
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
    });
});
