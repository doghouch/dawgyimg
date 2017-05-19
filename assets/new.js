function checkUploadFile(e) {
    return !0
}
var dropzone;
Dropzone.options.dropzone = {
    maxFilesize: 10,
    acceptedFiles: "image/*",
    maxFiles: 50,
    dictDefaultMessage: "Drop images here, click to browse, or CTRL+V",
    method: "POST",
    url: "upload/",
    success: function(e, o) {
        $("#links").append(o), console.log("Success")

    },
    totaluploadprogress: function(e) {
        NProgress.set(nil)
    },
    addRemoveLinks: !0,
    queuecomplete: function(e, o, n) {
        NProgress.done(), swal({
            title: "Hey there!",
            text: "<div id='links1'></div>",
            type: "info",
            html: !0
        });

        var t = $("#links").html();
        
        $("#links1").append(t), $("#links").html("")
    },
    sending: function() {
        NProgress.start()
        $("#links1").html("")
    },
    accept: function(e, o) {
        checkUploadFile(e.name) ? o() : (o("Invalid file"), dropzone.removeFile(e))
    },
    init: function() {
        dropzone = this
    }
}, $(document).ready(function() {
    FileReaderJS.setupClipboard(document.body, {
        accept: {
            "image/*": "DataURL"
        },
        on: {
            load: function(e, o) {
                dropzone.addFile(o)
            }
        }
    })
}), $(document).ready(function() {
    function e() {
        setTimeout(function() {
            $("#photos").load("functions.php?a=count"), e()
        }, 1e4)
    }
    $("#donate").click(function() {
        swal({
            title: "Thank you! <3",
            text: "reserved",
            type: "info",
            html: !0
        })
    }), $("#photos").load("functions.php?a=count"), e()
});