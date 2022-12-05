function getPics() { } //just for this demo
const imgs = document.querySelectorAll('.gallery img');
const boxFullScreemImg = document.querySelector('#boxFullScreemImg');
const full = document.querySelector('#full');
imgs.forEach(img => {
    img.addEventListener('click', function () {
        full.style.backgroundImage = 'url(' + img.src + ')';
        full.style.display = 'block';
        boxFullScreemImg.style.display = 'block';
        // $("#c").hide();
    });
});
$("#closeFullScreemImg").click(function () {
    // $("#c").show();
});