
import Vue from 'vue';

function swal(...params) {
    return Vue.swal(...params)
};

export function confirm(title, text = "", type = 'question', buttons = null) {
    buttons = buttons || {confirm: "Yes", cancel: "No"};

    return swal({
        type, title, text,
        confirmButtonText: buttons.confirm,
        cancelButtonText: buttons.cancel,
        showCancelButton: true,
    });
}

export function promptSuccess(message, title = "Success", options = {}) {
    if (typeof message === "object") {
        title = message.title
        message = message.message
    }
    return swal({
        ...options,
        type: "success", title, text: message,
        confirmButtonText: 'Okay',
    });
}

export function promptErrors(message, title = "Something went wrong") {
    if (typeof message === "object") {
        title = message.title
        message = message.message
    }
    return swal({
        type: "error", title, text: message,
        confirmButtonText: 'Okay',
    });
}
