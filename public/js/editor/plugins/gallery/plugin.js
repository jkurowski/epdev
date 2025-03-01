tinymce.PluginManager.add('gallery', function(editor, url) {
    var openDialog = function () {
        var win;
        win = editor.windowManager.open({
            title: 'Wstaw galerię',
            file: tinyMCE.baseURL + '/plugins/gallery/dialog.php?editor=' + editor.id + '&lang=' + tinymce.settings.language + '&subfolder=' + tinymce.settings.subfolder,
            body: {
                type: 'panel',
                classes: 'myClassname',
                items: [
                    {
                        type: 'htmlpanel',
                        html: '<div id="gallery" class="row pt-3 pb-3 m-0"></div>'
                    }
                ]
            },
            size: 'large',
            buttons: []
        });

        $.ajax({
            type: "GET",
            url: "/admin/ajaxGetGalleries",
            success: function (result) {

                console.log(result);

                $.each(result, function(i, item) {
                    $('<div class="col-3">' +
                        '<div class="card">' +
                        '<div class="card-body">' +
                        '<h5 class="card-title">'+item.name+'</h5>' +
                        '<div class="dropdown">' +
                        '<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Wstaw jako </button>' +
                        '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' +
                        '<span class="dropdown-item" data-type="gallery" data-id="'+item.id+'">Galeria</span>' +
                        // '<span class="dropdown-item" data-type="carousel" data-id="'+item.id+'">Karuzela</span>' +
                        // '<span class="dropdown-item" data-type="slider" data-id="'+item.id+'">Slider</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>').appendTo('#gallery');
                });

                $( ".dropdown-item" ).on( "click", function() {
                    const type = $(this).attr("data-type");
                    const id = $(this).attr("data-id");
                    tinymce.activeEditor.execCommand('mceInsertContent', false, '<p>[galeria='+type+']'+ id +'[/galeria]</p>');
                    editor.windowManager.close();
                });
            },
            error: function () {
                alert("Wystąpił błąd połączenia z bazą")
            }
        })
    };

    // Add a button that opens a window
    editor.ui.registry.addButton('gallery', {
        icon: "image",
        tooltip: "Wstaw galerię",
        onAction: function () {
            // Open window
            openDialog();
        }
    });
});
