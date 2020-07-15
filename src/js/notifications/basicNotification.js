import * as toastr from 'toastr';

const setCookie = (name, value) => {
    document.cookie = name +'='+ value +'; Path=/;';
}
const deleteCookie = (name) => {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

const getCookie = (cname) => {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

const initBasicNotification = () => {
    const message = getCookie('Message');
    if (message) {
        toastr.info(message);
        deleteCookie('Message')
    }
};

export default initBasicNotification;