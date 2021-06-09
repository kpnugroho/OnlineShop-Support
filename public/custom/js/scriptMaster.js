$(document).ready(function() {
    var menu = $('#menu-title').text();
    var group_menu;
    
    //remove class active on all menu group
    $('.nav-item').removeClass('menu-open');
    //remove class active on all menu
    $('.nav-button').removeClass('active');
    
    if(menu.toUpperCase() == "CHANGE PASSWORD"){
        //Add Class active on menu
        $('#nav-change-password').addClass('active');
        //Add class active on group menu
        $('#nav-group-master').addClass('menu-open');
    } else if(menu.toUpperCase() == "MASTER EKSPEDISI"){
        $('#nav-ekspedisi').addClass('active');
        $('#nav-group-master').addClass('menu-open');
    }
});	

$(".nav-button").click(function(event){
    // event.preventDefault();

    //menyimpan selector yang dipilih(#btn-create) ke dalam variable me
    var me = $(this),
    //memasukan nilai dari href ke dalam variable url
    url = me.attr('href'),
    //memasukan title ke dalam variable title
    title = me.attr('title');

    // mengganti title Menu dengan isi dari var title
    $('#menu-title').text(title);

    //remove class active on all nav-button
    $('.nav-button').removeClass('active');

    //get id based on class to add class active
    var id = me.attr('id');
    $('#'+id).addClass('active');

    //proses ajax
    // $.ajax({
    //     url: url,
    //     dataType: 'html',
    //     success: function (response) {
    //         $('#content-wrapper').html(response);
    //         window.location.href = newUrl;
    //     }
    // });

    //memanggil responsenya
    // $('#modal').modal('show');
});