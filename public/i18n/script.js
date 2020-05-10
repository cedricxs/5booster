function updateLanguage(lang){
    $.i18n({
        "locale" : lang
    })
    $('#language').val(lang)
    $('body').i18n()
    $('#coach-contact-input-title').prop({'placeholder':$.i18n('enter-title')})
}
function post_language(lang){
    $.ajax({
        type: 'post',
        url: '/api/change_locale',
        data: {
            locale: lang
        },
        success: function (res) {
            console.log(res)
        },
        error: function (err) {
            console.log(err)
        }
    })
}
$('#language').change(function (event) {
    updateLanguage($('#language').val())
})
