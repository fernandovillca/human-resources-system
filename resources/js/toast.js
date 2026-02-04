window.showToast = function (message, type = "success") {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        width: "auto",
        padding: "0.5rem",
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Toast.fire({
        icon: type,
        title: message,
    });
};

window.showAlert = function (options) {
    return Swal.fire({
        title: options.title || "¿Estás seguro?",
        text: options.text || "",
        icon: options.icon || "warning",
        showCancelButton: true,
        confirmButtonColor: "#0c224d",
        cancelButtonColor: "#d33",
        confirmButtonText: options.confirmButtonText || "Sí, confirmar",
        cancelButtonText: options.cancelButtonText || "Cancelar",
        reverseButtons: true,
    });
};
