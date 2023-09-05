<script data-cfasync="false" src="{{ asset('/adminTemplate/js/email-decode.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/adminTemplate/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/adminTemplate/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/adminTemplate/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/adminTemplate/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('/adminTemplate/js/waves.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/adminTemplate/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('/adminTemplate/js/jquery.flot.js') }}"></script>
<script src="{{
        asset('/adminTemplate/js/jquery.flot.categories.js')
    }}"></script>
<script src="{{ asset('/adminTemplate/js/curvedLines.js') }}"></script>
<script src="{{
        asset('/adminTemplate/js/jquery.flot.tooltip.min.js')
    }}"></script>

<script src="{{ asset('/adminTemplate/js/chartist.js') }}"></script>

<script src="{{ asset('/adminTemplate/js/amcharts.js') }}"></script>
<script src="{{ asset('/adminTemplate/js/serial.js') }}"></script>
<script src="{{ asset('/adminTemplate/js/light.js') }}"></script>

<script src="{{ asset('/adminTemplate/js/pcoded.min.js') }}"></script>
<script src="{{ asset('/adminTemplate/js/vertical-layout.min.js') }}"></script>
{{--
<script type="text/javascript" src="{{ asset('/adminTemplate/js/custom-dashboard.min.js') }}"></script>
--}}
<script type="text/javascript" src="{{ asset('/adminTemplate/js/script.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var the_a = $('.nav-list li a');
        the_a.each(function() {
            $(this).on('click', function(){
                $(this).addClass('active');
            })
            if ($(this).attr('href') == window.location.pathname) {
                $(this).parent().addClass('active');
                if ($(this).parent().parent().parent().hasClass('pcoded-hasmenu')){
                    $(this).parent().parent().parent().addClass('pcoded-trigger active');
                    $(this).find(">:first-child").css('color', '#42a5f5');
                }
            }
        });
    });
</script>