function func_load() {
    var str_url = decodeURIComponent(location.href);
    var str_name = str_url.substr(str_url.indexOf('=') + 1);
    document.images[str_name].style.opacity = '0.5';
}

