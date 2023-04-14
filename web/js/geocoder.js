ymaps3.ready.then(init);
function init() {
    const map = new ymaps3.YMap(document.getElementById('map'), {
        location: {
            center: [37.64, 55.76],
            zoom: 7
        }
    });
}