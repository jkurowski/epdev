<script>
    tinymce.init({
        selector: ".tinymce",
        language: "pl",
        skin: "oxide",
        content_css: 'default',
        branding: false,
        menubar:false,
        statusbar: false,
        toolbar_location: 'bottom',
        height: 200,
        plugins: [
            ""
        ],
        toolbar1: "bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | superscript subscript | numlist bullist outdent indent | responsivefilemanager",
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
