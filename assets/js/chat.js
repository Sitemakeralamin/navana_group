"use strict";

var connection = new signalR.HubConnectionBuilder().withUrl("/chatHub").build();



connection.on("ReceiveMessage", function (user, message) {
    $("#empNotitop").html(message);
});

connection.on("ReceiveGroupMessage", function (user, message) {
    console.log(message);
    $("#rldivleadinfo").html(message);
});
connection.on("ReceiveActivitiesToAdmin", function (user, message) {
    $("#tabRecent").html("");
    $("#tabRecent").html(message);
});
connection.on("ReceiveNotice", function (UserId, NoticNo) {
    $("#empNotitop").html(NoticNo);
});



connection.start().then(function () {
  //  document.getElementById("sendButton").disabled = false;
}).catch(function (err) {
    return console.error(err.toString());
});