let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
        scanner.addListener('scan', function (content) {
            console.log(content);
            var url = window.location.pathname;
            post(url, content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
        
function post(path, content) {
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", path);
    
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "qr");
    hiddenField.setAttribute("value", content);
    form.appendChild(hiddenField);
    form.setAttribute("qr", content);

    document.body.appendChild(form);
    form.submit();
}