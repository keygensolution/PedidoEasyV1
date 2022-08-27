function deleteObject(id, url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {"id": id},
    success: function (data) {
        let response = JSON.parse(data);

        //redirect
        if (response.redirect) {
            window.location.href = response.redirect;
        }

        //reload
        if (response.reload) {
            window.location.reload();
        }

        //message
        if (response.message) {
            ajaxMessage(response.message, ajaxResponseBaseTime);
        }

        load.fadeOut(200);
    },
    error: function () {
        ajaxMessage(ajaxResponseRequestError, 5);
        load.fadeOut();
    }
});
}