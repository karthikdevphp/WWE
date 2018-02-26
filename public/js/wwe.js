/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function like(videoId){
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
    url: "/videos/" + videoId + "/like",
            type:"POST",
            data: { _token : _token },
            success: function (result) {
            $("#like" + videoId).css("display", "none");
            $("#liked" + videoId).css("display", "block");
            }
    });
    }

    function dislike(videoId){
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
    url: "/videos/" + videoId + "/dislike",
            type:"POST",
            data: { _token : _token },
            success: function (result) {
            $("#like" + videoId).css("display", "block");
            $("#liked" + videoId).css("display", "none");
            }
    });
    }


    function addKeyword(videoId) {
    var e = document.getElementById("keywords" + videoId);
    var _token = $('meta[name="csrf-token"]').attr('content');
    keywordId = e.options[e.selectedIndex].value;
    var selectedName = $("#keywords" + videoId + " option:selected").attr('name');
    $.ajax({
    url: "/videos/" + videoId + "/keywords/" + keywordId + "/add",
            type:"POST",
            data: { _token : _token },
            success: function (result) {
            $("ul#assignedKeywords" + videoId).append('<li id="v' + videoId + 'k' + keywordId + '">' + selectedName + '<i class="fa fa-close" style = "color: red;cursor: pointer" onclick = "removeKeyword(' + keywordId + ',' + videoId + ')" > </i></li>');
            $("#video" + videoId).css("display", "block");
            $("#video" + videoId).fadeTo(2000, 500).slideUp(500, function(){
            $("#video" + videoId).slideUp(500);
            });
            },
            error:function(data){
            if (data.status == 400){
            $("#errorVideo" + videoId).empty();
            $("#errorVideo" + videoId).html("Already Tagged");
            $("#errorVideo" + videoId).fadeTo(2000, 500).slideUp(500, function(){
            $("#errorVideo" + videoId).slideUp(500);
            });
            }
            if (data.status == 404){
            $("#errorVideo" + videoId).empty();
            $("#errorVideo" + videoId).html("Keyword Not Found");
            $("#errorVideo" + videoId).fadeTo(2000, 500).slideUp(500, function(){
            $("#errorVideo" + videoId).slideUp(500);
            });
            }
            }
    });
    }

    function removeKeyword(keywordId, videoId){
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
    url: "/videos/" + videoId + "/keywords/" + keywordId + "/remove",
            type:"POST",
            data: { _token : _token },
            success: function (result) {
            $("ul li#v" + videoId + "k" + keywordId).css("display", "none");
            }
    });
    }

    function removeLocation(videoId){
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
    url: "/videos/" + videoId + "/location/remove",
            type:"POST",
            data: { _token : _token },
            success: function (result) {
            $("#locationTag" + videoId).css("display", "none");
            }
    });
    }

    function addLocation(videoId){
    var e = document.getElementById("locations" + videoId);
    var _token = $('meta[name="csrf-token"]').attr('content');
    locationId = e.options[e.selectedIndex].value;
    var selectedName = $("#locations" + videoId + " option:selected").attr('name');
    $.ajax({
    url: "/videos/" + videoId + "/locations/" + locationId + "/assign",
            type:"POST",
            data: { _token : _token },
            success: function (result) {
            $("#locationTag" + videoId).empty();
            $("#locationTag" + videoId).append(selectedName + '<i class="fa fa-close" style = "color: red;cursor: pointer" onclick = "removeLocation(' + videoId + ')" > </i>');
            $("#lVideo" + videoId).css("display", "block");
            $("#lVideo" + videoId).fadeTo(2000, 500).slideUp(500, function(){
            $("#lVideo" + videoId).slideUp(500);
            });
            },
            error:function(){
            $("#lErrorVideo" + videoId).empty();
            $("#lErrorVideo" + videoId).html("Location Not Found");
            $("#lErrorVideo" + videoId).fadeTo(2000, 500).slideUp(500, function(){
            $("#lErrorVideo" + videoId).slideUp(500);
            });
            }
    });
    }

