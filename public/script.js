document.addEventListener('DOMContentLoaded', function() {
    showToast();
})

function showToast() {
    const toast = document.getElementById('toast');

    if (toast) {
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }
}

function confirmDelete() {
    return confirm('Are you sure you want to delete this?');
}

