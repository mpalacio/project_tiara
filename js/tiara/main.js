function initialize() {
    $.ajaxSetup({
        data: {
            csrf_pt_token: $.cookie('csrf_pt_cookie')
        }
    })
    
    if($('.modal').children().length)
    {
        $('.modal').modal('show')
    }
}