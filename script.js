document.getElementById('buyButton').addEventListener('click', function() {
    document.getElementById('dialog').style.display = 'block';
});

document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('dialog').style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('dialog')) {
        document.getElementById('dialog').style.display = 'none';
    }
});