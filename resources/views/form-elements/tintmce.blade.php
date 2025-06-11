<script src="{{ asset('/js/editor/tinymce.min.js') }}" charset="utf-8"></script>
<script>
    tinymce.init({
        selector: ".tinymce",
        language: "pl",
        skin: "oxide",
        content_css: 'default',
        branding: false,
        height: 400,
        plugins: [
            "code advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code gallery"
        ],
        toolbar1: "formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat | gallery | responsivefilemanager | code",
        relative_urls: false,
        image_advtab: true,
        external_filemanager_path:"/js/editor/plugins/filemanager/",
        filemanager_title:"kCMS Filemanager" ,
        external_plugins: { "filemanager" : "{{ asset('/js/editor/plugins/filemanager/plugin.min.js') }}"},

        valid_elements: '*[*]', // allow all elements/attributes
        extended_valid_elements: 'svg[*],g[*],path[*],circle[*],rect[*],line[*],polyline[*],polygon[*],ellipse[*],text[*]',
        valid_children: "+body[svg|g|path|circle|rect|line|polyline|polygon|ellipse|text]",
        forced_root_block: false, // prevent <p> wrapping SVG
        verify_html: false,
        content_style: 'svg { max-width: 100%; height: auto; }'
    });
</script>
