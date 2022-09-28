
$('#buton').click(function (){
    $('#menu').slideToggle( "slow" )
    if ($('#iconClose').hasClass('hidden'))
    {
        $('#iconMenu').slideToggle()
        $('#iconClose').slideToggle()
    }


})

