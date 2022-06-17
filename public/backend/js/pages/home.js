CKEDITOR.replace('section_1');
CKEDITOR.replace('section_2');
CKEDITOR.replace('section_3');
function readURL(input,type) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            if(type == "advice"){
                $('#advice_image').attr('src', e.target.result);
            }else if(type == "drafting"){
                $('#drafting_image').attr('src', e.target.result);
            }else if(type == "settlement_conference"){
                $('#settlement_conference_team_image').attr('src', e.target.result);
            }else if(type == "court_appearances"){
                $('#court_appearances_image').attr('src', e.target.result);
            }else if(type == "expert_report"){
                $('#expert_report_image').attr('src', e.target.result);
            }else if(type == "alternative_costs"){
                $('#alternative_costs_resolution_image').attr('src', e.target.result);
            }else if(type == "cle_seminars"){
                $('#cle_seminars_image').attr('src', e.target.result);
            }else if(type == "instructions_forms"){
                $('#instructions_forms_image').attr('src', e.target.result);
            }else if(type == "section3_image"){
                $('#section3_image').attr('src', e.target.result);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}