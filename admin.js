if(sessionStorage.getItem('userID')!=null)
{
    let userID = sessionStorage.getItem('userID');
    if(userID[0]=='A')
    {
        $.ajax({
            type:"POST",
            url:"utilities/getAdmin.php",
            data: {},
            dataType:"html",
            success: function(data)
            {
                $("#hierarchy").html(data);
                $('.sub-nav > a').click(function()
                {
                    if ($(this).parent('.sub-nav').hasClass('open'))
                    {
                        $(this).parent('.sub-nav').removeClass('open');
                        $(this).parent('.sub-nav').children('ul').slideUp("slow");
                    }
                    else
                    {
                        $(this).parent('.sub-nav').addClass('open');
                        $(this).parent('.sub-nav').children('ul').slideDown("slow");
                    };
                });
            }
        });
    }
}
function signOut()
{
    $.post('utilities/signout.php', {userID: sessionStorage.getItem('userID')});
    sessionStorage.clear();
    window.location='index.php';
}