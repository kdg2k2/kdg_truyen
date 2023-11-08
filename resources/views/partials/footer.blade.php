<footer id="footer">
    <div class="container">
        <center>
            <span>©2023 KdgTruyen</span>
        </center>
    </div>
</footer>
<script data-cfasync="false" src="{{ asset('/Main_template/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"
></script>
<script src="{{ asset('/Main_template/vendor/alertify/alertify.min.js') }}"
 type="8f607098fd4ff38b6cf39054-text/javascript"></script>
<script src="{{ asset('/Main_template/js/app.js') }}"
 type="8f607098fd4ff38b6cf39054-text/javascript"></script>
<script src="{{ asset('/Main_template/vendor/adminlte/dist/js/adminlte.min.js') }}"
 type="8f607098fd4ff38b6cf39054-text/javascript"></script>
<script src="{{ asset('/Main_template/js/manga.js') }}"
 type="d1fa445f106a52e9ca420c2b-text/javascript"></script>
<script src="{{ asset('/Main_template/js/chapter.js') }}"
 type="581025bf304da0ddc3cc5baa-text/javascript"></script>
<script src="{{ asset('/Main_template/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
 data-cf-settings="8f607098fd4ff38b6cf39054-|49" defer></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

 <script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    function updateThongBao(e){
        var id_tb = e.getAttribute('id');
        $.ajax({
            method: 'post',
            url: '/set_status/' + id_tb,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
    }
 </script>