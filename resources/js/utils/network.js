

export function get(url, config, ...options) {
    return send("get", url, config, options);
}


export function post(url, config, ...options) {
    return send("post", url, config, options);
}


export function put(url, config, ...options) {
    return send("put", url, config, options);
}


export function patch(url, config, ...options) {
    return send("patch", url, config, options);
}


export function destroy(url, config, ...options) {
    return send("delete", url, config, options);
}


export function send(method, url, config, ...options) {
    let request = Object.assign({}, config, { method, url, config });

    return axios(request);
}