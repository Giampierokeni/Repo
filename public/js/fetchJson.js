function fetchJson(controller) {
    return new Promise( (res, rej)=> {
    baseUrl = `index.php?page=${controller}`;
    fetch(baseUrl)
        .then(r=>r.json())
        .then(data=>res(data))
        .catch(err=>rej(err))
    });
}