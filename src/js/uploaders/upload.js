import $ from 'jquery';

const initUploader = () => {
    $('input[type="file"]').on('click', function() {
        $(".file_names").html("");
    });

    if ($('input[type="file"]')[0]) {
        const fileInput = document.querySelector('label[for="et_pb_contact_brand_file_request_0"]');
        fileInput.ondragover = function() {
            this.className = "et_pb_contact_form_label changed";
            return false;
        }
        fileInput.ondragleave = function() {
            this.className = "et_pb_contact_form_label";
            return false;
        }
        fileInput.ondrop = function(e) {
            e.preventDefault();
            const fileNames = e.dataTransfer.files;
            for (let x = 0; x < fileNames.length; x++) {
                console.log(fileNames[x].name);
                $ = jQuery.noConflict();
                $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>" + fileNames[x].name + "</div>");
            }
        }
        $('#et_pb_contact_brand_file_request_0').change(function() {
            const fileNames = $('#et_pb_contact_brand_file_request_0')[0].files[0].name;
            $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames +"</div>");
            $('label[for="et_pb_contact_brand_file_request_0"]').css('background-color', '##eee9ff');
        });
    }
};

export default initUploader;