var text_search = document.getElementById('text_search')
var search = document.getElementById('submitSearchBar')
var matchList = document.getElementById('matchList')
var loc = window.location.pathname;

var path;
if (loc.indexOf("view") > 0) {
    path = '../routeurJS.php'
    console.log(path)
}
else {
    path = 'routeurJS.php'
}
console.log(loc)
console.log(path)
// addEventListener('input', function (evt) { // a revoir pour le input, pas bien compris 
$('#text_search').keyup(function () {
    console.log(text_search.value)
    // if (!(text_search == "")) {
    // console.log(text_search.length)
    text_search = document.getElementById('text_search')
    if (text_search.value == "") {
        document.getElementById('matchList').innerHTML = ""

    } else {
        $.ajax({
            url: path,
            dateType: 'json',
            type: 'GET',
            data: 'text_search=' + $(this).val()
            // })
        }).done(function (data) {
            var str = ""
            console.log(data)
            var data = JSON.parse(data)
            for (var i = 0; i < data.length; i++) {

                str = str + '<a style="cursor:pointer;">' + data[i][0]['mot'] + '</a><br />'

                console.log(data[i][0]['img'])
            }
            document.getElementById('matchList').innerHTML = str
        })
    }
});
$('#matchList').on('click', 'a', function (e) {
    // dont allow the <a> to perform its default functionality
    e.preventDefault();
    // get content of <a> tag
    console.log($(this).text());

    document.getElementById('text_search').value = $(this).text();

    $.ajax({
        url: path,
        dateType: 'json',
        type: 'GET',
        data: 'text_search=' + $('#text_search').val() // this -> $('#text_search')
        // })
    }).done(function (data) {
        var str_result = ""
        console.log(data)
        var data = JSON.parse(data)
        for (var i = 0; i < data.length; i++) {

            str_result = str_result + '<div class="mise_en_forme_result_recherche"><a class="mise_en_forme_result_recherche_a" href="element.php?id=' + data[i][0]["id"] + '"><p>' + data[i][0]['mot'] + '</p><img class="img_size" src="' + data[i][0]['img'] + '">' + '</a></div><br />'

            // console.log(data[i][0]['mot'])
        }
        // console.log(data)
        document.getElementById('result').value = str_result
        console.log(document.getElementById('result').value)
    })
});
