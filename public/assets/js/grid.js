//------------------Start Spiner----------------//
function spinerLoader(status) {
    let intervalStop = '';
    if (status == 'show') {
        createSpiner();
    } else if (status == 'hide') {
        fadeOutLoader();
    }
    function createSpiner() {
        let spiner = '<div class="spinner-circle"><span class="spinner-bar"></span></div>';
        let divMain = document.createElement('div');
        divMain.className = 'spinner-wrap';
        divMain.id = 'spiner_loader';
        divMain.style.display = 'block';
        divMain.style.opacity = 0;
        divMain.innerHTML = spiner;
        document.body.appendChild(divMain);
        fadeInLoader();
    }

    function show() {
        let spiner = document.getElementById('spiner_loader');
        if (spiner != null) {
            let opacity = Number(spiner.style.opacity);
            if (opacity < 1) {
                opacity = opacity + 0.2;
                spiner.style.opacity = opacity;
            } else {
                clearInterval(intervalStop);
            }
        } else {
            clearInterval(intervalStop);
        }
    }

    function fadeOutLoader() {
        if (intervalStop) {
            clearInterval(intervalStop);
        }
        document.getElementById('spiner_loader').remove();
    }

    function fadeInLoader() {
        intervalStop = setInterval(show, 200);
    }
}
window.onload = function() {

    document.getElementById('spiner_loader').remove();
};
//------------------End Spiner----------------//

