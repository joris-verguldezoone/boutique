function insertComment() {
    let titre = $('#titre').val()
    let commentaire = $('#commentaire').val()
    let id_article = $('#hiddenSingleArticle').val()

    console.log(titre)
    console.log(commentaire)

    $.ajax({
        url: '../routeurJS.php',
        dateType: 'json',
        type: 'POST',
        data: { titre: titre, commentaire: commentaire, id_article: id_article }

    }).done(function (data) {
        console.log(data)
        console.log($('#titre').val())
        console.log($('#commentaire').val())
    })
}
var id_article = $('#hiddenSingleArticle').val()

var UserCommentLike;
function fetchLike() {
    return new Promise(resolve => {

        $.ajax({
            url: '../routeurJS.php',
            dateType: 'json',
            type: 'POST',
            data: { id_article_fetchUser_like: id_article }
        }).done(function (data) {
            UserCommentLike = data
            console.log(UserCommentLike)
            setTimeout(() => {
                resolve(JSON.parse(UserCommentLike));
            }, 2000);
        });
    })
}
function getArticle() {
    $.ajax({
        url: '../routeurJS.php',
        dateType: 'json',
        type: 'POST',
        data: { id_article: id_article }
    }).done(function (data) {
        console.log(JSON.parse(data))
        setInterval("showConversation(id_article)", 5000);

    })
}
async function showConversation(id_article) {
    let fetchedLikes = await fetchLike()
    $.ajax({
        url: '../routeurJS.php',
        dateType: 'json',
        type: 'POST',
        data: { id_article: id_article }
    }).done(function (data) {
        console.log(data)
        data = JSON.parse(data)
        console.log(id_article)
        data.forEach(element => {
            console.log(element);
            var sign = 0;
            fetchedLikes.forEach(value => {
                console.log(value.id_commentaire)
                if (element.id == value.id_commentaire)
                    sign = 1;
            })
            if (sign == 1)
                $('#section_show_comment').append('<div class="showOneComment">' + element.login + '<br />' + element.titre + '<br />' + element.contenu + '<br />' + element.date + '<br />' + element.sum_like + '<button type="button" id="button_like_comment" value="' + element.id + '"><i class="fas fa-heart"></i></button><br /></div>')
            else
                $('#section_show_comment').append('<div class="showOneComment">' + element.login + '<br />' + element.titre + '<br />' + element.contenu + '<br />' + element.date + '<br />' + element.sum_like + '<button type="button" id="button_like_comment" value="' + element.id + '"><i class="far fa-heart"></i></button><br /></div>')
        })
        // foreach Parent> enfant > div - if(id == id) {this->changer class}

    })
    $('#section_show_comment').empty()

}
$('#section_show_comment').on('click', 'button', function (e) {
    e.preventDefault();
    console.log(this.value)
    id_commentaire = this.value
    $.ajax({
        url: '../routeurJS.php',
        dateType: 'json',
        type: 'POST',
        data: { id_article_like: id_article, id_commentaire_like: id_commentaire }
    }).done(function (data) {
        data = JSON.parse(data)
        console.log(data);
        console.log('succes')

        if (data.length == 0) {
            // }).fail(function (data) {
            //     console.log('fail')
            // })
            //sum
            console.log("2")
            // insert
            $.ajax({
                url: '../routeurJS.php',
                dataType: 'json',
                type: 'POST',
                data: { id_article_like_add: id_article, id_commentaire_like_add: id_commentaire }
            }).done(function (data) {
                data = JSON.parse(data)
                console.log(data)
                console.log("like inséré")
            })
        }
        else {
            $.ajax({
                url: '../routeurJS.php',
                dataType: 'json',
                type: 'POST',
                data: { id_article_like_delete: id_article, id_commentaire_like_delete: id_commentaire }
            }).done(function (data) {
                data = JSON.parse(data)
                console.log(data)
                console.log("like supprimé")
            })
        }
    })
})
getArticle() // initialise la valeur de l'id article a transmettre 
// console.log('bonjour')