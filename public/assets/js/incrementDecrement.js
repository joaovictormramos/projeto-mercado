document.querySelectorAll('.increase').forEach(item => {
    item.addEventListener('click', function () {
        var quantityInput = this.parentNode.querySelector('.quantity-input');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });
});

document.querySelectorAll('.decrease').forEach(item => {
    item.addEventListener('click', function () {
        var quantityInput = this.parentNode.querySelector('.quantity-input');
        if (quantityInput.value > 0) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});