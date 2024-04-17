import fr from '../plugins/intl-tel-input/js/i18n/fr'    
(function ($) {
    "use strict";
    var $wrapper = $('.main-wrapper');
    var $pageWrapper = $('.page-wrapper');
    var $slimScrolls = $('.slimscroll');
    var Sidemenu = function () {
        this.$menuItem = $('#sidebar-menu a');
    };

    function init() {
        var $this = Sidemenu;
        $('#sidebar-menu a').on('click', function (e) {
            if ($(this).parent().hasClass('submenu')) {
                e.preventDefault();
            }
            if (!$(this).hasClass('subdrop')) {
                $('ul', $(this).parents('ul:first')).slideUp(350);
                $('a', $(this).parents('ul:first')).removeClass('subdrop');
                $(this).next('ul').slideDown(350);
                $(this).addClass('subdrop');
            } else if ($(this).hasClass('subdrop')) {
                $(this).removeClass('subdrop');
                $(this).next('ul').slideUp(350);
            }
        });
        $('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
    }
    init();
    $('body').append('<div class="sidebar-overlay"></div>');
    $(document).on('click', '#mobile_btn', function () {
        $wrapper.toggleClass('slide-nav');
        $('.sidebar-overlay').toggleClass('opened');
        $('html').toggleClass('menu-opened');
        return false;
    });
    $(".sidebar-overlay").on("click", function () {
        $wrapper.removeClass('slide-nav');
        $(".sidebar-overlay").removeClass("opened");
        $('html').removeClass('menu-opened');
    });
    if ($('.page-wrapper').length > 0) {
        var height = $(window).height();
        $(".page-wrapper").css("min-height", height);
    }
    $(window).resize(function () {
        if ($('.page-wrapper').length > 0) {
            var height = $(window).height();
            $(".page-wrapper").css("min-height", height);
        }
    });
    if ($('.select').length > 0) {
        var dropdownParent = $('.select').hasClass('in-modal') ? $('.select').closest('.myModal') : null;

        // console.log($('.select').length );
        $('.select').select2({
            // minimumResultsForSearch: -1,
            width: '100%',
            dropdownParent: dropdownParent
        });
    }

    if ($('.bookingrange').length > 0) {
        var start = moment().subtract(6, 'days');
        var end = moment();

        function booking_range(start, end) {
            $('.bookingrange span').html(start.format('M/D/YYYY') + ' - ' + end.format('M/D/YYYY'));
        }
        $('.bookingrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, booking_range);
        booking_range(start, end);
    }
    if ($('.datatable').length > 0) {
        $('.datatable').DataTable({
            language: {
                search: '<i class="fas fa-search"></i>',
                searchPlaceholder: "Search"
            }
        });
    }
    if ($slimScrolls.length > 0) {
        $slimScrolls.slimScroll({
            height: 'auto',
            width: '100%',
            position: 'right',
            size: '7px',
            color: '#ccc',
            allowPageScroll: false,
            wheelStep: 10,
            touchScrollStep: 100
        });
        var wHeight = $(window).height() - 60;
        $slimScrolls.height(wHeight);
        $('.sidebar .slimScrollDiv').height(wHeight);
        $(window).resize(function () {
            var rHeight = $(window).height() - 60;
            $slimScrolls.height(rHeight);
            $('.sidebar .slimScrollDiv').height(rHeight);
        });
    }
    if ($('.toggle-password').length > 0) {
        $(document).on('click', '.toggle-password', function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(".pass-input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }


    $(document).on('click', '#toggle_btn', function () {
        if ($('body').hasClass('mini-sidebar')) {
            $('body').removeClass('mini-sidebar');
            $('.subdrop + ul').slideDown();
        } else {
            $('body').addClass('mini-sidebar');
            $('.subdrop + ul').slideUp();
        }
        setTimeout(function () {
            mA.redraw();
            mL.redraw();
        }, 300);
        return false;
    });
    $(document).on('mouseover', function (e) {
        e.stopPropagation();
        if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
            var targ = $(e.target).closest('.sidebar').length;
            if (targ) {
                $('body').addClass('expand-menu');
                $('.subdrop + ul').slideDown();
            } else {
                $('body').removeClass('expand-menu');
                $('.subdrop + ul').slideUp();
            }
            return false;
        }
    });
    $(document).on('click', '#filter_search', function () {
        $('#filter_inputs').slideToggle("slow");
    });
    if ($('.custom-file-container').length > 0) {
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    }
    if ($('.clipboard').length > 0) {
        var clipboard = new Clipboard('.btn');
    }

    if ($('[data-bs-toggle="tooltip"]').length > 0) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }



    if ($('.sortby').length > 0) {
        var show = true;
        var checkbox1 = document.getElementById("checkbox");
        $('.selectboxes').on("click", function () {
            if (show) {
                checkbox1.style.display = "block";
                show = false;
            } else {
                checkbox1.style.display = "none";
                show = true;
            }
        });
    }







    feather.replace();

    $('.open-layout').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-layout').addClass('show-layout');
        $('.sidebar-settings').removeClass('show-settings');
    });
    $('.btn-closed').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-layout').removeClass('show-layout');
    });
    $('.open-settings').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-settings').addClass('show-settings');
        $('.sidebar-layout').removeClass('show-layout');
    });
    $('.btn-closed').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-settings').removeClass('show-settings');
    });
    $('.open-siderbar').on("click", function (s) {
        s.preventDefault();
        $('.siderbar-view').addClass('show-sidebar');
    });
    $('.btn-closed').on("click", function (s) {
        s.preventDefault();
        $('.siderbar-view').removeClass('show-sidebar');
    });
    // project data table


    if ($('.montan').length > 0) {

        $('.montant').each(function (index, element) {
            let texte = AppModules.formatMontant($(element).text());

            $(element).text(texte + ' FCFA');
        })

    }
    if ($('#phone').length > 0) {
        const countryData = window.intlTelInputGlobals.getCountryData();
        const addressDropdown = document.querySelector("#location");
        const input = document.querySelector("#phone");
        const iti =  window.intlTelInput(input, {
            initialCountry: "tg",
            strictMode: true,
            i18n: fr,
            nationalMode: true,
            utilsScript: "/assets/plugins/intl-tel-input/js/utils.js",
        });
        // populate the country dropdown
        for (let i = 0; i < countryData.length; i++) {
            const country = countryData[i];
            const optionNode = document.createElement("option");
            optionNode.value = country.iso2;
            const textNode = document.createTextNode(country.name);
            optionNode.appendChild(textNode);
            addressDropdown.appendChild(optionNode);
        }
        // set it's initial value
        addressDropdown.value = iti.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        input.addEventListener('countrychange', () => {
            addressDropdown.value = iti.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        addressDropdown.addEventListener('change', () => {
            iti.setCountry(this.value);
        });
    }







})(jQuery);