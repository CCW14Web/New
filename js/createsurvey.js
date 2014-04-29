/*
File name : createsurvey.js
Author's name : Zhixiang Hu
Web site name : Survey
This is the external javascript file of createsurvey.php
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

function checkSurveyToSubmit() {
    var isSuccess = 1;
    if ( $.trim($("input[name=title]").val()).length==0) {
        $("#err_msg").text("Warning: Survey title cannot be empty.");
        isSuccess = 0;
    }
    if ( $.trim($("input[name=description]").val()).length==0) {
        $("#err_msg").text("Warning: Survey description cannot be empty.");
        isSuccess = 0;
    }
    if ( $.trim($("input[name=startdate]").val()).length==0) {
        $("#err_msg").text("Warning: Survey start date cannot be empty.");
        isSuccess = 0;
    }
    if ( $.trim($("input[name=enddate]").val()).length==0) {
        $("#err_msg").text("Warning: Survey end date cannot be empty.");
        isSuccess = 0;
    }
    if ( $.trim($("input[name=responselimit]").val()).length==0) {
        $("#err_msg").text("Warning: Survey responselimit cannot be empty.");
        isSuccess = 0;
    }
    if (  isNaN($("input[name=responselimit]").val() ) ) {
        $("#err_msg").text("Warning: Survey responselimit must be number.");
        isSuccess = 0;
    }
    if ( $.trim($("input[name=category]").val()).length==0) {
        $("#err_msg").text("Warning: Survey category cannot be empty.");
        isSuccess = 0;
    }
    if ( $.trim($("select[name=active]").val()).length==0) {
        $("#err_msg").text("Warning: Survey active status cannot be empty.");
        isSuccess = 0;
    }
    
    if(isSuccess == 1) 
    { 
        return true;
    }
    else{
        $("#err_msg").show();
        return false;
    }
}
function modifyQuestions(sid)
{
    window.location.href='createsurvey_questions.php?sid=' + sid;
}


$(document).ready(    function () {
    $("#edit_survey_panel").hide();
});

$(function () {
    $("#btn_new_survey").click(function(){
        // reset survey input textbox, show survey panel
        $("input[name=title]").val('');
        $("input[name=description]").val('');
        $("input[name=startdate]").val('');
        $("input[name=enddate]").val('');
        $("input[name=responselimit]").val('');
        $("input[name=category]").val('');
        $("select[name=active]").val('');
        $("input[name=surveyid]").val(0);
        
        $("input[name=btn_s_save]").val("Create");
        $("#edit_survey_panel").show();
    });
});