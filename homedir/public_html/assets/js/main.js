$(document).ready(function () {
	$('.datepicker').on('click', function(ev){
      //alert('')
    });
	
	$('.datepicker').pDatepicker({
        autoclose: true
    });
	
    if ($(".part_one").length > 0) {
        $(".part_one").mCustomScrollbar({
            theme: "dark"
        });
    }

    if ($(".select2").length > 0) {
        $('.select2').select2({
            theme: "classic"
        });
    }

    if ($(".datepicker").length > 0) {
        $(".datepicker").pDatepicker({
            initialValue: false
        });
    }

    $(".steps2 a").on("click", function (e) {
        e.preventDefault();
        $(".steps a").removeClass("active");
        $(this).addClass("active");

        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;
    });

    $(document).on('scroll', function () {
        if ($(this).scrollTop() >= $('#step_1').position().top) {
            $(".steps a").removeClass("active");
            $(".steps a.one").addClass("active");
        }
        if ($(this).scrollTop() >= $('#step_2').position().top) {
            $(".steps a").removeClass("active");
            $(".steps a.two").addClass("active");
        }
        if ($(this).scrollTop() >= $('#step_3').position().top) {
            $(".steps a").removeClass("active");
            $(".steps a.three").addClass("active");
        }
        if ($(this).scrollTop() >= $('#step_4').position().top) {
            $(".steps a").removeClass("active");
            $(".steps a.four").addClass("active");
        }
		if ($(this).scrollTop() >= 100) {
            $(".main_menu").css("position","fixed");
        }
		if ($(this).scrollTop() < 100) {
            $(".main_menu").css("position","relative");
        }
    });

    if ($(window).width() < 940) {
        $(".part_one ul li>a").on("click", function () {
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(".part_two").offset().top
            }, 800);
        });
    }

    if ($('.main_slider').length > 0) {
        $('.main_slider').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    }

    $(".part_one a").on("click", function (e) {
        e.preventDefault();
        $(".part_one a").removeClass("active");
        $(this).addClass("active");

        if ($(this).data("id") == 1) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_1").slideDown();
            });
        } else if ($(this).data("id") == 2) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_2").slideDown();
            })
        } else if ($(this).data("id") == 3) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_3").slideDown();
            })
        } else if ($(this).data("id") == 4) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_4").slideDown();
            })
        } else if ($(this).data("id") == 5) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_5").slideDown();
            })
        } else if ($(this).data("id") == 6) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_6").slideDown();
            })
        } else if ($(this).data("id") == 7) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_7").slideDown();
            })
        } else if ($(this).data("id") == 8) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_8").slideDown();
            })
        } else if ($(this).data("id") == 9) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_9").slideDown();
            })
        } else if ($(this).data("id") == 10) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_10").slideDown();
            })
        } else if ($(this).data("id") == 11) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_11").slideDown();
            })
        } else if ($(this).data("id") == 12) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_12").slideDown();
            })
        } else if ($(this).data("id") == 13) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_13").slideDown();
            })
        } else if ($(this).data("id") == 14) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_14").slideDown();
            })
        } else if ($(this).data("id") == 15) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_15").slideDown();
            })
        }else if ($(this).data("id") == 16) {
            $(".slider_Impo").slideUp(function () {
                $(".part_two .bimeh").hide();
                $(".part_two .bimeh_16").slideDown();
            })
        }
    });

    $(".res_menu").on("click", function () {
        $(".main_header .main_menu .container>ul").slideToggle("fast");
    });

    $(".step_1.two_step select").on("change", function () {
        var step_1 = $(this).parents(".step_1");
        var step_2 = $(this).parents(".bimeh").find(".step_2");
        var select_one = $(this).parents(".step_1").find("select.select_one");
        var select_one_selected = $(this).parents(".step_1").find("select.select_one option:selected");
        var select_two = $(this).parents(".step_1").find("select.select_two");
        var select_two_selected = $(this).parents(".step_1").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step2");
        if (select_one.val() != 0 && select_two.val() != 0) {
            data.html(select_one_selected.html() + " | " + select_two_selected.html());
            step_1.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_1.removeClass("animated fadeOutRight").css("display", "none");
                step_2.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    $(".step_1.one_step select").on("change", function () {
        var step_1 = $(this).parents(".step_1");
        var step_2 = $(this).parents(".bimeh").find(".step_2");
        var select_one = $(this).parents(".step_1").find("select.select_one");
        var select_one_selected = $(this).parents(".step_1").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step2");
        if (select_one.val() != 0) {
            data.html(" " + select_one_selected.html());
            step_1.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_1.removeClass("animated fadeOutRight").css("display", "none");
                step_2.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    $(".step_2.one_step select").on("change", function () {
        var step_2 = $(this).parents(".step_2");
        var step_3 = $(this).parents(".bimeh").find(".step_3");
        var select_one = $(this).parents(".step_2").find("select.select_one");
        var select_one_selected = $(this).parents(".step_2").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step3");
        if (select_one.val() != 0) {
            data.append(" | " + select_one_selected.html());
            step_2.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_2.removeClass("animated fadeOutRight").css("display", "none");
                step_3.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    $(".step_2.two_step select").on("change", function () {
        var step_2 = $(this).parents(".step_2");
        var step_3 = $(this).parents(".bimeh").find(".step_3");
        var select_one = $(this).parents(".step_2").find("select.select_one");
        var select_one_selected = $(this).parents(".step_2").find("select.select_one option:selected");
        var select_two = $(this).parents(".step_2").find("select.select_two");
        var select_two_selected = $(this).parents(".step_2").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step3");
        if (select_oneval() != 0 && select_two.val() != 0) {
            data.append(" | " + select_one_selected.html() + " | " + select_two_selected.html());
            step_2.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_2.removeClass("animated fadeOutRight").css("display", "none");
                step_3.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    $(".step_3.one_step select").on("change", function () {
        var step_3 = $(this).parents(".step_3");
        var step_4 = $(this).parents(".bimeh").find(".step_4");
        var select_one = $(this).parents(".step_3").find("select.select_one");
        var select_one_selected = $(this).parents(".step_3").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step4");
        if (select_one.val() != 0) {
            data.append(" | " + select_one_selected.html());
            step_3.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_3.removeClass("animated fadeOutRight").css("display", "none");
                step_4.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    $(".step_3.two_step select").on("change", function () {
        var step_3 = $(this).parents(".step_3");
        var step_4 = $(this).parents(".bimeh").find(".step_4");
        var select_one = $(this).parents(".step_3").find("select.select_one");
        var select_one_selected = $(this).parents(".step_3").find("select.select_one option:selected");
        var select_two = $(this).parents(".step_3").find("select.select_two");
        var select_two_selected = $(this).parents(".step_3").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step4");
        if (select_one.val() != 0 && select_two.val() != 0) {
            data.append(" | " + select_one_selected.html() + " | " + select_two_selected.html());
            step_3.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_3.removeClass("animated fadeOutRight").css("display", "none");
                step_4.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    $(".step_4.two_step select").on("change", function () {
        var step_4 = $(this).parents(".step_4");
        var step_5 = $(this).parents(".bimeh").find(".step_5");
        var select_one = $(this).parents(".step_4").find("select.select_one");
        var select_one_selected = $(this).parents(".step_4").find("select.select_one option:selected");
        var select_two = $(this).parents(".step_4").find("select.select_two");
        var select_two_selected = $(this).parents(".step_4").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step5")
        if (select_one.val() != 0 && select_two.val() != 0) {
            data.append(" | " + select_one_selected.html() + " | " + select_two_selected.html());
            step_4.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_4.removeClass("animated fadeOutRight").css("display", "none");
                step_5.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    $(".step_4.one_step select").on("change", function () {
        var step_4 = $(this).parents(".step_4");
        var step_5 = $(this).parents(".bimeh").find(".step_5");
        var select_one = $(this).parents(".step_4").find("select.select_one");
        var select_one_selected = $(this).parents(".step_4").find("select.select_one option:selected");
        var data = $(this).parents(".bimeh").find("data");
        var steps_li = $(this).parents(".bimeh").find(".steps li");
        var steps_step2 = $(this).parents(".bimeh").find(".steps .step5");
        if (select_one.val() != 0) {
            data.append(" | " + select_one_selected.html());
            step_4.addClass("animated fadeOutRight");
            setTimeout(function () {
                step_4.removeClass("animated fadeOutRight").css("display", "none");
                step_5.css("display", "block").addClass("animated fadeInLeft");
                steps_li.removeClass("active");
                steps_step2.addClass("active");
            }, 500);
        }
    });

    // Step Javascipt Codes

    $(".next_step1").on("click", function (e) {
        e.preventDefault();
        // if($(".step_1 .select_one").val()==0){
        // 	$(".step_1 .select_one").parent(".col").find(".select2-selection").addClass("error");
        // }else{
        $(".step_1").addClass("animated fadeOutRight");
        setTimeout(function () {
            $(".step_1").removeClass("animated fadeOutRight").css("display", "none");
            $(".step_2").css("display", "block").addClass("animated fadeInLeft");
            $(".steps .step2").addClass("active");
        }, 500);
        // }

    });

    $(".next_step2").on("click", function (e) {
        e.preventDefault();
        $(".step_2").addClass("animated fadeOutRight");
        setTimeout(function () {
            $(".step_2").removeClass("animated fadeOutRight").css("display", "none");
            $(".step_3").css("display", "block").addClass("animated fadeInLeft");
            $(".steps .step3").addClass("active");
        }, 500);
    });

    $(".prev_step2").on("click", function (e) {
        e.preventDefault();
        $(".step_2").removeClass("fadeInLeft fadeInRight animated");
        $(".step_2").addClass("fadeOutLeft animated");
        setTimeout(function () {
            $(".step_2").removeClass("fadeOutLeft animated").css("display", "none");
            $(".step_1").css("display", "block").addClass("animated fadeInRight");
            $(".steps .step2").removeClass("active");
        }, 500);
    });

    $(".next_step3").on("click", function (e) {
        e.preventDefault();
        $(".step_3").addClass("animated fadeOutRight");
        setTimeout(function () {
            $(".step_3").removeClass("animated fadeOutRight").css("display", "none");
            $(".step_4").css("display", "block").addClass("animated fadeInLeft");
            $(".steps .step4").addClass("active");
        }, 500);
    });

    $(".prev_step3").on("click", function (e) {
        e.preventDefault();
        $(".step_3").removeClass("fadeInLeft fadeInRight animated");
        $(".step_3").addClass("fadeOutLeft animated");
        setTimeout(function () {
            $(".step_3").removeClass("fadeOutLeft animated").css("display", "none");
            $(".step_2").css("display", "block").addClass("animated fadeInRight");
            $(".steps .step3").removeClass("active");
        }, 500);
    });

    $(".next_step4").on("click", function (e) {
        e.preventDefault();
        $(".step_4").addClass("animated fadeOutRight");
        setTimeout(function () {
            $(".step_4").removeClass("animated fadeOutRight").css("display", "none");
            $(".step_5").css("display", "block").addClass("animated fadeInLeft");
            $(".steps .step5").addClass("active");
        }, 500);
    });

    $(".prev_step4").on("click", function (e) {
        e.preventDefault();
        $(".step_4").removeClass("fadeInLeft fadeInRight animated");
        $(".step_4").addClass("fadeOutLeft animated");
        setTimeout(function () {
            $(".step_4").removeClass("fadeOutLeft animated").css("display", "none");
            $(".step_3").css("display", "block").addClass("animated fadeInRight");
            $(".steps .step4").removeClass("active");
        }, 500);
    });

    $(".prev_step5").on("click", function (e) {
        e.preventDefault();
        $(".step_5").removeClass("fadeInLeft fadeInRight animated");
        $(".step_5").addClass("fadeOutLeft animated");
        setTimeout(function () {
            $(".step_5").removeClass("fadeOutLeft animated").css("display", "none");
            $(".step_4").css("display", "block").addClass("animated fadeInRight");
            $(".steps .step5").removeClass("active");
        }, 500);
    });

    //$( document ).tooltip();

    $('.switch').each(function () {
        var $label = $(this).find('>label');
        $label.append('<span class="switch-slider"></span>');
    });

});




