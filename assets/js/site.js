// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.

//function WelcomeSpeech() {
//   // alert(1);
//    $.ajax({
//        type: "GET",
//        url:"http://localhost:5186/WelcomeSpeech",
//        data: {},
//        contentType: "application/json; charset=utf-8",
//       // dataType: "json",
//        success: function (data) {
//           // alert(data);
//            $("#welcomespech").html(data)
//                 //$.each(data, function (id, e) {
//                 //    $("#welcomespech").html(e.wellSpc)
//                 //});
//        },
//    });
//}
//function Getwhyinvest() {
//    // alert(1);
//    $.ajax({
//        type: "GET",
//        url: "http://localhost:5186/Getwhyinvest",
//        data: {},
//        contentType: "application/json; charset=utf-8",
//        // dataType: "json",
//        success: function (wellSpc) {
//            //console.log(wellSpc.length);
//            for (i = 0; i <= wellSpc.length; i++) {
//                console.log(wellSpc[i]);
//                var text = wellSpc[i];
//                //console.log(text);
                    
//                $("#whyInvesthead").html(text.header);
//                $("#divWhyInvest").html(text.description);
//                console.log(text.youtubeLink);
//                $("#whyInvestYTL").attr("data-src",text.youtubeLink);
//            }
//        },
//    });
//}
//function GetOwnershipBenefits() {
    
//    $.ajax({
//        type: "GET",
//        url: "http://localhost:5186/GetOwnershipBenefits",
//        data: {},
//        contentType: "application/json; charset=utf-8",
//        success: function (wellSpc) {
//            //console.log(wellSpc.length);
//            var result = "";
//            for (i = 0; i <= wellSpc.length; i++) {
                
//                var text = wellSpc[i];
//                 result = ' <li>'+
//                    '< div class="benefit__box-wrap green-color" >'+
//                    '<img alt="new" class="lazyload" src="/assets/_blank.webp" data-src="' + text.BenefitIconLeft +'" data-sizes="auto" />'+
//                    '<noscript> <img src="' + text.BenefitIconLeft +'" /></noscript>' +
//                                    ' <div class="benefit-text">' +
//                    '<h3>' + text.BenefitTitleLeft +'</h3>' +
//                                    '</div>' +
//                                    '</div >' +
//                                '</li >';
//            }

//            $("#ownBefitsDetails").html(result);
//        },
//    });
//}
//function GetHpProjectOverView() {
    
//    $.ajax({
//        type: "GET",
//        url: "http://localhost:5186/GetHpProjectOverView",
//        data: {},
//        contentType: "application/json; charset=utf-8",
//        success: function (wellSpc) {
//            //console.log(wellSpc.length);
//            var result = "";
//            for (i = 0; i <= wellSpc.length; i++) {
               
//                var text = wellSpc[i];
//                if (id == 3) {
//                    $("#pProjectNameH1").html(text.ProjectName);
//                    $("#pProjectDtlsH1").html(text.Description);
//                }
//                if (id == 6) {
//                    $("#pProjectNameH2").html(text.ProjectName);
//                    $("#pProjectDtlsH2").html(text.Description);
//                }
//                if (id == 7) {
//                    $("#pProjectNameH3").html(text.ProjectName);
//                    $("#pProjectDtlsH3").html(text.Description);
//                } 
//            }

          
//        },
//    });
//}
//$(document).ready(function () {

//    WelcomeSpeech();
//    Getwhyinvest();
//    GetOwnershipBenefits();
//    GetHpProjectOverView();
//});