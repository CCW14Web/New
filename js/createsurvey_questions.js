/*
File name : createsurvey_questions.js
Author's name : Zhixiang Hu
Web site name : Survey
This is the external javascript file of createsurvey_questions.php
*/

function showSurvey(sid) {
    //  show Survey panel
    var jqXHR = $.ajax("readsurvey.php?sid=" + sid)
            .done(function(results) {
                    //console.log(results);
                    var obj = eval ("(" + results + ")");
                    
                    //$("#message").text(obj.player[0].lastName);
                    $("input[name=title]").val(obj.survey[0].title);
                    $("input[name=description]").val(obj.survey[0].description);
                    $("input[name=startdate]").val(obj.survey[0].startdate);
                    $("input[name=enddate]").val(obj.survey[0].enddate);
                    $("input[name=responselimit]").val(obj.survey[0].responselimit);
                    $("input[name=category]").val(obj.survey[0].category);
                    $("select[name=active]").val(obj.survey[0].isactive);

                    $("input[name=surveyid]").val(sid);
                    $("input[name=btn_s_save]").val("Save");

                    $("#edit_survey_panel").show();
            })
            .fail(function() {
                    console.log( "error" );
            })
            .always(function() {
                    console.log( "complete" );
            });
    
}

function checkQuestionToSubmit() {
    var isSuccess = 1; 
    $("input[name^='question_option_id_']").each(function() {
        if ($.trim($(this).val()).length ==0){
        $("#err_msg").text("Warning: Question option cannot be empty.");
        isSuccess = 0;
        }
    });
    if ( $.trim($("input[name=question_title]").val()).length==0) {
        $("#err_msg").text("Warning: Question title cannot be empty.");
        isSuccess = 0;
    }
    $("#err_msg").hide();
    if(isSuccess == 1) 
    { 
        return true;
    }
    else{
        $("#err_msg").show();
        return false;
    }
}

$(document).ready(    function () {
    $("#edit_survey_panel").hide();
});

$(function () {
    $("#btn_new_survey").click(function(){

    });
});