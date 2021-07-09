function getSession() {
    var getSessionVar;
    $.ajax({
        url: '../supportJS.php',
        dataType: 'json',
        type: 'POST',
        data: { getSessionVar: getSessionVar }
    }).done(function (data) {
        console.log(data)
    })
}
exit(0)

$('#search').on('click', function (e) { // Click on search which create a group chat
    e.preventDefault();
    $('body').append("<p>" + $('#text_search').val() + "</p>");
    // var hiddenID = document.getElementById('hiddenID').value

    console.log(target_name)
    console.log(hiddenID)
    // $('#sendMsg').on('click', function () {
    var msg = document.getElementById("desc")
    // console.log(msg.val())
    $.ajax({
        url: 'sendMessage',
        dataType: 'json',
        type: 'POST',
        data: { hiddenID: hiddenID, target_name: target_name, user_img: user_img }
    }).done(function (data) {
        console.log(data) // renvoie true or failure
    })
});
    });
});

// fichier autocomplete 

// Display all group chat

function fetchGroupConversation(res, error) {
    $.ajax({
        url: 'loadConversation',
        dataType: 'json',
        type: 'POST'
        // pas de data que des tricks
    }).done(function (data) {

        console.log(data)
        res(data)
    }).fail(function () {
        err = "loadConversation failed"
        console.log(err)
        error(err)
    })
}
fetchGroupConversation(function (res) {
    console.log(res, "res")
    displayGroupchat(res)
}, function (bad) {
    console.log(bad, "error")
})

function displayGroupchat(fetchGroup) {

    for (var i = 0; i < fetchGroup.length; i++) {

        $('#display_group_chat').append('<div style="cursor:pointer;" id="conversation_container" ><img class="chat-picture img-thumbnail" src="' + fetchGroup[i].img + '" alt="photo de profil"><input type="hidden" value="' + fetchGroup[i].id_group + '"><input id="' + fetchGroup[i].name + '" value="' + fetchGroup[i].name + '"></div>');

    }
}
// function callback(coucou, error) {

//     ["1", "2"].forEach(element => {
//         if (element == "1") {

//             coucou(element)
//         }
//         else {
//             error(element)
//         }

//     });
// }
// callback(function (res) {
//     console.log(res, "res")

// }, function (error) {
//     console.log(error, "error")
// })


// let fetchGroup = fetchGroupConversation();
// console.log(fetchGroup)






// displayGroupchat(fetchGroup)

// let repeat = setInterval(function () {
function displayChat() {
    console.log("disney xd")
}
var container = document.getElementById('display_group_chat')[0];
// document.addEventListener('click', function (event) {
//     if (container !== event.target && !container.contains(event.target)) {
//         console.log('clicking outside the div');
//     }
// });
if (container == true) {
    // if(document. getElementById('button'). clicked == true
    console.log('console alert')
}
var inUse = 0
var attente;
var target
var groupe
$('#display_group_chat').on("click", "div", function () { //Click autocomplete
    console.log(target)
    target = this
    console.log(target)
    groupe = showConversation(target)
    attente = setInterval("showConversation(target)", 3000);

    // // callBack_chat(target)
    // showConversation(target)
    // attente = setTimeout("showConversation()", 3000);

})
function callBack_chat(event) {
    console.log("coucou callback")

}
// if (inUse == 1) {
// showConversation(target)
// }

function showConversation(target) { //Click autocomplete

    // document.getElementById('display_group_chat').onclick = function displayChat() {

    // let target = document.getElementById('display_group_chat')[0];

    console.log(target)
    console.log(target.childNodes[0].src)

    let img_conversation = target.childNodes[0].src
    let hidden_group_id = target.childNodes[1].defaultValue
    let name_group = target.childNodes[2].defaultValue
    // var name = data[]
    console.log(hidden_group_id)
    console.log($(this))
    $.ajax({
        url: 'fetch_conversation',
        dataType: 'json',
        type: 'POST',
        data: { hidden_group_id: hidden_group_id }
    }).done(function (data) {
        // var conversation = refreshMsg(hidden)
        $.ajax({
            url: "who_am_i",
            dataType: 'json',
            type: 'POST',

        }).done(function (datum) {

            console.log(datum)
            var currentUser = datum
            console.log(data)
            console.log(data[1])
            console.log(data[0][0]['img'])
            console.log(data[0][0]['name'])

            $("#desc").empty()
            $(".chat-display").empty()
            $(".memberGroup-display").empty();
            $(".memberGroup-display").append('<h3 id="title_user">' + data[0][0]["name"] + '</h3><img id="user_img_conversation" src="' + data[0][0]["img"] + '" >')

            var i = 0
            data[1].forEach(element => {
                if (currentUser == data[1][i].id_google) {
                    $(".chat-display").append('<div class="sendedMsg">' + data[1][i].content + '</div><i class="date_msg_sended">' + data[1][i].date + '</i>')
                }
                else {
                    $(".chat-display").append('<div class="reciviedMsg">' + data[1][i].content + '</div><i class="date_msg">' + data[1][i].date + '</i>')

                }
                console.log(data[1][i].content)
                console.log(data[1][i].id_google)

                i++;
            })
            $(".chat-display").scrollTop($(".chat-display")[0].scrollHeight);

        });
    });
    $('#sendMsg').on('click', function (groupe) {
        var messageWritten = $("#desc")
        console.log(messageWritten[0].classList)

        msg_content = document.getElementById("desc").value
        var tamere = $(".trumbowyg-editor")
        tamere.empty()

        console.log(groupe)
        $.ajax({
            url: 'sendMessages',
            dataType: 'json',
            type: 'POST',
            data: { hidden_group_id: hidden_group_id, msg_content: msg_content, name_group: name_group }
        }).done(function (data) {
            console.log(data)
        })
    })
}

