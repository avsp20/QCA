CKEDITOR.replace('section_1');
if(caption.length > 0){
    var image = image;
    var key = key;
    $("#banner_image").fileinput({
        initialPreview: [image],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: caption, downloadUrl: image, width: "120px", key: key}
        ],
        ajaxDeleteSettings: {
            type: 'GET' // This should override the ajax as $.ajax({ type: 'DELETE' })
        },
        deleteUrl: deleteUrl,
        overwriteInitial: false,
        fileActionSettings: {
            removeIcon: '<i class="icon-bin"></i>',
            removeClass: 'btn btn-link btn-xs btn-icon',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                main1: "{preview}\n" +
                "<div class='input-group {class}'>\n" +
                "   <div class='input-group-btn'>\n" +
                "       {browse}\n" +
                "   </div>\n" +
                "   {caption}\n" +
                "   <div class='input-group-btn'>\n" +
                "       {upload}\n" +
                "       {remove}\n" +
                "   </div>\n" +
                "</div>"
            },
            uploadIcon: '<i class="icon-upload"></i>',
            uploadClass: 'btn btn-link btn-xs btn-icon',
            indicatorNew: '<i class="icon-file-plus text-slate"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
        }
    });
}
function readURL(input,type) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            if(type == "section2_image"){
                $('#section2_image').attr('src', e.target.result);
            }else if(type == "section4_image"){
                $('#section4_image').attr('src', e.target.result);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}