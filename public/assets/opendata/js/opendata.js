$(function() {
    /* --------------------------------------------------------------------------
        Manage active menu 
    -------------------------------------------------------------------------- */
    setActiveMenu()

    $(".has-sub-menu").click(function () {
        localStorage.setItem("main_menu_id", $(this).find('div').attr("id"));
    });
    
    $(".sub-menu").click(function () {
        localStorage.setItem("menu_sub_id", $(this).attr("id"));
    });
    
    $(".single-menu a").click(function () {
        localStorage.setItem("menu_sub_id", $(this).attr("id"));
        localStorage.removeItem("main_menu_id");
    });
    /* -------------------------------------------------------------------------- */

    /* Autofocus select tag after choosing or adding new elements */
    $(".tags-select").on('select2:close', function(e) {
        var select2SearchField = $(this).parent().find('.select2-search__field');
        var setfocus = setTimeout(function() {
            select2SearchField.focus();
        }, 100);
    });

    /* Make the dashboard-statistic-card clickable */
    $('.dashboard-statistic-card .card').click(function() {
        const url = $(this).find('a').attr('href');
        window.location.href = url
    });

    $('.back-btn').click(function(){
        window.history.back();
    })

    /* Bdd element btn delete click event */
    $('table .delete-element').click(function() {
        const url = $(this).data('delete-path');
        $('.delete-modal-form').attr('action', url);
        $('#bdd-element-delete-modal').modal();
    });

    /* Parameters: Change default langage */
    $('.admin-parameter-default-lang').attr('method', 'PUT')
    $('.admin-parameter-default-lang').submit(function(e) {
        e.preventDefault();
        const form = $(this)
        const url = form.attr('action');
        const data = form.find('select').serializeArray()[0];

        const redirectPath = form.data('redirect');
        const currentLocale = redirectPath.split('/', 2)[1];
        const newRedirectPath = redirectPath.replace(currentLocale, data.value);

        $.ajax({
            url: url,
            type: 'PUT',
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (response) {
                form.find('.alert p').html(response.message);
                form.find('.alert').addClass('show').removeClass('hidden');

                if (response.full_success) {
                    setTimeout(function() {
                        window.location.href = newRedirectPath;
                    }, 2000);
                } else {
                    setTimeout(function() {
                        form.find('.alert').removeClass('show').addClass('hidden');
                    }, 3000);
                }
            },
            error: function(error) {
                // handle failure
            }
        });
    });

    /* Fetch & active current menu from localstorage */
    function setActiveMenu()
    {
        const main_link = $("a").find("[aria-controls='" + localStorage.getItem("main_menu_id") + "']");
        const submenu = $("div").find("[id='" + localStorage.getItem("main_menu_id") + "']");
        const sub_link = $("#" + localStorage.getItem("menu_sub_id"));
        main_link.removeClass("collapsed").attr("aria-expanded", true);
        submenu.addClass("show");
        sub_link.addClass("active");
    }

    /* Alert */
    if ($('.alert' > 0)) {
        setTimeout(function(){
            $('.alert').remove();
        }, 5000);
    }
});