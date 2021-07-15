async function getSession() {
    var getSessionVar = 1;
    return new Promise(resolve => {
        $.ajax({
            url: '../routeurJS.php',
            dataType: 'json',
            type: 'POST',
            data: { getSessionVar: getSessionVar }
        }).done(function (data) {
            console.log(data)
            console.log('getSession succes')
            return data
        }).fail(function (data) {
            console.log('getSession failure')
        })
    })
}

function enableChat() {
    var toggleDiv = document.getElementById("chat_section");

    if (toggleDiv.style.display === "none") {
        toggleDiv.style.display = "block";

    } else {
        toggleDiv.style.display = "none";
    }
}

getSession()
function getObjet() { // Click on search which create a group chat
    let objet = document.getElementById('objet').value;

    return new Promise(resolve => {
        setTimeout(() => {
            resolve(document.getElementById('objet').value);
        }, 500);
    })

}
async function sendNewGroupChat() {
    let createGroupChat = 1
    console.log('mabite')
    let response = await getObjet()
    console.log('mescouilles')
    console.log(response)
    let objet = response
    $.ajax({
        url: '../routeurJS.php',
        dataType: 'json',
        type: 'POST',
        data: { createGroupChat: createGroupChat, objet: objet } // objet de la conversation
    }).done(function (data) {
        console.log(data) // renvoie true or failure
    })
}


// fichier autocomplete 

// Display all group chat

function fetchGroupConversation() {
    let fetchGroupConversation = 1
    $.ajax({
        url: '../routeurJS.php',
        dataType: 'json',
        type: 'POST',
        data: { fetchGroupConversation: fetchGroupConversation }
        // pas de data que des tricks
    }).done(function (data) {
        let str = ""
        console.log(data)
        data.forEach(element => {
            str += '<div style="cursor:pointer"; class="element_chat_user"><img  src="' + element.img + '" class="img_conv" alt="image utilisateur"><p>' + element.objet.substring(0, 15).slice(0, -1) + '...' + '</p><input type="hidden" value="' + element.id_group + '"><input type="hidden" value="' + element.name + '"></div>';
        });
        window.document.getElementById('all_chat_container').innerHTML = str
    }).fail(function () {
        console.log("loadConversation failed");

    })
}

function displayGroupchat(fetchGroup) {

    for (var i = 0; i < fetchGroup.length; i++) {

        $('#display_group_chat').append('<div style="cursor:pointer;" id="conversation_container" ><img class="chat-picture img-thumbnail" src="' + fetchGroup[i].img + '" alt="photo de profil"><input type="hidden" value="' + fetchGroup[i].id_group + '"><input value="' + fetchGroup[i].name + '"></div>');

    }
}



fetchGroupConversation();

var target = ""
$('#all_chat_container').on("click", "div", function () { //Click autocomplete
    console.log(target)
    target = this
    console.log(target)
    groupe = showConversation(target)
    // attente = setInterval("showConversation(target)", 3000);

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

    let hidden_group_id = target.childNodes[2].defaultValue
    let img_conversation = target.childNodes[0].src
    let target_user = target.childNodes[3].defaultValue

    console.log(target_user + " target user")
    console.log(hidden_group_id + '  GroupID')
    console.log(img_conversation + '  img')

    // var name = data[]
    $.ajax({
        url: '../routeurJS.php',
        dataType: 'json',
        type: 'POST',
        data: { hidden_group_id: hidden_group_id }
    }).done(function (data) {
        let who_am_i = 1
        console.log(data)
        $.ajax({
            url: "../routeurJS.php",
            dataType: 'json',
            type: 'POST',
            data: { who_am_i: who_am_i }

        }).done(function (datum) {

            console.log(datum)
            var currentUser = datum
            console.log(data[1])
            console.log(data[0][0]['img'])
            console.log(data[0][0]['name'])

            $("#desc").empty()
            $("#user_to_message").empty()
            $(".memberGroup-display").empty();
            // $("#textarea_ID").empty()
            $("#user_to_message").append('<h3 id="title_user">' + data[0][0]["name"] + '</h3><p>' + data[0][0].objet + '</p><img class="img_conv" src="' + data[0][0]["img"] + '" >')
            // faudrait que je fasse un ajax pour call les photo de profil afin de les imprimer. NE pas les stocker dans la table group_messages
            var i = 0
            data[1].forEach(element => {
                if (currentUser == data[1][i].id_google) {
                    $("#show_conversation").append('<div class="sendedMsg"><img src="' + data[1][i].image + '" alt="image utilisateur"><p>' + data[1][i].content + '</p></div><i class="date_msg_sended">' + data[1][i].date + '</i>')
                }
                else {
                    $("#show_conversation").append('<div class="reciviedMsg"><img src="' + data[1][i].image + '" alt="image utilisateur"><p>' + data[1][i].content + '</p></div><i class="date_msg">' + data[1][i].date + '</i>')

                }

                console.log(data)
                console.log(data[1][i].content)
                console.log(data[1][i].id_user)

                i++;
            })
            $("#show_conversation").scrollTop($("#show_conversation")[0].scrollHeight);

        });
    });
    $('#sendMessage').on('click', function () {
        var msg_content = $("#textarea_ID").val()
        var sendMessages = 1
        console.log(msg_content)
        var tamere = $(".trumbowyg-editor")
        tamere.empty()
        console.log(hidden_group_id)
        console.log(msg_content)

        $.ajax({
            url: '../routeurJS.php',
            dataType: 'json',
            type: 'POST',
            data: { hidden_group_id2: hidden_group_id, msg_content: msg_content, sendMessages: sendMessages }
        }).done(function (data) {
            console.log(data)
        })
    })
}




