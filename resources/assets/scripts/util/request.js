export function get(url, callback) {
    var request = new XMLHttpRequest();
    request.open('GET', url, true);

    request.onload = function () {
        if (request.status >= 200 && request.status < 400) {
            // Success!
            callback(JSON.parse(request.responseText));
        } else {
            // We reached our target server, but it returned an error
        }
    };

    request.onerror = function (error) {
        console.log(error);
    };

    request.send();
}

export function post(url, data, callback) {
    var request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send(data);

    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            var response = JSON.parse(request.responseText);
            if (request.status === 200 && response.status === 'OK') {
                callback(response);
            } else {
                console.log('failed:' + response.status);
            }
        }
    }

    request.onerror = function (error) {
        console.log(error);
    };
}

export function send(url, body, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            callback(JSON.parse(xhr.responseText));
        } else {
            console.log(JSON.parse(xhr.responseText))
        }
    }

    xhr.onerror = function(err) {
        console.log(err)
    }

    var data = JSON.stringify(body)

    xhr.send(data);
}
