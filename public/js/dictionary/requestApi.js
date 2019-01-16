var DICTIONARY = DICTIONARY || {};

DICTIONARY.requestApi = (function () {

    return {
        request: function (url, method, data, callback) {
            if (method == 'GET') {
                axios.get(url)
                    .then(response => {
                        callback(response.data)
                    });
            } else if (method == 'POST') {
                axios.post(url, data)
                    .then(response => {
                        callback(response.data)
                    })
                    .catch(response => {
                        callback(response)
                    });
            } else if (method == 'PUT') {
                axios.put(url, data)
                    .then(response => {
                        callback(response.data);
                    })
                    .catch(response => {
                        callback(response)
                    });
            }
        }
    };
})();